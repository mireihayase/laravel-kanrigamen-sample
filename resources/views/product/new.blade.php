<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/favicon.ico">
    <link rel="stylesheet" href="../../css/root.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <title>商品</title>
    <style>
        #table1 td {
            padding-left: 12px;
            padding-right: 12px;
            text-align: left;
        }

        #table1 input[type='text'],
        #table1 input[type='date'] {
            border: 2px solid #00000020;
            width: 100%;
        }
    </style>
</head>

<body class="area">
    <!-- メニューエリア -->
    @include('layout/sidebar')

    <!-- ボディコンテンツ ー-->
    <div class="body-area">

        <!--- ボディヘッダエリア -->
        <div class="body-ah">

            <div class="body-ahl">
                <h2 class="body-title">商品追加</h2>
            </div>

            <div class="body-ahc"></div>

            <div class="body-ahr"></div>

        </div>

        <!--- ボディ固定余白エリア -->
        <div class="body-as1"></div>


        <!--- ボディボディエリア -->
        <div class="body-ab">

            <!-- テーブル２エリア -->
            <!-- <div class="body-ad"> -->
            <form action="" method="post">
            <div class="body-at3">
                <table id='table3'>
                    <tbody>
                        <tr>
                            <th>商品コード</th>
                            <td colspan="3"><input type="text" name="product_code"></td>
                        </tr>
                        <tr>
                            <th>商品名</th>
                            <td colspan="3"><input type="text" name="product_name"></td>
                        </tr>
                        <tr>
                            <th>商品名（カナ）</th>
                            <td colspan="3"><input type="text" name="product_name_kana"></td>
                        </tr>
                        <tr>
                            <th>販売価格</th>
                            <td><input type="text" name="price"></td>
                            <th>在庫数</th>
                            <td><input type="text" name="quantity"></td>
                        </tr>
                        <tr>
                            <th>商品属性</th>
                            <td colspan="3"><input type="text" name="attribute"></td>
                        </tr>
                        <tr>
                            <th>販売開始</th>
                            <td><input type="date" name="disp_from"></td>
                            <th>販売終了</th>
                            <td><input type="date" name="disp_to"></td>
                        </tr>
                        <tr>
                            <th>備考</th>
                            <td colspan="3"><input type="text" name="remark"></td>
                        </tr>
                        <tr>
                            <th>ステータス</th>
                            <td colspan="3">
                                <input type="radio" name="status" id="table1-in1" checked value="A01"
                                ><label id="label-ra"
                                    for="table1-in1">新規</label>
                                <input type="radio" name="status" id="table1-in2" value="A02"><label id="label-ra"
                                    for="table1-in2">対応中</label>
                                <input type="radio" name="status" id="table1-in3" value="A03"><label id="label-ra"
                                    for="table1-in3">発送完了</label>
                                <input type="radio" name="status" id="table1-in4" value="A04"><label id="label-ra"
                                    for="table1-in4">対応完了</label>
                                <input type="radio" name="status" id="table1-in5" value="A09"><label id="label-ra"
                                    for="table1-in5">破棄</label>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- </div> -->

        </div>

        <!--- ボディ固定余白エリア -->
        <span class="body-as2"></span>

        <!--- ボディフッタエリア -->
        <div class="body-af">

            <div class="body-afl">
                <button >
                    <a href="/products" style="text-decoration: none;">
                    <i class="bi bi-arrow-left"></i>
                    　戻る
                    </a>
                </button>
            </div>

            <div class="body-afc">
                <button type="submit" id="center-b" style="font-weight:bold;">
                    <i class="bi bi-plus-lg"></i>
                    　追加する
                </button>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="body-afr"></div>

        </div>

        </form>

    </div>
    <script src="../../js/common.js"></script>
</body>

</html>