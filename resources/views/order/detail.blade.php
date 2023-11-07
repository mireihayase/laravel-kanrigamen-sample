<!DOCTYPE html>
<html lang="ja">

@include('layout/head')
<head>
    <title>注文詳細</title>


</head>

<body class="area">
@include('layout/sidebar')
    <form class="body-area" method="post" action="/orders/{{$order->order_id}}">
        <div class="body-ah">
            <div class="body-ahl">
                <h2 class="body-title">注文詳細</h2>
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
                            <td>{{$order->order_id}}</td>
                            <th>会員ID</th>
                            <td>@if(!empty($order->user)){{$order->user->user_no}}@endif</td>
                        </tr>
                        <tr>
                            <th>会社名</th>
                            <td class="ruby-td"><ruby>
                                    {{$order->company}}
                                    <rt>
                                        {{$order->company_no}}</rt></ruby></td>
                            <th>会社コード</th>
                            <td>
                                @if(!empty($order->user))
                                    {{$order->user->company_code}}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>部署名</th>
                            <td>{{$order->department_name}}</td>
                            <th>役職名</th>
                            <td>{{$order->job_title}}</td>
                        </tr>
                        <tr>
                            <th>氏名</th>
                            <td colspan="3" class="ruby-td">
                                <ruby>{{$order->name}}<rt>
                                        {{$order->name_kana}}
                                    </rt></ruby></td>
                        </tr>
                        <tr>
                            <th>住所</th>
                            <td colspan="3">〒{{$order->post_code}}
                                {{$order->address1}}
                                {{$order->address2}}
                                {{$order->address3}}
                            </td>
                        </tr>
                        <tr>
                            <th>メールアドレス</th>
                            <td>
                                {{$order->email}}
                            </td>
                            <th>DM送付</th>
                            <td>必要</td>
                        </tr>
                        <tr>
                            <th>電話番号</th>
                            <td>
                                {{$order->tel}}
                            </td>
                            <th>FAX</th>
                            <td>
                                {{$order->fax}}
                            </td>
                        </tr>
                        <tr>
                            <th>会社名（発送先）</th>
                            <td>{{$order->company}}</td>
                            <th>会社コード（発送先）</th>
                            <td>
                                @if(!empty($order->user))
                                {{$order->user->company_code}}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>部署名（発送先）</th>
                            <td>
                                @if(!empty($order->user))
                                {{$order->user->department_name}}
                                @endif
                            </td>
                            <th>役職名（発送先）</th>
                            <td>
                                {{$order->job_title}}
                            </td>
                        </tr>
                        <tr>
                            <th>氏名（発送先）</th>
                            <td colspan="3">
                                {{$order->name}}
                            </td>
                        </tr>
                        <tr>
                            <th>郵送先（発送先）</th>
                            <td colspan="3">〒{{$order->post_code}}
                                {{$order->address1}}
                                {{$order->address2}}
                                {{$order->address3}}
                            </td>
                        </tr>
                        <tr>
                            <th>電話番号（発送先）</th>
                            <td colspan="3">{{$order->tel}}</td>
                        </tr>
                        <!-- <tr>
                            <th>備考</th>
                            <td colspan="3">記載なし</td>
                        </tr> -->
                        <tr>
                            <th>登録者ID</th>
                            <td>{{$order->updated_user}}</td>
                            <th>登録日時</th>
                            <td>{{$order->created_at}}</td>
                        </tr>
                        <tr>
                            <th>更新者ID</th>
                            <td>{{$order->updated_user}}</td>
                            <th>更新日時</th>
                            <td>{{$order->updated_at}}</td>
                        </tr>
                        <tr>
                            <th>ステータス</th>
                            <td colspan="3">
                                <input type="radio" name="status" id="table1-in1"
                                       value="B01"
                                       @if($status->status == 'B01')
                                       checked
                                       @endif
                                ><label id="label-ra"
                                    for="table1-in1">{{__('status.order.B01')}}</label>

                                <input type="radio" name="status" id="table1-in2"
                                       value="B02"
                                       @if($status->status == 'B02')
                                       checked
                                        @endif
                                ><label id="label-ra" for="table1-in2">{{__('status.order.B02')}}</label>

                                <input type="radio" name="status" id="table1-in3"
                                       value="B03"
                                       @if($status->status == 'B03')
                                       checked
                                        @endif
                                >
                                <label id="label-ra"
                                    for="table1-in3">{{__('status.order.B03')}}</label>

                                <input type="radio" name="status" id="table1-in4"
                                       value="B04"
                                       @if($status->status == 'B04')
                                       checked
                                        @endif
                                ><label id="label-ra"
                                    for="table1-in4">{{__('status.order.B04')}}</label>

                                <input type="radio" name="status" id="table1-in5"
                                       value="B09"
                                       @if($status->status == 'B09')
                                       checked
                                        @endif
                                ><label id="label-ra"
                                    for="table1-in5">{{__('status.order.B09')}}</label>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <table id='table3' style="margin-top: 24px;padding-left: 24px;padding-right: 24px;">
                    <tbody>
                        <tr>
                            <th style="width: 5%;">項番</th>
                            <th style="width: 10%;">商品コード</th>
                            <th style="width: 50%;">商品項目</th>
                            <th style="width: 10%;">単価（定価）</th>
                            <th style="width: 6%;">数量</th>
                            <th style="width: 10%;">合計（円）</th>
                        </tr>
                        @foreach($order_details as $order_detail)
                        <tr>
                            <td style="width: 5%;text-align: center;">{{$order_detail->detail_no}}</td>
                            <td  style="width: 5%;text-align: center;">{{$order_detail->product_code}}</td>
                            <td  style="width: 50%;">{{$order_detail->products->first()->product_name}}</td>
                            <td  style="width: 10%;text-align: center;">{{ number_format($order_detail->price)}}</td>
                            <td  style="width: 6%;text-align: center;">{{$order_detail->quantity}}</td>
                            <td  style="width: 10%;text-align: center;">{{number_format($order_detail->price * $order_detail->quantity)}}</td>
                        </tr>
                        @endforeach


                        <tr>
                            <th rowspan="4" style="width:48px!important;">備考</th>
                            <td rowspan="4" colspan="3">
                                {{$order->remark}}
                            </td>
                            <th>税</th>
                            <td style="text-align: right;">
                                {{number_format($order->tax)}}
                            </td>
                        </tr>
                        <tr>
                            <th>送料</td>
                            <td style="text-align: right;">
                                {{number_format($order->postage)}}
                            </td>
                        </tr>
                        <tr>
                            <th>合計金額</th>
                            <td style="text-align: right;">
                                {{number_format($order->total)}}
                            </td>
                        </tr>
                        <tr>
                            <th>支払方法</th>
                            <td style="text-align: right;">
                                {{$order->payment_method}}
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
                    <button onclick="back()" class="">
                        <a href="/orders"
                           style="text-decoration: none;"
                        >
                            <i class="bi bi-arrow-left "></i>戻る
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
                        <a href="/pdfoutput/order/{{$order->order_id}}" style="text-decoration: none;">
                        <i class="bi bi-download"></i>
                        　 PDF出力
                        </a>
                    </button>
                </div>

            </div>
        </div>
        <input type="hidden" value="{{$order->order_id}}" name="order_id">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    </form>
        {{--<script src="../../js/common.js"></script>--}}

</body>

</html>