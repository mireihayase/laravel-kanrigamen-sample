<div class="body-t">
    <h2>商品明細</h2>
</div>

<div class="body-b7">
    <div class="body-b7r1">項番</div>
    <div class="body-b7r2">商品コード</div>
    <div class="body-b7r3">商品項目</div>
    <div class="body-b7r4">単価（定価）</div>
    <div class="body-b7r5">数量</div>
    <div class="body-b7r6">合計（円）</div>
</div>
@foreach($contents['order_details'] as $order_detail)
<div class="body-b13">
    <div class="body-b13t1">{{$order_detail->detail_no}}</div>
    <div class="body-b13t2">{{$order_detail->product_code}}</div>
    <div class="body-b13t3">
        {{$order_detail->products->first()->product_name}}
    </div>

{{--    <div class="body-b13t4">{{number_format($order_detail->price)}}</div>--}}
    <div class="body-b7r4">{{number_format($order_detail->price)}}</div>

    <div class="body-b13t5">{{$order_detail->quantity}}</div>
    <div class="body-b13t6">{{number_format($order_detail->price * $order_detail->quantity)}}</div>
</div>
@endforeach

<div class="body-b10">
    <table>
        <tbody>
            <tr>
                <td class="body-b10r1" rowspan="4">備考：</td>
                <td class="body-b10t1" rowspan="4">{{$contents['remark']}}</td>
                <td class="body-b10r2"><div>送料</div></td>
                <td class="body-b10t2"><div>{{number_format($contents['postage'])}}</div></td>
            </tr>
            <tr>
                <td class="body-b10r3"><div>税</div></td>
                <td class="body-b10t3"><div>{{number_format($contents['tax'])}}</div></td>
            </tr>
            <tr>
                <td class="body-b10r4"><div>合計</div></td>
                <td class="body-b10t4"><div>{{number_format($contents['total'])}} 円</div></td>
{{--                <td class="body-b10t4"><div>{{number_format($order_detail->price * $order_detail->quantity)}} 円</div></td>--}}
            </tr>
            <tr>
                <td class="body-b10r5"><div>支払方法</div></td>
                <td class="body-b10t5"><div>{{$contents['payment_method']}}</div></td>
            </tr>
        </tbody>
    </table>
</div>