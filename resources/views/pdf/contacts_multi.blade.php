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
        <div class="main" style="max-height: 900px;">
            @include('pdf.frame.user_info')
            @include('pdf.frame.contacts')
        </div>

        <div class="footer">
            @include('pdf.common.footer')
        </div>
@if($i+1 != $count)
    <div style="page-break-after: always"></div>
@endif
@endforeach
    </body>
</html>