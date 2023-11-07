<html lang="ja">
<?php
$count = count($contents_array);
?>
@foreach($contents_array as $i =>$contents)
<head>
    @include('pdf.common.head')
</head>
<body>

<div class="header">
    @include('pdf.common.header')
</div>
<div class="main"
     style="
     max-height: 900px;
     margin-left: -25px;
">
    @include('pdf.frame.user_info')
    @include('pdf.frame.mailing_address')
    @include('pdf.frame.products_details')
</div>
<div class="footer" style="margin-left: -25px;">
    @include('pdf.common.footer')
</div>

@if($i+1 != $count)
<div style="page-break-after: always"></div>
@endif
@endforeach

</body>
</html>