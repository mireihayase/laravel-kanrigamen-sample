<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\MngStatus;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        session(['status' => ['C01','C02']]);
        if(!empty($request->input('paginate')) ){
            session(['contact.paginate' => $request->input('paginate')]);
            return to_route('contact.search')->withInput();
        }
        session(['status' => ['C01','C02']]);
        $paginate = 20;
        $query = Contact::query();
        $query = $query->whereIn(
            'contacts.contact_id',
            MngStatus::query()
                ->whereIn('status', ['C01','C02'])
                ->select('mng_status.id')
        );
        $contacts = $query->paginate($paginate);
        $param = [];
        return view('contact/list', compact('contacts', 'param'));
    }

    public function search(Request $request)
    {
        $paginate = !empty($request->session()->get('contact.paginate')) ? $request->session()->get('contact.paginate') : 20;
        $contacts = Contact::paginate($paginate);
        $query = Contact::query();

        if(!empty($request->old('contact_id'))  || $request->session()->get('contact_id')){
            session(['contact_id' => $request->old('contact_id')]);
            $query = $query->where('contact_id', 'LIKE', '%' . $request->old('contact_id') . '%');
        }
        if(!empty($request->old('email'))  || $request->session()->get('email')){
            session(['email' => $request->old('email')]);
            $query = $query->where('email', 'LIKE', '%' . $request->old('email') . '%');
        }
        if(!empty($request->old('tel'))  || $request->session()->get('tel')){
            session(['tel' => $request->old('tel')]);
            $query = $query->where('tel', 'LIKE', '%' . $request->old('tel') . '%');
        }
        if(!empty($request->old('kind'))  || $request->session()->get('kind')){
            session(['kind' => $request->old('kind')]);
            $query = $query->where('contact_kind', 'LIKE', '%' . $request->input('kind') . '%');
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
                'contacts.contact_id',
                MngStatus::query()
                    ->whereIn('status', $status_array)
                    ->select('mng_status.id')
            );
        }else{
            $query = $query->whereIn(
                'contacts.contact_id',
                MngStatus::query()
                    ->whereIn('status', ['C01','C02'])
                    ->select('mng_status.id')
            );
        }
        $contacts = $query->paginate($paginate);
        $param = $request->old();
        unset($param['action']);
        unset($param['_token']);

        return view('contact/list', compact('contacts','param'));
    }

    public function action(Request $request)
    {
        $request->flash();
        if($request->input('action') == 'search'){
            return to_route('contact.search')->withInput();
        }

        if($request->input('action') == 'update'){
            return to_route('contact.bundle_updates')->withInput();
        }

        if($request->input('action') == 'pdf'){
            $param = [];
            if(empty($request->old('contact_id_array')) || empty($request->old('status'))){
                $contacts = Contact::paginate(20);
                return view('contact/list', compact('contacts', 'param'));
            }
            $ids_array = $request->input('contact_id_array');
            $pdf = PdfOutputController::multi_contacts($ids_array);
            //download
            return $pdf;
            //displayy
//            return $pdf->stream();
        }
    }

    public function show($id)
    {
        $contact = Contact::where('contact_id', $id)->first();
        $status = $contact->status()->first();
        return view('contact/detail', compact('contact', 'status'));
    }

    public function update(Request $request)
    {
        self::accessLog( __METHOD__ . ' start');
        $contact = Contact::where('contact_id', $request->input('contact_id'))->first();
        $contact->status = $request->input('status');
        $contact->save();
        $status = $contact->status()->first();
        $status->status = $request->input('status');
        $status->save();
        self::accessLog('SID:' . session()->getId() . '	LID:' . session()->get('login_id') . '	execute->' . __METHOD__);
        self::accessLog( __METHOD__ . ' end');

        return view('contact/detail', compact('contact', 'status'));
    }

    public function bundle_updates(Request $request)
    {
        $param = [];
        if(empty($request->old('contact_id_array')) || empty($request->old('status'))){
            $contacts = Contact::paginate(20);
            return view('contact/list', compact('contacts', 'param'));
        }
        $contacts = Contact::whereIn('contact_id', $request->old('contact_id_array'))->get();
        $new_status = $request->old('status');
        foreach ($contacts as $model){
            $status = $model->status()->first();
            $status->status = $new_status;
            $status->save();
        }
        $contacts = Contact::paginate(20);

        return view('contact/list', compact('contacts','status'));
    }
}
