<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/favicon.ico">
    <link rel="stylesheet" href="../../css/root.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <title>会員詳細</title>

</head>

<body class="area">
@include('layout/sidebar')

    <div class="body-area">

        <div class="body-ah">
            <div class="body-ahl">
                <h2 class="body-title">会員詳細</h2>
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
                            <th>会員ID</th>
                            <td colspan="3" class="ruby-td">
                                {{$user->user_no}}</td>
                        </tr>
                        <tr>
                            <th>氏名</th>
                            <td colspan="3" class="ruby-td">
                                <ruby>{{$user->name}}<rt>
                                        {{$user->name_kana}}
                                    </rt></ruby></td>
                        </tr>
                        <tr>
                            <th>会社名</th>
                            <td class="ruby-td"><ruby>
                                    {{$user->company}}
                                    <rt>
                                        {{$user->company_no}}</rt></ruby></td>
                            <th>会社コード</th>
                            <td>
                                @if(!empty($user->user))
                                    {{$user->user->company_code}}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>部署名</th>
                            <td>{{$user->department_name}}</td>
                            <th>役職名</th>
                            <td>{{$user->job_title}}</td>
                        </tr>
                        <tr>
                            <th>メールアドレス</th>
                            <td colspan="3">{{$user->email}}</td>
                        </tr>
                        <tr>
                            <th>電話番号</th>
                            <td>{{$user->tel}}</td>
                            <th>FAX</th>
                            <td>{{$user->fax}}</td>
                        </tr>
                        <tr>
                            <th>郵送先</th>
                            <td colspan="3">〒{{$user->post_code}}
                                {{$user->address1}}
                                {{$user->address2}}
                                {{$user->address3}}
                            </td>
                        </tr>
                        <tr>
                            <th>備考</th>
                            <td colspan="3">記載なし</td>
                        </tr>
                        <tr>
                            <th>登録者ID</th>
                            <td>{{$user->updated_user}}</td>
                            <th>登録日時</th>
                            <td>{{$user->created_at}}</td>
                        </tr>
                        <tr>
                            <th>更新者ID</th>
                            <td>{{$user->updated_user}}</td>
                            <th>更新日時</th>
                            <td>{{$user->updated_at}}</td>
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
                        <a href="/users" style="text-decoration: none;">
                        <i class="bi bi-arrow-left"></i>
                        　戻る
                        </a>
                    </button>
                </div>



            </div>
        </div>
        <script src="../../js/common.js"></script>

</body>

</html>