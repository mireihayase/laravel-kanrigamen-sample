<?php

namespace App\Http\Controllers;

use App\Models\MngStatus;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        session(['status' => ['B01','B02']]);
        if(!empty($request->input('paginate')) ){
            session(['order.paginate' => $request->input('paginate')]);
            return to_route('order.search')->withInput();
        }
        $paginate = 20;
        $query = Order::query();
        $query = $query->whereIn(
            'orders.order_id',
            MngStatus::query()
                ->whereIn('status', ['B01','B02'])
                ->select('mng_status.id')
        );
        $orders = $query->paginate($paginate);

        $param = [];
        return view('order/list', compact('orders', 'param'));
    }

    public function search(Request $request)
    {
        self::accessLog( __METHOD__ . ' start');
        $paginate = !empty($request->session()->get('order.paginate')) ? $request->session()->get('order.paginate') : 20;
        $orders = Order::paginate($paginate);
        $query = Order::query();

        if(!empty($request->old('order_id')) || $request->session()->get('order_id')){
            session(['order_id' => $request->old('order_id')]);
            $query = $query->where('order_id', 'LIKE', '%' . $request->old('order_id') . '%');
        }
        if(!empty($request->old('name'))  || $request->session()->get('name')){
            session(['name' => $request->old('name')]);
            $query = $query->where('name', 'LIKE', '%' . $request->old('name') . '%');
        }
        if(!empty($request->old('email'))  || $request->session()->get('email')){
            session(['email' => $request->old('email')]);
            $query = $query->where('email', 'LIKE', '%' . $request->old('email') . '%');
        }
        if(!empty($request->old('tel'))  || $request->session()->get('tel')){
            session(['tel' => $request->old('tel')]);
            $query = $query->where('tel', 'LIKE', '%' . $request->old('tel') . '%');
        }
        if(!empty($request->old('company_name'))  || $request->session()->get('company_name')){
            session(['company_name' => $request->old('company_name')]);
            $query = $query->where('company', 'LIKE', '%' . $request->old('company_name') . '%');
            $query = $query->whereIn(
                'orders.user_no',
                User::query()
                    ->where('company_code', $request->old('company_name'))
                    ->select('users.user_no')
            );
        }
        if ($request->filled('created_from') && $request->filled('created_after')) {
            session(['created_from' => $request->old('created_from')]);
            session(['created_after' => $request->old('created_after')]);
            $start = $request->old('created_from') . ' 00:00:00';
            $end = $request->old('created_after') . ' 23:59:59';
            $query = $query->whereBetween('created_at', [$start, $end]);
        }
        if ($request->filled('updated_from') && $request->filled('updated_after')) {
            session(['updated_from' => $request->old('updated_from')]);
            session(['updated_after' => $request->old('updated_after')]);
            $start = $request->old('updated_from') . ' 00:00:00';
            $end = $request->old('updated_after') . ' 23:59:59';
            $query = $query->whereBetween('updated_at', [$start, $end]);
        }
        if(!empty($request->old('status'))  || $request->session()->get('status')){
            if(!empty($request->old('status'))){
                session(['status' => $request->old('status')]);
            }
            $status_array = !empty($request->old('status')) ? $request->old('status') : $request->session()->get('status');
            $query = $query->whereIn(
                'orders.order_id',
                MngStatus::query()
                    ->whereIn('status', $status_array)
                    ->select('mng_status.id')
            );
        }else{
            $query = $query->whereIn(
                'orders.order_id',
                MngStatus::query()
                    ->whereIn('status', ['B01','B02'])
                    ->select('mng_status.id')
            );
        }
        $orders = $query->paginate($paginate);
        $param = $request->old();
        unset($param['action']);
        unset($param['_token']);

        self::accessLog( __METHOD__ . ' end');

        return view('order/list', compact('orders', 'param'));
    }

    public function action(Request $request)
    {
        $request->flash();
        if($request->input('action') == 'search'){
            return to_route('order.search')->withInput();
        }

        if($request->input('action') == 'update'){
            return to_route('order.bundle_updates')->withInput();
        }

        if($request->input('action') == 'pdf'){
            $param = [];
            if(empty($request->old('order_id_array')) || empty($request->old('status'))){
                $orders = Order::paginate(20);
                return view('order/list', compact('orders', 'param'));
            }
            $ids_array = $request->input('order_id_array');
            $pdf = PdfOutputController::multi_orders($ids_array);
            //download
            return $pdf;
            //displayy
//            return $pdf->stream();
        }
    }

    public function show($id)
    {
        self::accessLog( __METHOD__ . ' start');
        $order = Order::where('order_id', $id)->first();
        $order_details = $order->order_details()->get();
        $status = $order->status()->first();
        self::accessLog( __METHOD__ . ' end');

        return view('order/detail', compact('order', 'order_details', 'status'));
    }

    public function update(Request $request)
    {
        self::accessLog( __METHOD__ . ' start');
        $order = Order::where('order_id', $request->input('order_id'))->first();
        $order->status = $request->input('status');
        $order->save();
        $status = $order->status()->first();
        $status->status = $request->input('status');
        $status->save();
        self::accessLog('SID:' . session()->getId() . '	LID:' . session()->get('login_id') . '	execute->' . __METHOD__);
        $order_details = $order->order_details()->get();
        self::accessLog( __METHOD__ . ' end');

        return view('order/detail', compact('order', 'order_details', 'status'));
    }

    public function bundle_updates(Request $request)
    {
        $param = [];
        if(empty($request->old('order_id_array')) || empty($request->old('status'))){
            $orders = Order::paginate(20);
            return view('order/list', compact('orders', 'param'));
        }
        $orders = Order::whereIn('order_id', $request->old('order_id_array'))->get();
        $new_status = $request->old('status');
        foreach ($orders as $order){
            $status = $order->status()->first();
            $status->status = $new_status;
            $status->save();
        }
        $orders = Order::paginate(20);

        return view('order/list', compact('orders', 'param'));
    }
}
