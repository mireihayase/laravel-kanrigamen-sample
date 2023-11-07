<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Request as RequestModel;
use App\Models\MngStatus;

class RequestController extends Controller
{
    public function index(Request $request)
    {
        if(!empty($request->input('paginate')) ){
            session(['request.paginate' => $request->input('paginate')]);
            return to_route('request.search')->withInput();
        }
        session(['status' => ['D01','D02']]);
        $paginate = 20;
        $requet_model = RequestModel::paginate($paginate);
        $query = RequestModel::query();
        $param = [];
        return view('requests/list', compact('requet_model', 'param'));
    }


    public function search(Request $request)
    {
        self::accessLog( __METHOD__ . ' start');
        $paginate = !empty($request->session()->get('request.paginate')) ? $request->session()->get('request.paginate') : 20;
        $requet_model = RequestModel::paginate($paginate);
        $query = RequestModel::query();
        $request->flash();

        if(!empty($request->old('request_id'))  || $request->session()->get('request_id')){
            session(['order_id' => $request->old('request_id')]);
            $query = $query->where('request_id', 'LIKE', '%' . $request->old('request_id') . '%');
        }
        if(!empty($request->old('name'))  || $request->session()->get('name')){
            session(['name' => $request->old('name')]);
            $query = $query->where('name', 'LIKE', '%' . $request->input('name') . '%');
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
                'requests.request_id',
                MngStatus::query()
                    ->where('status', $status_array)
                    ->select('mng_status.id')
            );
        }else{
            $query = $query->whereIn(
                'requests.request_id',
                MngStatus::query()
                    ->whereIn('status', ['D01','D02'])
                    ->select('mng_status.id')
            );
        }
        $requet_model = $query->paginate($paginate);
        $param = $request->old();
        unset($param['action']);
        unset($param['_token']);

        self::accessLog( __METHOD__ . ' end');


        return view('requests/list', compact('requet_model', 'param'));
    }

    public function action(Request $request)
    {
        $request->flash();
        if($request->input('action') == 'search'){
            return to_route('request.search')->withInput();
        }

        if($request->input('action') == 'update'){
            return to_route('request.bundle_updates')->withInput();
        }

        if($request->input('action') == 'pdf'){
            $param = [];
            if(empty($request->old('request_id_array')) || empty($request->old('status'))){
                $requet_model = RequestModel::paginate(20);
                return view('requests/list', compact('requet_model', 'param'));
            }
            $ids_array = $request->input('request_id_array');
            $pdf = PdfOutputController::multi_requests($ids_array);
            //download
            return $pdf;
            //displayy
//            return $pdf->stream();
        }
    }

    public function show($id)
    {
        self::accessLog( __METHOD__ . ' start');
        $request = RequestModel::where('request_id', $id)->first();
        $status = $request->status()->first();
        self::accessLog( __METHOD__ . ' end');

        return view('requests/detail', compact('request', 'status'));
    }

    public function update(Request $request)
    {
        self::accessLog( __METHOD__ . ' start');
        $request = RequestModel::where('request_id', $request->input('request_id'))->first();
        $request->status = $request->input('status');
        $request->save();
        $status = $request->status()->first();
        $status->status = $request->input('status');
        $status->save();
        self::accessLog('SID:' . session()->getId() . '	LID:' . session()->get('login_id') . '	execute->' . __METHOD__);
        self::accessLog( __METHOD__ . ' end');

        return view('requests/detail', compact('request', 'status'));
    }

    public function bundle_updates(Request $request)
    {
        $param = [];
        if(empty($request->old('request_id_array')) || empty($request->old('status'))){
            $requet_model = RequestModel::paginate(20);
            return view('requests/list', compact('requet_model', 'param'));
        }
        $requet_model = RequestModel::whereIn('request_id', $request->old('request_id_array'))->get();
        $new_status = $request->old('status');
        foreach ($requet_model as $model){
            $status = $model->status()->first();
            $status->status = $new_status;
            $status->save();
        }
        $requet_model = RequestModel::paginate(20);

        return view('requests/list', compact('requet_model', 'param'));
    }

}
