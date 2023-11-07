<div style="min-height: 30px">

</div>
<div class="body-t" style="text-align: left;">
    <h2 style="text-align: left; float: left;">お客様情報</h2>
</div>

<div class="body-b1">
    <div class="body-b1r1">会社名：</div>
    <div class="body-b1t1">
        <p class="body-b1t1p1">{{$contents['company_kana']}}</p>
        <p class="body-b1t1p2">
            {{$contents['company']}}
        </p>
    </div>
    <div class="body-b1rt2">
        <div class="body-b1r2">会社コード：</div>
        <div class="body-b1t2">{{$contents['company_code']}}</div>
    </div>
</div>

<div class="body-b2">
    <div class="body-b2r1">所属：</div>
    <div class="body-b2t1">{{$contents['department_name']}}</div>
    <div class="body-b2r2">役職：</div>
    <div class="body-b2t2">{{$contents['job_title']}}</div>
</div>

<div class="body-b3">
    <div class="body-b3r1">氏名：</div>
    <div class="body-b3t1">
        <p class="body-b3t1p1">{{$contents['name_kana']}}</p>
        <p class="body-b3t1p2">{{$contents['name']}}</p>
    </div>
</div>

<div class="body-b4">
    <div class="body-b4r1">住所：</div>
    <div class="body-b4t1">
        <p class="body-b4t1p1">〒{{$contents['post_code']}}</p>
        <p class="body-b4t1p2">
            {{$contents['address']}}
        </p>
    </div>
</div>

<div class="body-b2">
    <div class="body-b2r1">電話：</div>
    <div class="body-b2t1">{{$contents['tel']}}</div>
    <div class="body-b2r2">FAX：</div>
    <div class="body-b2t2">{{$contents['fax']}}</div>
</div>

<div class="body-b5">
    <div class="body-b5r1">メール：</div>
    <div class="body-b5t1">{{$contents['email']}}</div>
    <div class="body-b5rt2">
        <div class="body-b5r2">DM送付：</div>
        <div class="body-b5t2">必要</div>
    </div>
</div>