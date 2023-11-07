<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/favicon.ico">
    <style>


    </style>
    <link rel="stylesheet" href="../../css/root.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <title>資料請求詳細</title>

</head>

<body class="area">
@include('layout/sidebar')
    <form class="body-area" method="post" action="/requests/{{$request->request_id}}">
        <div class="body-area">
        <div class="body-ah">
            <div class="body-ahl">
                <h2 class="body-title">資料請求詳細</h2>
            </div>
            <div class="body-ahc"></div>
            <div class="body-ahr"></div>
        </div>

        <!--- ボディ固定余白エリア -->
        <div class="body-as1"></div>

        <div class="body-ad">
            <div class="body-at3">
                <table id='table3'>
                    <tbody>
                        <tr>
                            <th>注文番号</th>
                            <td>{{$request->request_id}}</td>
                            <th>会員ID</th>
                            <td>@if(!empty($request->user)){{$request->user->user_no}}@endif</td>
                        </tr>
                        <tr>
                            <th>氏名</th>
                            <td colspan="3" class="ruby-td">
                                <ruby>{{$request->name}}<rt>
                                        {{$request->name_kana}}
                                    </rt></ruby></td>
                        </tr>
                        <tr>
                            <th>会社名</th>
                            <td class="ruby-td"><ruby>
                                    {{$request->company}}
                                    <rt>
                                        {{$request->company_no}}</rt></ruby></td>
                            <th>会社コード</th>
                            <td>
                                @if(!empty($request->user))
                                    {{$request->user->company_code}}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>部署名</th>
                            <td>{{$request->department_name}}</td>
                            <th>役職名</th>
                            <td>{{$request->job_title}}</td>
                        </tr>
                        <tr>
                            <th>メールアドレス</th>
                            <td colspan="3">{{$request->email}}</td>
                        </tr>
                        <tr>
                            <th>電話番号</th>
                            <td>{{$request->tel}}</td>
                            <th>FAX</th>
                            <td>{{$request->fax}}</td>
                        </tr>
                        <tr>
                            <th>郵送先</th>
                            <td colspan="3">〒{{$request->post_code}}
                                {{$request->address1}}
                                {{$request->address2}}
                                {{$request->address3}}</td>
                        </tr>
                        <tr>
                            <th>資料請求種類</th>
                            <td colspan="3">{{$request->request_kind}}</td>
                        </tr>
                        <tr>
                            <th>意見要望</th>
                            <td colspan="3">{{$request->request}}</td>
                        </tr>
                        <tr>
                            <th>備考</th>
                            <td colspan="3">{{$request->remark}}</td>
                        </tr>
                        <tr>
                            <th>登録者ID</th>
                            <td>{{$request->updated_user}}</td>
                            <th>登録日時</th>
                            <td>{{$request->created_at}}</td>
                        </tr>
                        <tr>
                            <th>更新者ID</th>
                            <td>{{$request->updated_user}}</td>
                            <th>更新日時</th>
                            <td>{{$request->updated_at}}</td>
                        </tr>
                        <tr>
                            <th>ステータス</th>
                            <td colspan="3">
                                <input type="radio" name="status" id="table1-in1"
                                       value="D01"
                                       @if($status->status == 'D01')
                                       checked
                                        @endif
                                ><label id="label-ra"
                                        for="table1-in1">新規</label>

                                <input type="radio" name="status" id="table1-in2"
                                       value="D02"
                                       @if($status->status == 'D02')
                                       checked
                                        @endif
                                ><label id="label-ra" for="table1-in2">対応中</label>

                                <input type="radio" name="status" id="table1-in3"
                                       value="D03"
                                       @if($status->status == 'D03')
                                       checked
                                        @endif
                                >
                                <label id="label-ra"
                                       for="table1-in3">発送完了</label>

                                <input type="radio" name="status" id="table1-in4"
                                       value="D04"
                                       @if($status->status == 'D04')
                                       checked
                                        @endif
                                ><label id="label-ra"
                                        for="table1-in4">完了</label>

                                <input type="radio" name="status" id="table1-in5"
                                       value="D09"
                                       @if($status->status == 'D09')
                                       checked
                                        @endif
                                ><label id="label-ra"
                                        for="table1-in5">破棄</label>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>


            <!--- ボディ固定余白エリア -->
            <span class="body-as2"></span>

            <!--- ボディフッタエリア -->
            <div class="body-af">

                <div class="body-afl">
                    <button onclick="back()">
                        <a href="/requests" style="text-decoration: none;">
                        <i class="bi bi-arrow-left"></i>
                        　戻る
                        </a>
                    </button>
                </div>

                <div class="body-afc">
                    <button type="submit" id="center-b" style="font-weight:bold;">
                        <i class="bi bi-plus-lg"></i>
                        　更新する
                    </button>
                </div>

                <div class="body-afr">
                    <button style="font-weight:bold;">
                        <a href="/pdfoutput/requests/{{$request->request_id}}" style="text-decoration: none;">
                        <i class="bi bi-download"></i>
                        　 PDF出力
                        </a>
                    </button>
                </div>

            </div>
        </div>
            <input type="hidden" value="{{$request->request_id}}" name="request_id">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    </form>
        {{--<script src="../../js/common.js"></script>--}}

</body>

</html>