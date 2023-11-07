<!DOCTYPE html>
<html lang="ja">

@include('layout/head')
<head>
    <title>注文一覧</title>
</head>

<body class="area">
@include('layout/sidebar')
    <!-- ボディコンテンツ ー-->
    <div class="body-area">

        <!--- ボディヘッダエリア -->
        <div class="body-ah">

            <div class="body-ahl">
                <h2 class="body-title">注文一覧</h2>
            </div>

            <div class="body-ahc">
            </div>

            <div class="body-ahr">
                <button onclick="clickBtn1();top()">
                    <i class="bi bi-pencil"></i>
                </button>
                <button onclick="clickBtn2();top()">
                    <i class="bi bi-search"></i>
                </button>

            </div>

        </div>

        <!--- ボディ固定余白エリア -->
        <div class="body-as1"></div>

        <!--- ボディボディエリア -->
        <div class="body-ab">

            <!-- 検索エリア -->
            <div class="body-as">


                <div id="body-a2" class="body-at1">
                    <form method="post" action="/orders">
                    <table id='table1'>
                        <tr>
                            <th colspan="4" style="background-color: #00214D!important; color: #fffffe!important;">
                                <h3>検索</h3>
                            </th>
                        </tr>
                        <tr>
                            <td class="table1-a1">注文番号</td>
                            <td class="table1-a2">
                                <input type="text" id="table1-in1"
                                       name="order_id"
                                       value="{{ old('order_id') }}"
                                >
                            </td>
                            <td class="table1-a1">メールアドレス</td>
                            <td class="table1-a2">
                                <input type="text" id="table1-in1" name="email"
                                       value="{{ old('email') }}">
                                </td>
                        </tr>
                        <tr>
                            <td class="table1-a1">ステータス</td>
                            <td class="table1-a2">
                                <input type="checkbox" name="status[]" id="table1-cin1" value="B01"
                                       @if(!empty(session('status')) && array_search('B01', session('status')) !== false)
                                       checked
                                       {{--@elseif( empty(array_filter($param, null)) == true)--}}
                                       {{--checked--}}
                                       @endif
                                >
                                <label id="label-ra" for="table1-cin1">{{__('status.order.B01')}}</label>

                                <input type="checkbox" name="status[]" id="table1-cin2"
                                       value="B02"
                                       @if(!empty(session('status')) && array_search('B02', session('status')) !== false)
                                       checked
                                        @endif
                                >
                                <label id="label-ra" for="table1-cin2">{{__('status.order.B02')}}</label>

                                <input type="checkbox" name="status[]" id="table1-cin3" value="B03"
                                       @if(!empty(session('status')) && array_search('B03', session('status')) !== false)
                                       checked
                                        @endif
                                >
                                <label id="label-ra" for="table1-cin3">{{__('status.order.B03')}}</label>
                                <input type="checkbox" name="status[]" id="table1-cin4" value="B04"
                                       @if(!empty(session('status')) && array_search('B04', session('status')) !== false)
                                       checked
                                        @endif
                                >
                                <label id="label-ra" for="table1-cin4">{{__('status.order.B04')}}</label>
                                <input type="checkbox" name="status[]" id="table1-cin5" value="B09"
                                       @if(!empty(session('status')) && array_search('B09', session('status')) !== false)
                                       checked
                                        @endif
                                >
                                <label id="label-ra" for="table1-cin5">{{__('status.order.B09')}}</label>
                            </td>
                            <td class="table1-a1">電話番号</td>
                            <td class="table1-a2">
                                <input type="text" name="tel" id="table1-in1" value="{{ old('tel') }}">
                            </td>
                        </tr>
                        <tr>
                            <td class="table1-a1">氏名</td>
                            <td class="table1-a2"><input type="text" name="name" id="table1-in1"value="{{ old('name') }}"></td>
                            <td class="table1-a1">登録期間</td>
                            <td class="table1-a2">
                                <input type="date" id="table1-in1" name="created_from" value="{{ old('created_from') }}">
                                　〜　
                                <input type="date" id="table1-in1" name="created_after" value="{{ old('created_after') }}">
                            </td>
                        </tr>
                        <tr>
                            <td class="table1-a1">会社名</td>
                            <td class="table1-a2"><input type="text" id="table1-in1" name="company_name" value="{{ old('company_name') }}"></td>
                            <td class="table1-a1">更新期間</td>
                            <td class="table1-a2">
                                <input type="date" id="table1-in1" name="updated_from" value="{{ old('updated_from') }}">
                                　〜　
                                <input type="date" id="table1-in1" name="updated_after" value="{{ old('updated_after') }}">
                            </td>
                        </tr>
                    </table>
                    <div class="table1-fa">
                        <button type="submit" name="action" value="search">検索</button>
                        <button type="submit" name="action" value="pdf">PDF出力</button>
                        {{--<button>CSV出力</button>--}}
                    </div>
                </div>

                <div id="body-a1" class="body-at1">
                        <table id='table1'>
                            <tr style="border: none;">
                                <th colspan="4" style="background-color: #00214D!important; color: #fffffe!important;">
                                    <h3>一括操作</h3>
                                </th>
                            </tr>
                            <tr>
                                <td class="table1-a1">ステータス</td>
                                <td class="table1-a2" colspan="3">
                                    <input type="radio" name="status" id="table1-in01"
                                           value="B01"
                                    >
                                    <label id="label-ra"
                                           for="table1-in01">{{__('status.order.B01')}}</label>
                                    <input type="radio" name="status" id="table1-in2"
                                           value="B02"
                                    >
                                    <label id="label-ra"
                                           for="table1-in2">{{__('status.order.B02')}}</label>
                                    <input type="radio" name="status" id="table1-in3"
                                           value="B03"
                                    ><label id="label-ra"
                                            for="table1-in3">{{__('status.order.B03')}}</label>
                                    <input type="radio" name="status" id="table1-in4"
                                           value="B04"><label id="label-ra"
                                                              for="table1-in4">{{__('status.order.B04')}}</label>
                                    <input type="radio" name="status" id="table1-in5"
                                           value="B09"
                                    ><label id="label-ra"
                                            for="table1-in5">{{__('status.order.B09')}}</label>
                                </td>
                            </tr>
                        </table>
                        <div class="table1-fa">
                            <button type="submit" name="action" value="update">更新</button>
                            {{--<button type="submit">CSV出力</button>--}}
                            <button type="submit" name="action" value="pdf">PDF出力</button>
                        </div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                </div>
            </div>

            <!-- テーブル１エリア -->
            <div class="body-al">
                <div class="body-at2">
                    <table id='table2'>
                        <tr class="table2-h">
                            <th style="background-color: #00214D!important; color: #fffffe!important;"
                                class="table2-a0"><input id="checkAll" class="table2-b1" type="checkbox"></th>
                            <th style="background-color: #00214D!important; color: #fffffe!important;"
                                class="table2-ab">詳細</th>
                            <th style="background-color: #00214D!important; color: #fffffe!important;"
                                class="table2-a2">注文番号</th>
                            <th style="background-color: #00214D!important; color: #fffffe!important;"
                                class="table2-a2">ステータス</th>
                            <th style="background-color: #00214D!important; color: #fffffe!important;"
                                class="table2-a2">氏名</th>
                            <th style="background-color: #00214D!important; color: #fffffe!important;"
                                class="table2-a1">会員</th>
                            <th style="background-color: #00214D!important; color: #fffffe!important;"
                                class="table2-a6">会社名</th>
                            <th style="background-color: #00214D!important; color: #fffffe!important;"
                                class="table2-a4">会社コード</th>
                            <th style="background-color: #00214D!important; color: #fffffe!important;"
                                class="table2-a4">メールアドレス</th>
                            <th style="background-color: #00214D!important; color: #fffffe!important;"
                                class="table2-a4">電話番号</th>
                            <th style="background-color: #00214D!important; color: #fffffe!important;"
                                class="table2-a3">登録日時</th>
                            <th style="background-color: #00214D!important; color: #fffffe!important;"
                                class="table2-a3">更新日時</th>
                        </tr>

                        @foreach($orders as $order)
                            <tr class="table2-b1t">
                                <td class="center">
                                    <input id="table2-b1-1" class="table2-ai table2-b1 checks" type="checkbox"
                                           name="order_id_array[]" value="{{$order->order_id}}"
                                    >
                                </td>
                                <td class="padding table2-ab center">
                                    <a href="/orders/{{$order->order_id}}">
                                        <div class="table2-b2">詳細</div>
                                    </a>
                                </td>
                                <td class="padding table2-a1" >{{$order->order_id}}</td>
                                <td class="padding table2-a1" >{{__('status.order.' . $order->status()->first()->status)}}</td>
                                <td class="padding table2-a2" >{{$order->name}}</td>
                                <td class="padding center" >
                                    @if(!empty($order->user))
                                        <a href="/users/{{$order->user_no}}">
                                        <i class="bi bi-person-check-fill" style="color: #00214D!important;"></i>
                                        </a>
                                    @endif

                                </td>
                                <td class="padding table2-a3" >{{$order->company}}</td>
                                <td class="padding table2-a3" >
                                    @if(!empty($order->user))
                                        {{$order->user->company_code}}
                                    @endif
                                </td>
                                <td class="padding table2-a3" >{{$order->email}}</td>
                                <td class="padding table2-a3" >{{$order->tel}}</td>
                                <td class="padding table2-a1" >{{$order->created_at}}</td>
                                <td class="padding table2-a1" >{{$order->updated_at}}</td>

                            </tr>
                        @endforeach

                    </table>
                </div>
            </div>
        </div>
        </form>

        <!--- ボディ固定余白エリア -->
        <span class="body-as2"></span>
        <!--- ボディフッタエリア -->
        <div class="body-af">

            <div class="body-afl">
                <label>表示件数：
                    <select name="select-value" onchange="onSelectChange(this)">
                        <option value="20"
                                @if(!empty(session('order.paginate')) && session('order.paginate') == 20)
                                selected
                                @endif
                        >20件</option>
                        <option value="50"
                                @if(!empty(session('order.paginate')) && session('order.paginate') == 50)
                                selected
                                @endif
                        >50件</option>
                        <option value="10000"
                                @if(!empty(session('order.paginate')) && session('order.paginate') == 10000)
                                selected
                                @endif
                        >全件</option>
                    </select>
                </label>
            </div>

            <div class="">
                {{ $orders->links('vendor.pagination.semantic-ui') }}
            </div>

            <div class="body-afr"></div>
        </div>

    </div>
    {{--<script src="../../js/common.js"></script>--}}
    <script src="../../js/list.js"></script>
    {{--<script src="../../js/list/order.js"></script>--}}

</body>

</html>