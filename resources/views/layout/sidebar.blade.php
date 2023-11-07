<!-- メニューエリア -->
<div class="menu-area">

    <!-- メニューヘッダエリア -->
    <div class="menu-ah">
        <img class="menu-logo" src="/img/logo.png">
    </div>

    <!-- メニューボディエリア -->
    <nav class="menu-ab">
        <button>
            <a href="/orders" style="text-decoration: none;color: var(--color-2);">
            {{--<button  id="menu-chk">--}}
                <span class="menu-buttun">
                    <i class="bi bi-cart menu-i"></i>
                    {{--<a href="/orders" style="text-decoration: none;">--}}
                        <p class="menu-l">注文</p>
                    </a>
                </span>
            </a>
        </button>
        <button onclick="products_list()">
            <a href="/products" style="text-decoration: none;color: var(--color-2);">
                <span class="menu-buttun">
                    <i class="bi bi-clipboard2 menu-i"></i>
                    <p class="menu-l">商品</p>
                </span>
            </a>
        </button>
        <button onclick="contacts_list()">
            <a href="/contacts" style="text-decoration: none;color: var(--color-2);">
                <span class="menu-buttun">
                    <i class="bi bi-envelope menu-i"></i>
                    <p class="menu-l">お問い合せ</p>
                </span>
            </a>
        </button>
        <button onclick="requests_list()">
            <a href="/requests" style="text-decoration: none;color: var(--color-2);">
                <span class="menu-buttun">
                    <i class="bi bi-book menu-i"></i>
                    <p class="menu-l">資料請求</p>
                </span>
            </a>
        </button>
        <button onclick="users_list()">
            <a href="/users" style="text-decoration: none;color: var(--color-2);">
                <span class="menu-buttun">
                    <i class="bi bi-person menu-i"></i>
                    <p class="menu-l">会員</p>
                </span>
            </a>
        </button>
    </nav>

    <nav class="menu-af" style="display:contents;">
        <button onclick="setting()">
            <a href="/setting" style="text-decoration: none;color: var(--color-2);">
                <span class="menu-buttun">
                    <i class="bi bi-wrench menu-i"></i>
                    <p class="menu-l">設定</p>
                </span>
            </a>
        </button>
        <button onclick="logout()">
            <a href="/logout" style="text-decoration: none;color: var(--color-2);">
                <span class="menu-buttun">
                    <i class="bi bi-box-arrow-in-left menu-i"></i>
                    <p class="menu-l">ログアウト</p>
                </span>
            </a>
        </button>
    </nav>

</div>