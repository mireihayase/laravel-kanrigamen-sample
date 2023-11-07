<html lang="ja">
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
    </body>
</html>