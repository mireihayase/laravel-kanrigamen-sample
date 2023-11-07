<!DOCTYPE html>
<html lang="ja">

<head>
    @include('layout/head')
    <title>管理者情報更新</title>

</head>

<body class="area">
@include('layout/sidebar')

    <!-- ボディコンテンツ ー-->
    <div class="body-area">

        <!--- ボディヘッダエリア -->
        <div class="body-ah">

            <div class="body-ahl">
                <h2 class="body-title">管理者情報更新</h2>
            </div>

            <div class="body-ahc">
            </div>

            <div class="body-ahr">

            </div>

        </div>

        <!--- ボディ固定余白エリア -->
        <div class="body-as1"></div>

        <!--- ボディボディエリア -->
        <form method="post" action="/setting">
        <div class="">
            <div class="">
                <div class="body-at3">
                    <table id='table3'>
                        <tr>
                            <th class="table3-l"> 管理者ID </th>
                            <td class="table3-r">
                                <input type="text" name="login_id"  value="{{$admin_user->login_id}}"> </td>
                        </tr>
                        <tr>
                            <th class="table3-l"> password </th>
                            <td class="table3-r">
                                <input type="password" name="password" value=""> </td>
                        </tr>
                        {{--<tr>--}}
                            {{--<th class="table3-l"> password（確認用） </th>--}}
                            {{--<td class="table3-r"> <input type="password" value="value"> </td>--}}
                        {{--</tr>--}}
                        <tr>
                            <th class="table3-l"> メールアドレス </th>
                            <td class="table3-r"> <input type="text" name="email" value="{{$admin_user->email}}"> </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <!--- ボディ固定余白エリア -->
        <span class="body-as2"></span>

        <!--- ボディフッタエリア -->
        <div class="body-af">

            <div class="body-afl">
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="body-afc">
                <button id="center-b" style="font-weight:bold;">
                    <i class="bi bi-plus-lg"></i>
                    　更新する
                </button>
            </div>

            <div class="body-afr">
            </div>

        </div>
    </form>

    </div>
    <script src="../../js/common.js"></script>
    <script src="../../js/list.js"></script>
</body>

</html>