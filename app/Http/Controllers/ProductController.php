<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\MngStatus;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        session(['status' => ['A01','A02']]);
        if(!empty($request->input('paginate')) ){
            session(['product.paginate' => $request->input('paginate')]);
            return to_route('product.search')->withInput();
        }
        $paginate = 20;
        $query = Product::query();
        $query = $query->whereIn(
            'products.product_code',
            MngStatus::query()
                ->whereIn('status', ['A01','A02'])
                ->select('mng_status.id')
        );
        $products = $query->paginate($paginate);
        $param = [];
        return view('product/list', compact('products', 'param'));
    }

    public function search(Request $request)
    {
        $paginate = !empty($request->session()->get('product.paginate')) ? $request->session()->get('product.paginate') : 20;
        $products = Product::paginate($paginate);
        $query = Product::query();

        if(!empty($request->old('product_code'))  || $request->session()->get('product_code')){
            session(['product_code' => $request->old('product_code')]);
            $query = $query->where('product_code', 'LIKE', '%' . $request->input('product_code') . '%');
        }
        if(!empty($request->old('attribute'))  || $request->session()->get('attribute')){
            session(['attribute' => $request->old('attribute')]);
            $query = $query->where('attribute', 'LIKE', '%' . $request->input('attribute') . '%');
        }
        if(!empty($request->old('product_name'))  || $request->session()->get('product_name')){
            session(['product_name' => $request->old('product_name')]);
            $query = $query->where('product_name', 'LIKE', '%' . $request->input('name') . '%');
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
                'products.product_code',
                MngStatus::query()
                    ->where('status', $status_array)
                    ->select('mng_status.id')
            );
        }else{
            $query = $query->whereIn(
                'products.product_code',
                MngStatus::query()
                    ->whereIn('status', ['A01','A02'])
                    ->select('mng_status.id')
            );
        }
        $products = $query->paginate($paginate);
        $param = $request->old();
        unset($param['action']);
        unset($param['_token']);

        return view('product/list', compact('products','param'));
    }

    public function action(Request $request)
    {
        $request->flash();
        if($request->input('action') == 'search'){
            return to_route('product.search')->withInput();
        }

        if($request->input('action') == 'update'){
            return to_route('product.bundle_updates')->withInput();
        }
    }

    public function show($id)
    {
        $product = Product::where('product_code', $id)->first();
        $status = $product->status()->first();
        return view('product/detail', compact('product','status'));
    }

    public function update(Request $request)
    {
        self::accessLog( __METHOD__ . ' start');
        $product = Product::where('product_code', $request->input('product_code'))->first();
        $product->status = $request->input('status');
//        $product->save();
        $status = $product->status()->first();
        $status->status = $request->input('status');
        $status->save();
        self::accessLog('SID:' . session()->getId() . '	LID:' . session()->get('login_id') . '	execute->' . __METHOD__);

        self::accessLog( __METHOD__ . ' end');

        return view('product/detail', compact('product','status'));
    }

    public function bundle_updates(Request $request)
    {
        $param = [];

        if(empty($request->old('product_id_array')) || empty($request->old('status'))){
            $products = Product::paginate(20);
            return view('product/list', compact('products', 'param'));
        }
        $products = Product::whereIn('product_code', $request->old('product_id_array'))->get();
        $new_status = $request->old('status');
        foreach ($products as $product){
            $status = $product->status()->first();
            if(!empty($status)){
                $status->status = $new_status;
                $status->save();
            }
        }
        $products = Product::paginate(20);

        return view('product/list', compact('products', 'param'));
    }

    public function create()
    {
        return view('product/new');
    }

    public function store(Request $request)
    {
        $product = new Product();
        $product->product_code = $request->input('product_code');
        $product->product_name = $request->input('product_name');
        $product->product_name_kana = $request->input('product_name_kana');
        $product->price = $request->input('price');
        $product->quantity = $request->input('quantity');
        $product->attribute = $request->input('attribute');
        $product->disp_from = $request->input('disp_from');
        $product->disp_to = $request->input('disp_to');
        $product->status = $request->input('status');
        $product->remark = $request->input('remark');
//        $product->product_code = $request->input('product_code');
        $product->save();
        $status = new MngStatus();
        $status->fnc_code = 'prd';
        $status->id = $request->input('product_code');
        $status->status = $request->input('status');
        $status->save();

        return redirect('/products/' . $product->product_code);
    }
}
