<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CsvOutputController extends Controller
{
    public function order(){
        $fp = fopen('php://output', 'w');
        $file_name = 'test.csv';
        $data = [
            ['email'  =>  'email' , 'name'  =>  'name' ],
            ['email'  =>  '1' , 'name'  =>  '1' ],
            ['email'  =>  '2' , 'name'  =>  '2' ],
            ['email'  =>  '3' , 'name'  =>  '3' ]
        ];
        foreach ($data as $row) {
            fputcsv($fp, $row, ',', '"');
        }
        fclose($fp);
        // header('Content-Type: application/octet-stream');
        header("Content-Disposition: attachment; filename={$file_name}");
        // header('Content-Transfer-Encoding: binary');
    }

// // インスタンスを生成する
//         $csvExporter = new \Laracsv\Export();
//         $collection = collect(['email'  =>  '1' , 'name'  =>  '1' ], ['email'  =>  '2' , 'name'  =>  '2' ],['email'  =>  '3' , 'name'  =>  '3' ]);

//         // 第一引数にCollectionを、第二引数にCSVで出力したいモデルのカラム名を入力する
//         $csvExporter->build($collection, ['email', 'name']);
//         return $csvExporter->download();
    }
