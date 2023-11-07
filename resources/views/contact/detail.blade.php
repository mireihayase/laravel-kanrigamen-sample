<!DOCTYPE html>
<html lang="ja">

@include('layout/head')
<head>
    <title>詳細</title>
</head>

<body class="area">
@include('layout/sidebar')
    <form class="body-area" method="post" action="/contacts/{{$contact->contact_id}}">
        <div class="body-ah">
            <div class="body-ahl">
                <h2 class="body-title">詳細タイトル</h2>
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
                            <th>お問い合わせID</th>
                            <td>{{$contact->contact_no}}</td>
                            <th>会員ID</th>
                            <td>{{$contact->user_no}}</td>
                        </tr>
                        <tr>
                            <th>氏名</th>
                            <td colspan="3" class="ruby-td"><ruby>{{$contact->name}}
                                    <rt>
                                        {{$contact->name_kana}}
                                    </rt></ruby></td>
                        </tr>
                        <tr>
                            <th>会社名</th>
                            <td class="ruby-td"><ruby>{{$contact->company}}<rt>
                                        {{$contact->company_kana}}
                                    </rt></ruby></td>
                            <th>会社コード</th>
                            <td>{{$contact->user->company_code}}</td>
                        </tr>
                        <tr>
                            <th>部署名</th>
                            <td>{{$contact->user->department_name}}</td>
                            <th>役職名</th>
                            <td>{{$contact->job_title}}</td>
                        </tr>
                        <tr>
                            <th>メールアドレス</th>
                            <td colspan="3">{{$contact->email}}</td>
                        </tr>
                        <tr>
                            <th>電話番号</th>
                            <td>{{$contact->tel}}</td>
                            <th>FAX</th>
                            <td>{{$contact->fax}}</td>
                        </tr>
                        <tr>
                            <th>所在地</th>
                            <td colspan="3">〒{{$contact->post_code}}
                                {{$contact->address1}}
                                {{$contact->address2}}
                                {{$contact->address3}}</td>
                        </tr>
                        <tr>
                            <th>お問い合わせ種類</th>
                            <td colspan="3">{{$contact->contact_kind}}</td>
                        </tr>
                        <tr>
                            <th>お問い合わせ内容</th>
                            <td colspan="3">{{$contact->contact_contents}}</td>
                        </tr>
                        <tr>
                            <th>備考</th>
                            <td colspan="3">{{$contact->remark}}</td>
                        </tr>
                        <tr>
                            <th>登録者ID</th>
                            <td>{{$contact->updated_user}}</td>
                            <th>登録日時</th>
                            <td>{{$contact->created_at}}</td>
                        </tr>
                        <tr>
                            <th>更新者ID</th>
                            <td>{{$contact->updated_user}}</td>
                            <th>更新日時</th>
                            <td>{{$contact->updated_at}}</td>
                        </tr>
                        <tr>
                            <th>ステータス</th>
                            <td colspan="3">
                                <input type="radio" name="status" id="table1-in1"
                                       value="C01"
                                       @if($status->status == 'C01')
                                       checked
                                        @endif
                                ><label id="label-ra"
                                    for="table1-in1">未対応</label>
                                <input type="radio" name="status" id="table1-in2"
                                       value="C02"
                                       @if($status->status == 'C02')
                                       checked
                                        @endif
                                ><label id="label-ra"
                                    for="table1-in2">確認中</label>
                                <input type="radio" name="status" id="table1-in3"
                                       value="C03"
                                       @if($status->status == 'C03')
                                       checked
                                        @endif
                                ><label id="label-ra"
                                    for="table1-in3">対応済み</label>
                                <input type="radio" name="status" id="table1-in4"
                                       value="C04"
                                       @if($status->status == 'C04')
                                       checked
                                        @endif
                                ><label id="label-ra"
                                    for="table1-in4">完了</label>
                                <input type="radio" name="status" id="table1-in5"
                                       value="C09"
                                       @if($status->status == 'C09')
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
                        <a href="/contacts" style="text-decoration: none;">
                        <i class="bi bi-arrow-left"></i>
                        　戻る
                        </a>
                    </button>
                </div>

                <div class="body-afc">
                    <button id="center-b" style="font-weight:bold;">
                        <i class="bi bi-plus-lg"></i>
                        　更新する
                    </button>
                </div>

                <div class="body-afr">
                    <button style="font-weight:bold;">
                        <a href="/pdfoutput/contact/{{$contact->contact_id}}" style="text-decoration: none;">
                        <i class="bi bi-download"></i>
                        　 PDF出力
                        </a>
                    </button>
                </div>

            </div>
        </div>
        <input type="hidden" value="{{$contact->contact_id}}" name="contact_id">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        </form>

</body>

</html>