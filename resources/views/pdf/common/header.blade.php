<div class="header-left">
    {{--<img class="logo-img" src="{{ pulic_pahh('/img/icon.png')}}" alt="">--}}
    {{--<img class="logo-img" src="data:image/png;base64,{{ $image_data }}">--}}
    {{--<img class="logo-img" src='/img/icon.png' alt="">--}}
    <img src="data:image/png;base64,{{ $image_data }}" class="logo-img">
</div>
<div class="header-center">{{ $contents['title'] }}</div>
<div class="header-right" style="text-align: left;">
    注文番号：{{ $contents['id'] }}　　　　　
    <br>
    注文日時：{{ $contents['output_datetime'] }}
</div>