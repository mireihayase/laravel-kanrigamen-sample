<!DOCTYPE html>
<html lang="ja">

@include('layout/head')
<head>
    <title>商品詳細</title>
</head>

<body class="area">
@include('layout/sidebar')
    <form class="body-area" method="post" action="/products/{{$product->product_code}}">
    <div class="body-area">
        <div class="body-ah">
            <div class="body-ahl">
                <h2 class="body-title">商品詳細</h2>
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
                            <th>商品コード</th>
                            <td colspan="3">{{$product->product_code}}</td>
                        </tr>
                        <tr>
                            <th>商品名</th>
                            <td colspan="3" class="ruby-td"
                            ><ruby>{{$product->product_name}}<rt>
										{{$product->product_name_kana}}
									</rt></ruby></td>
                        </tr>
                        <tr>
                            <th>販売価格</th>
                            <td>{{number_format($product->price)}}</td>
                            <th>在庫数</th>
                            <td>{{number_format($product->quantity)}}</td>
                        </tr>
                        <tr>
                            <th>商品属性</th>
                            <td colspan="3">属性１</td>
                        </tr>
                        <tr>
                            <th>販売開始</th>
                            <td>
								{{$product->disp_from}}
							</td>
                            <th>販売終了</th>
                            <td>{{$product->disp_to}}</td>
                        </tr>
                        <tr>
                            <th>備考</th>
                            <td colspan="3">
								{{$product->remark}}
							</td>
                        </tr>
                        <tr>
                            <th>登録者ID</th>
                            <td>{{$product->created_user}}</td>
                            <th>登録日時</th>
                            <td>{{$product->created_at}}</td>
                        </tr>
                        <tr>
                            <th>更新者ID</th>
                            <td>{{$product->updated_user}}</td>
                            <th>更新日時</th>
                            <td>{{$product->updated_at}}</td>
                        </tr>
                        <tr>
                            <th>ステータス</th>
                            <td colspan="3">
                                <input type="radio" name="status" id="table1-in1"
                                       value='A01'
									   @if($status->status == 'A01')
									   checked
										@endif
								><label id="label-ra"
                                    for="table1-in1">{{__('status.product.A01')}}</label>

                                <input type="radio" name="status" id="table1-in2"
                                       value='A02'
									   @if($status->status == 'A02')
									   checked
										@endif
								><label id="label-ra"
                                    for="table1-in2">{{__('status.product.A02')}}</label>

                                <input type="radio" name="status" id="table1-in3"
                                       value='A03'
									   @if($status->status == 'A03')
									   checked
										@endif
								><label id="label-ra"
                                    for="table1-in3">{{__('status.product.A03')}}</label>

                                <input type="radio" name="status" id="table1-in4"
                                       value='A04'
									   @if($status->status == 'A04')
									   checked
										@endif
								><label id="label-ra"
                                    for="table1-in4">{{__('status.product.A04')}}</label>
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
                        <a href="/products" style="text-decoration: none;">
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



            </div>
        </div>
        <input type="hidden" value="{{$product->product_code}}" name="product_code">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        </form>
        {{--<script src="../../js/common.js"></script>--}}

</body>

</html>