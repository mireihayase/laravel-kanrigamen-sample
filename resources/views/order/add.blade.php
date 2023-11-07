<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/favicon.ico">
    <link rel="stylesheet" href="../css/root.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <title>追加</title>
</head>

<body class="area">
    <!-- メニューエリア -->
    <div class="menu-area">

        <!-- メニューヘッダエリア -->
        <div class="menu-ah">
            <img class="menu-logo" src="../img/logo.png">
        </div>

        <!-- メニューボディエリア -->
        <nav class="menu-ab">
            <button onclick="list()">
                <span class="menu-buttun">
                    <i class="bi bi-cart menu-i"></i>
                    <p class="menu-l">注文</p>
                </span>
            </button>
            <button onclick="list()">
                <span class="menu-buttun">
                    <i class="bi bi-clipboard2 menu-i"></i>
                    <p class="menu-l">商品</p>
                </span>
            </button>
            <button onclick="list()">
                <span class="menu-buttun">
                    <i class="bi bi-envelope menu-i"></i>
                    <p class="menu-l">お問い合せ</p>
                </span>
            </button>
            <button onclick="list()">
                <span class="menu-buttun">
                    <i class="bi bi-book menu-i"></i>
                    <p class="menu-l">資料請求</p>
                </span>
            </button>
            <button onclick="list()">
                <span class="menu-buttun">
                    <i class="bi bi-person menu-i"></i>
                    <p class="menu-l">会員</p>
                </span>
            </button>
        </nav>

        <nav class="menu-af" style="display:contents;">
        	<button onclick="setting()" >
                <span class="menu-buttun">
                    <i class="bi bi-wrench menu-i"></i>
                    <p class="menu-l">設定</p>
                </span>
            </button>
            <button onclick="logout()">
                <span class="menu-buttun">
                    <i class="bi bi-box-arrow-in-left menu-i"></i>
                    <p class="menu-l">ログアウト</p>
                </span>
            </button>
         </nav>
        
    </div>

    <!-- ボディコンテンツ ー-->
    <div class="body-area">

        <!--- ボディヘッダエリア -->
        <div class="body-ah">

            <div class="body-ahl">
                <h2 class="body-title">追加タイトル</h2>
            </div>

            <div class="body-ahc"></div>

            <div class="body-ahr"></div>

        </div>

        <!--- ボディ固定余白エリア -->
        <div class="body-as1"></div>


        <!--- ボディボディエリア -->
        <div class="body-ab">

            <!-- テーブル２エリア -->
            <div class="body-ab">
                <div class="body-ad">
                    <div class="body-at3">
                        <table id='table3'>
                            <tr>
                                <th>タイトル</th>
                                <td><input type="text"></td>
                            </tr>
                            <tr>
                                <th>タイトル</th>
                                <td><label for="table1-in2"><input type="checkbox" id="table1-in2">チェック1</label>
                                    <label for="table1-in3"><input type="checkbox" id="table1-in3">チェック2</label>
                                </td>
                            </tr>
                            <tr>
                                <th>タイトル</th>
                                <td>内容</td>
                            </tr>
                            <tr>
                                <th>タイトル</th>
                                <td><input type="text"></td>
                            </tr>
                            <tr>
                                <th>タイトル</th>
                                <td><label for="table1-in2"><input type="checkbox" id="table1-in2">チェック1</label>
                                    <label for="table1-in3"><input type="checkbox" id="table1-in3">チェック2</label>
                                </td>
                            </tr>
                            <tr>
                                <th>タイトル</th>
                                <td>内容</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

        </div>

        <!--- ボディ固定余白エリア -->
        <span class="body-as2"></span>

        <!--- ボディフッタエリア -->
        <div class="body-af">

            <div class="body-afl">
                <a href="/orders">
                <button >
                    <i class="bi bi-arrow-left"></i>
                    　戻る
                </button>
                </a>
            </div>

            <div class="body-afc">
                <button id="center-b" style="font-weight:bold;">
                    <i class="bi bi-plus-lg"></i>
                    　追加する
                </button>
            </div>

            <div class="body-afr"></div>

        </div>

    </div>
    <script src="../js/common.js"></script>
    <script src="../js/add.js"></script>
</body>

</html>