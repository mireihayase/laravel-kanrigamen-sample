<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/favicon.ico">
    <link rel="stylesheet" href="../../css/root.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <title>会員一覧</title>

</head>

<body class="area">
@include('layout/sidebar')
    <!-- ボディコンテンツ ー-->
    <div class="body-area">

        <!--- ボディヘッダエリア -->
        <div class="body-ah">

            <div class="body-ahl">
                <h2 class="body-title">会員一覧</h2>
            </div>

            <div class="body-ahc">
            </div>

            <div class="body-ahr">
                <button onclick="clickBtn1();top()">
                    <i class="bi bi-pencil"></i>
                </button>
                <button onclick="clickBtn2();top()">
                    <i class="bi bi-search"></i>
                </button>

            </div>

        </div>

        <!--- ボディ固定余白エリア -->
        <div class="body-as1"></div>

        <!--- ボディボディエリア -->
        <div class="body-ab">

            <!-- 検索エリア -->
            <div class="body-as">

                <div id="body-a2" class="body-at1">
                    <form method="get" action="/users">
                    <table id='table1'>
                        <tr>
                            <th colspan="4" style="background-color: #00214D!important; color: #fffffe!important;">
                                <h3>検索</h3>
                            </th>
                        </tr>
                        <tr>
                            <td class="table1-a1">会員ID</td>
                            <td class="table1-a2">
                                <input type="text" id="table1-in1"
                                       name="user_no"
                                       value="{{ old('user_no') }}"
                                >
                            </td>
                            <td class="table1-a1">メールアドレス</td>
                            <td class="table1-a2">
                                <input type="text" id="table1-in1" name="email"
                                       value="{{ old('email') }}">
                            </td>
                        </tr>
                        <tr>
                            <td class="table1-a1">氏名</td>
                            <td class="table1-a2"><input type="text" name="name" id="table1-in1"value="{{ old('name') }}"></td>
                            <td class="table1-a1">登録期間</td>
                            <td class="table1-a2">
                                <input type="date" id="table1-in1" name="created_from" value="{{ old('created_from') }}">
                                　〜　
                                <input type="date" id="table1-in1" name="created_after" value="{{ old('created_after') }}">
                            </td>
                        </tr>
                        <tr>
                            <td class="table1-a1">会社名</td>
                            <td class="table1-a2"><input type="text" id="table1-in1" name="company_name" value="{{ old('company_name') }}"></td>
                            <td class="table1-a1">更新期間</td>
                            <td class="table1-a2">
                                <input type="date" id="table1-in1" name="updated_from" value="{{ old('updated_from') }}">
                                　〜　
                                <input type="date" id="table1-in1" name="updated_after" value="{{ old('updated_after') }}">
                            </td>
                        </tr>
                    </table>
                    <div class="table1-fa">
                        <button type="submit">検索</button>
                        {{--<button>CSV出力</button>--}}
                    </div>
                    </form>
                </div>

                {{--<div id="body-a1" class="body-at1">--}}
                    {{--<form method="post" action="/users">--}}
                        {{--<table id='table1'>--}}
                            {{--<tr style="border: none;">--}}
                                {{--<th colspan="4" style="background-color: #00214D!important; color: #fffffe!important;">--}}
                                    {{--<h3>一括操作</h3>--}}
                                {{--</th>--}}
                            {{--</tr>--}}
                        {{--</table>--}}
                        {{--<div class="table1-fa">--}}
                            {{--<button type="submit" name="action" value="1">更新</button>--}}
                            {{--<button type="submit">CSV出力</button>--}}
                        {{--</div>--}}
                        {{--<input type="hidden" name="_token" value="{{ csrf_token() }}" />--}}
                {{--</div>--}}


            </div>
            <div class="scrollbar">
                <div class="inner"></div>
            </div>
            <!-- テーブル１エリア -->
            <div class="body-al">
                <div class="body-at2">
                    <table id='table2'>
                        <tr class="table2-h">
                            <th style="background-color: #00214D!important; color: #fffffe!important;"
                                class="table2-a0"><input id="checkAll" class="table2-b1" type="checkbox"></th>
                            <th style="background-color: #00214D!important; color: #fffffe!important;"
                                class="table2-ab">詳細</th>
                            <th style="background-color: #00214D!important; color: #fffffe!important;"
                                class="table2-a2">会員ID</th>
                            <th style="background-color: #00214D!important; color: #fffffe!important;"
                                class="table2-a2">氏名</th>
                            <th style="background-color: #00214D!important; color: #fffffe!important;"
                                class="table2-a6">会社名</th>
                            <th style="background-color: #00214D!important; color: #fffffe!important;"
                                class="table2-a4">会社コード</th>
                            <th style="background-color: #00214D!important; color: #fffffe!important;"
                                class="table2-a4">メールアドレス</th>
                            <th style="background-color: #00214D!important; color: #fffffe!important;"
                                class="table2-a4">電話番号</th>
                            <th style="background-color: #00214D!important; color: #fffffe!important;"
                                class="table2-a3">登録日時</th>
                            <th style="background-color: #00214D!important; color: #fffffe!important;"
                                class="table2-a3">更新日時</th>
                        </tr>
                        @foreach($users as $user)
                            <tr class="table2-b1t">
                                <td class="center">
                                    <input id="table2-b1-1" class="table2-ai table2-b1 checks" type="checkbox"
                                           name="order_id[]" value="{{$user->user_no}}"
                                    >
                                </td>
                                <td class="padding table2-ab center">
                                    <a href="/users/{{$user->user_no}}">
                                        <div class="table2-b2">詳細</div>
                                    </a>
                                </td>
                                <td class="padding table2-a2" >{{$user->user_no}}</td>
                                <td class="padding table2-a2" >{{$user->name}}</td>
                                <td class="padding table2-a3" >{{$user->company}}</td>
                                <td class="padding table2-a3" >{{$user->company_code}}</td>
                                <td class="padding table2-a3" >{{$user->email}}</td>
                                <td class="padding table2-a3" >{{$user->tel}}</td>
                                <td class="padding table2-a1" >{{$user->created_at}}</td>
                                <td class="padding table2-a1" >{{$user->updated_at}}</td>
                            </tr>
                        @endforeach

                    </table>
                </div>
            </div>

        </div>
        </form>

        <!--- ボディ固定余白エリア -->
        <span class="body-as2"></span>

        <!--- ボディフッタエリア -->
        <div class="body-af">

            <div class="body-afl">
                <label>表示件数：
                    <select name="select-value" onchange="onSelectChange(this)">
                        <option value="20" selected>20件</option>
                        <option value="50">50件</option>
                        <option value="100">全件</option>
                    </select>
                </label>
            </div>

            <div class="">
                {{ $users->links('vendor.pagination.semantic-ui') }}
            </div>

            <div class="body-afr"></div>,

        </div>

    </div>
    <script src="../../js/common.js"></script>
    <script src="../../js/list.js"></script>
    <script src="../../js/list/users.js"></script>
</body>

</html>