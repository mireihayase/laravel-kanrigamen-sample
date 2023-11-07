<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        self::accessLog( __METHOD__ . ' start');
        $paginate = !empty($request->input('paginate')) ? $request->input('paginate') : 20;
        $users = User::paginate($paginate);
        $query = User::query();
        $request->flash();


        if(!empty($request->input('user_no')) ){
            $query = $query->where('user_no', $request->input('user_no'));
        }
        if(!empty($request->input('name')) ){
            $query = $query->where('name', 'LIKE', '%' . $request->input('name') . '%');
        }
        if(!empty($request->input('email')) ){
            $query = $query->where('email', 'LIKE', '%' . $request->input('email') . '%');
        }
        if(!empty($request->input('tel')) ){
            $query = $query->where('tel', 'LIKE', '%' . $request->input('tel') . '%');
        }
        if(!empty($request->input('company_name')) ){
            $query = $query->where('company', 'LIKE', '%' . $request->input('company_name') . '%');
        }
        if ($request->filled('created_from') && $request->filled('created_after')) {
            $start = $request->input('created_from') . ' 00:00:00';
            $end = $request->input('created_after') . ' 23:59:59';
            $query = $query->whereBetween('created_at', [$start, $end]);
        }
        if ($request->filled('updated_from') && $request->filled('updated_after')) {
            $start = $request->input('updated_from') . ' 00:00:00';
            $end = $request->input('updated_after') . ' 23:59:59';
            $query = $query->whereBetween('updated_at', [$start, $end]);
        }

        $users = $query->paginate($paginate);
        $param = $request->input();

        self::accessLog( __METHOD__ . ' end');

        return view('users/list', compact('users', 'param'));
    }

    public function show($id)
    {
        self::accessLog( __METHOD__ . ' start');
        $user = User::where('user_no', $id)->first();
//        $status = $order->status()->first();
        self::accessLog( __METHOD__ . ' end');

        return view('users/detail', compact('user'));
    }
}
