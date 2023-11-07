<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
//use App
//App::setLocale('ja');
use Storage;
use App\Models\Order;
use App\Models\Contact;
use App\Models\Request;

class PdfOutputController extends Controller
{
    public function order($order_id){
        self::accessLog( __METHOD__ . ' start' . date('Y/m/d H:i:s', strtotime('now')));
        ini_set("memory_limit", "512M");

        $file_name = $order_id . ".pdf";
        // $datetime = now();
        $order = Order::where('order_id', $order_id)->first();
        $order_details = $order->order_details()->get();

        $mtime = explode('.', microtime(true));
        $datetime_foldername = date('YmdHis', $mtime[0]);
        $output_datetime = date('Y/m/d H:i:s', $mtime[0]);

        $dir_0 = env('DocumentRoot') . '/storage/app/' . 'pdfoutput' . '/' . $datetime_foldername;
        $dir_1 = 'pdfoutput' . '/' . $datetime_foldername;
        $dir_2 = $dir_0 . '/' . $file_name;
        $company_code = !empty($order->user) ? $order->user->company_code:  '';

        // Storage::makeDirectory('storage/'. $datetime);
        Storage::makeDirectory($dir_1);
        $contents = [
            'title' => "注文書",
            'id' => $order_id,
            'output_datetime' => $output_datetime,
            'created_at' => date('Y/m/d H:i:s', strtotime($order->created_at)),
            'company_kana' => $order->company_kana,
            'company' => $order->company,
            'company_code' =>  $company_code,
            'company_kana' => $order->company_kana,
            'department_name' => $order->department_name,
            'job_title' => $order->job_title,
            'name_kana' => $order->name_kana,
            'name' => $order->name,
            'post_code' => $order->post_code,
            'address' => $order->address1 . $order->address2 . $order->address3,
            'tel' => $order->tel,
            'fax' => $order->fax,
            'email' => $order->email,
            'user_dm' => '必要',
            'payment_method' => $order->payment_method,
            'order_details' => $order_details,
            'remark' => $order->remark,
            'total' => $order->total,
            'tax' => $order->tax,
            'postage' => $order->postage,
            'send_name' => $order->send_name,
            'send_name_kana' => $order->send_name_kana,
            'send_company' => $order->send_company,
            'send_department_name' => $order->send_department_name,
            'send_job_title' => $order->send_job_title,
            'send_tel' => $order->send_tel,
            'send_post_code' => $order->send_post_code,
            'send_address' => $order->send_address1 . $order->send_address2 . $order->send_address3,
        ];
//        return view('pdf/order', compact('contents'));
        $image_path = public_path('/img/icon.png');
        $image_data = base64_encode(file_get_contents($image_path));

        $pdf_save = \PDF::loadView('pdf/order', ['contents' => $contents, 'image_data' => $image_data]);
        $pdf_save -> setPaper('A4');
        $pdf_save -> save($dir_0 . '/' . $file_name);
        
        $pdf = \PDF::loadView('pdf/order', ['contents' => $contents, 'image_data' => $image_data]);
//        $pdf = \PDF::loadView('pdf/order_past', ['contents' => $contents]);
        $pdf -> setPaper('A4');

        self::accessLog( __METHOD__ . ' end' . date('Y/m/d H:i:s', strtotime('now')));
//        return $pdf->download($file_name);
        return $pdf->stream();
    }

    public static function setOrderParams($order_id){
        $order = Order::where('order_id', $order_id)->first();
        $order_details = $order->order_details()->get();

        $mtime = explode('.', microtime(true));
        $output_datetime = date('Y/m/d H:i:s', $mtime[0]);
        $company_code = !empty($order->user) ? $order->user->company_code:  '';

        $contents = [
            'title' => "注文書",
            'id' => $order_id,
            'output_datetime' => $output_datetime,
            'created_at' => date('Y/m/d H:i:s', strtotime($order->created_at)),
            'company_kana' => $order->company_kana,
            'company' => $order->company,
            'company_code' =>  $company_code,
            'company_kana' => $order->company_kana,
            'department_name' => $order->department_name,
            'job_title' => $order->job_title,
            'name_kana' => $order->name_kana,
            'name' => $order->name,
            'post_code' => $order->post_code,
            'address' => $order->address1 . $order->address2 . $order->address3,
            'tel' => $order->tel,
            'fax' => $order->fax,
            'email' => $order->email,
            'user_dm' => '必要',
            'payment_method' => $order->payment_method,
            'order_details' => $order_details,
            'remark' => $order->remark,
            'total' => $order->total,
            'tax' => $order->tax,
            'postage' => $order->postage,
            'send_name' => $order->send_name,
            'send_name_kana' => $order->send_name_kana,
            'send_company' => $order->send_company,
            'send_department_name' => $order->send_department_name,
            'send_job_title' => $order->send_job_title,
            'send_tel' => $order->send_tel,
            'send_post_code' => $order->send_post_code,
            'send_address' => $order->send_address1 . $order->send_address2 . $order->send_address3,
        ];

        return $contents;
    }

    public static function multi_orders($ids_array)
    {
        ini_set("memory_limit", "51200M");
        $file_name = '1' . ".pdf";
        $mtime = explode('.', microtime(true));
        $datetime_foldername = date('YmdHis', $mtime[0]);


        $dir_0 = env('DocumentRoot') . '/storage/app/' . 'pdfoutput' . '/' . $datetime_foldername;
        $dir_1 = 'pdfoutput' . '/' . $datetime_foldername;
        $dir_2 = $dir_0 . '/' . $file_name;

        $order_ids_array = $ids_array;
        $contents_array = [];
        foreach ($order_ids_array as $order_id){
            $contents_array[] = self::setOrderParams($order_id);
        }

        $image_path = public_path('/img/icon.png');
        $image_data = base64_encode(file_get_contents($image_path));

        $pdf_save = \PDF::loadView('pdf/order_multi', ['contents_array' => $contents_array, 'image_data' => $image_data]);
        $pdf_save -> setPaper('A4');
//        $pdf_save -> save($dir_0 . '/' . $file_name);
        $pdf_save -> save($dir_0  . $file_name);

        $pdf = \PDF::loadView('pdf/order_multi', ['contents_array' => $contents_array, 'image_data' => $image_data]);
//        $pdf = \PDF::loadView('pdf/order_past', ['contents' => $contents]);
        $pdf -> setPaper('A4');

        self::accessLog( __METHOD__ . ' end' . date('Y/m/d H:i:s', strtotime('now')));
        return $pdf->download($file_name);
//        return $pdf->stream();
    }

    public function requests($request_id){
        self::accessLog( __METHOD__ . ' start' . date('Y/m/d H:i:s', strtotime('now')));
        ini_set("memory_limit", "512M");

        $file_name = $request_id . ".pdf";
        // $datetime = now();
        $request = Request::where('request_id', $request_id)->first();

        $mtime = explode('.', microtime(true));
        $datetime_foldername = date('YmdHis', $mtime[0]);
        $output_datetime = date('Y/m/d H:i:s', $mtime[0]);

        $dir_0 = env('DocumentRoot') . '/storage/app/' . 'pdfoutput' . '/' . $datetime_foldername;
        $dir_1 = 'pdfoutput' . '/' . $datetime_foldername;
        $dir_2 = $dir_0 . '/' . $file_name;
        $company_code = !empty($request->user) ? $request->user->company_code:  '';

        // Storage::makeDirectory('storage/'. $datetime);
        Storage::makeDirectory($dir_1);
        $contents = [
            'title' => "注文書",
            'id' => $request_id,
            'output_datetime' => $output_datetime,
            'created_at' => date('Y/m/d H:i:s', strtotime($request->created_at)),
            'company_kana' => $request->company_kana,
            'company' => $request->company,
            'company_code' => $company_code,
            'company_kana' => $request->company_kana,
            'department_name' => $request->department_name,
            'job_title' => $request->job_title,
            'name_kana' => $request->name_kana,
            'name' => $request->name,
            'post_code' => $request->post_code,
            'address' => $request->address1 . $request->address2 . $request->address3,
            'tel' => $request->tel,
            'fax' => $request->fax,
            'email' => $request->email,
            'user_dm' => '必要',
            'payment_method' => $request->payment_method,
            'remark' => $request->remark,
            'total' => $request->total,
            'tax' => $request->tax,
            'postage' => $request->postage,
            'request_kind' => $request->request_kind,
            'request' => $request->request,
        ];
        $image_path = public_path('/img/icon.png');
        $image_data = base64_encode(file_get_contents($image_path));

        $pdf_save = \PDF::loadView('pdf/requests', ['contents' => $contents, 'image_data' => $image_data]);
        $pdf_save -> setPaper('A4');
        $pdf_save -> save($dir_0 . '/' . $file_name);
        
        $pdf = \PDF::loadView('pdf/requests', ['contents' => $contents, 'image_data' => $image_data]);
//        $pdf = \PDF::loadView('pdf/order_past', ['contents' => $contents]);
        $pdf -> setPaper('A4');

        self::accessLog( __METHOD__ . ' end' . date('Y/m/d H:i:s', strtotime('now')));
        // return $pdf->download($file_name);

//        return view('pdf/requests', compact('contents'));
        return $pdf->stream();
    }

    public static function setRequestParams($id){
        $request = Request::where('request_id', $id)->first();

        $mtime = explode('.', microtime(true));
        $output_datetime = date('Y/m/d H:i:s', $mtime[0]);
        $company_code = !empty($request->user) ? $request->user->company_code:  '';

        $contents = [
            'title' => "注文書",
            'id' => $id,
            'output_datetime' => $output_datetime,
            'created_at' => date('Y/m/d H:i:s', strtotime($request->created_at)),
            'company_kana' => $request->company_kana,
            'company' => $request->company,
            'company_code' => $company_code,
            'company_kana' => $request->company_kana,
            'department_name' => $request->department_name,
            'job_title' => $request->job_title,
            'name_kana' => $request->name_kana,
            'name' => $request->name,
            'post_code' => $request->post_code,
            'address' => $request->address1 . $request->address2 . $request->address3,
            'tel' => $request->tel,
            'fax' => $request->fax,
            'email' => $request->email,
            'user_dm' => '必要',
            'payment_method' => $request->payment_method,
            'remark' => $request->remark,
            'total' => $request->total,
            'tax' => $request->tax,
            'postage' => $request->postage,
            'request_kind' => $request->request_kind,
            'request' => $request->request
        ];

        return $contents;
    }

    public static function multi_requests($ids_array)
    {
        ini_set("memory_limit", "512M");
        $file_name = '1' . ".pdf";
        $mtime = explode('.', microtime(true));
        $datetime_foldername = date('YmdHis', $mtime[0]);


        $dir_0 = env('DocumentRoot') . '/storage/app/' . 'pdfoutput' . '/' . $datetime_foldername;
        $dir_1 = 'pdfoutput' . '/' . $datetime_foldername;
        $dir_2 = $dir_0 . '/' . $file_name;

        $contents_array = [];
        foreach ($ids_array as $id){
            $contents_array[] = self::setRequestParams($id);
        }

        $image_path = public_path('/img/icon.png');
        $image_data = base64_encode(file_get_contents($image_path));

        $pdf_save = \PDF::loadView('pdf/requests_multi', ['contents_array' => $contents_array, 'image_data' => $image_data]);
        $pdf_save -> setPaper('A4');
//        $pdf_save -> save($dir_0 . '/' . $file_name);
        $pdf_save -> save($dir_0  . $file_name);

        $pdf = \PDF::loadView('pdf/requests_multi', ['contents_array' => $contents_array, 'image_data' => $image_data]);
        $pdf -> setPaper('A4');

        self::accessLog( __METHOD__ . ' end' . date('Y/m/d H:i:s', strtotime('now')));
        // return $pdf->download($file_name);
        return $pdf->stream();
    }

    public function contact($contact_id){
        self::accessLog( __METHOD__ . ' start' . date('Y/m/d H:i:s', strtotime('now')));
        ini_set("memory_limit", "512M");

        $file_name = $contact_id . ".pdf";
        // $datetime = now();
        $contact = Contact::where('contact_id', $contact_id)->first();

        $mtime = explode('.', microtime(true));
        $datetime_foldername = date('YmdHis', $mtime[0]);
        $output_datetime = date('Y/m/d H:i:s', $mtime[0]);

        $dir_0 = env('DocumentRoot') . '/storage/app/' . 'pdfoutput' . '/' . $datetime_foldername;
        $dir_1 = 'pdfoutput' . '/' . $datetime_foldername;
        $dir_2 = $dir_0 . '/' . $file_name;

        // Storage::makeDirectory('storage/'. $datetime);
        Storage::makeDirectory($dir_1);
        $contents = [
            'title' => "お問い合わせ",
            'id' => $contact_id,
            'output_datetime' => $output_datetime,
            'company_kana' => $contact->company_kana,
            'company' => $contact->company,
            'company_code' => $contact->user->company_code,
            'department_name' => $contact->department_name,
            'job_title' => $contact->job_title,
            'name_kana' => $contact->name_kana,
            'name' => $contact->name,
            'post_code' => $contact->post_code,
            'address' => $contact->address1 . $contact->address2 . $contact->address3,
            'tel' => $contact->tel,
            'fax' => $contact->fax,
            'email' => $contact->email,
            'user_dm' => '必要',
            'remark' => $contact->remark,
            'contact_kind' => $contact->contact_kind,
            'contact_contents' => $contact->contact_contents,
        ];
        $image_path = public_path('/img/icon.png');
        $image_data = base64_encode(file_get_contents($image_path));

        $pdf_save = \PDF::loadView('pdf/contacts', ['contents' => $contents, 'image_data' => $image_data]);
        $pdf_save -> setPaper('A4');
        $pdf_save -> save($dir_0 . '/' . $file_name);
        
        $pdf = \PDF::loadView('pdf/contacts', ['contents' => $contents, 'image_data' => $image_data]);
        $pdf -> setPaper('A4');

        self::accessLog( __METHOD__ . ' end' . date('Y/m/d H:i:s', strtotime('now')));
        // return $pdf->download($file_name);
        return $pdf->stream();
    }

    public function order_html($order_id){
        self::accessLog( __METHOD__ . ' start');

        $file_name = $order_id . ".pdf";
        // $datetime = now();
        $order = Order::where('order_id', $order_id)->first();
        $order_details = $order->order_details()->get();

        $mtime = explode('.', microtime(true));
        $datetime_foldername = date('YmdHis', $mtime[0]);
        $output_datetime = date('Y/m/d H:i:s', $mtime[0]);
        $company_code = !empty($order->user) ? $order->user->company_code:  '';

        $dir_0 = env('DocumentRoot') . '/storage/app/' . 'pdfoutput' . '/' . $datetime_foldername;
        $dir_1 = 'pdfoutput' . '/' . $datetime_foldername;
        $dir_2 = $dir_0 . '/' . $file_name;

        // Storage::makeDirectory('storage/'. $datetime);
        Storage::makeDirectory($dir_1);
        $contents = [
            'title' => "注文書",
            'id' => $order_id,
            'output_datetime' => $output_datetime,
            'created_at' => date('Y/m/d H:i:s', strtotime($order->created_at)),
            'company_kana' => $order->company_kana,
            'company' => $order->company,
            'company_code' => $company_code,
            'company_kana' => $order->company_kana,
            'department_name' => $order->department_name,
            'job_title' => $order->job_title,
            'name_kana' => $order->name_kana,
            'name' => $order->name,
            'post_code' => $order->post_code,
            'address' => $order->address1 . $order->address2 . $order->address3,
            'tel' => $order->tel,
            'fax' => $order->fax,
            'email' => $order->email,
            'user_dm' => '必要',
            'payment_method' => $order->payment_method,
            'order_details' => $order_details,
            'remark' => $order->remark,
            'total' => $order->total,
            'tax' => $order->tax,
            'postage' => $order->postage,
            'send_name' => $order->send_name,
            'send_name_kana' => $order->send_name_kana,
            'send_company' => $order->send_company,
            'send_department_name' => $order->send_department_name,
            'send_job_title' => $order->send_job_title,
            'send_tel' => $order->send_tel,
            'send_post_code' => $order->send_post_code,
            'send_address' => $order->send_address1 . $order->send_address2 . $order->send_address3,
        ];
//        return view('pdf_past/order', compact('contents'));
        return view('pdf/order', compact('contents'));

    }

    public static function setContactParams($id){
        $contact = Contact::where('request_id', $id)->first();

        $mtime = explode('.', microtime(true));
        $output_datetime = date('Y/m/d H:i:s', $mtime[0]);
//        $company_code = !empty($contact->user) ? $contact->user->company_code:  '';

        $contents = [
            'title' => "お問い合わせ",
            'id' => $id,
            'output_datetime' => $output_datetime,
            'company_kana' => $contact->company_kana,
            'company' => $contact->company,
            'company_code' => $contact->user->company_code,
            'department_name' => $contact->department_name,
            'job_title' => $contact->job_title,
            'name_kana' => $contact->name_kana,
            'name' => $contact->name,
            'post_code' => $contact->post_code,
            'address' => $contact->address1 . $contact->address2 . $contact->address3,
            'tel' => $contact->tel,
            'fax' => $contact->fax,
            'email' => $contact->email,
            'user_dm' => '必要',
            'remark' => $contact->remark,
            'contact_kind' => $contact->contact_kind,
            'contact_contents' => $contact->contact_contents,
        ];

        return $contents;
    }

    public static function multi_contacts($ids_array)
    {
        ini_set("memory_limit", "512M");
        $file_name = '1' . ".pdf";
        $mtime = explode('.', microtime(true));
        $datetime_foldername = date('YmdHis', $mtime[0]);


        $dir_0 = env('DocumentRoot') . '/storage/app/' . 'pdfoutput' . '/' . $datetime_foldername;
        $dir_1 = 'pdfoutput' . '/' . $datetime_foldername;
        $dir_2 = $dir_0 . '/' . $file_name;

        $contents_array = [];
        foreach ($ids_array as $id){
            $contents_array[] = self::setContactParams($id);
        }

        $image_path = public_path('/img/icon.png');
        $image_data = base64_encode(file_get_contents($image_path));

        $pdf_save = \PDF::loadView('pdf/contacts_multi', ['contents_array' => $contents_array, 'image_data' => $image_data]);
        $pdf_save -> setPaper('A4');
//        $pdf_save -> save($dir_0 . '/' . $file_name);
        $pdf_save -> save($dir_0  . $file_name);

        $pdf = \PDF::loadView('pdf/contacts_multi', ['contents_array' => $contents_array, 'image_data' => $image_data]);
        $pdf -> setPaper('A4');

        self::accessLog( __METHOD__ . ' end' . date('Y/m/d H:i:s', strtotime('now')));
        return $pdf->download($file_name);
//        return $pdf->stream();
    }

}
