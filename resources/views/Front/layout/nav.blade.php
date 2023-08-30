<nav class="limiter-menu-desktop p-l-45">
    <!-- Logo desktop -->
    <a href="{{ route('front') }}" class="logo">
        <img src="{{ asset('Ui/images/icons/logo-02.png') }}" alt="IMG-LOGO">
    </a>
    <!-- Menu desktop -->
    <div class="menu-desktop">
        <ul class="main-menu">
            <li>
                <a href="{{ route('front') }}">Home</a>
            </li>
            @auth
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" >Logout</button>
                    </form>
                </li>
            @endauth
            @guest
                <li>
                    <a href="{{ route('register') }}">Register</a>
                </li>
                <li>
                    <a href="{{ route('login') }}">Login</a>
                </li>
            @endguest
            @if (!empty($cats))
                <li>
                    <a>{{ app()->getlocale() == 'en' ? 'Categories' : 'الأقسام' }}</a>
                    <ul class="sub-menu">
                        @foreach ($cats as $cat)
                            <li><a href="{{ route('category.show', $cat->id) }}">{{ $cat->title }}</a></li>
                        @endforeach

                    </ul>
                </li>
            @endif
            <li>
                <a href="#">Shop</a>
            </li>
            @if (Auth::check())
                <li>
                    <a href="{{ route('myOrders') }}">
                        My Orders
                    </a>
                </li>
            @else
                <li>
                    <a href="{{ route('findMyOrders') }}">
                        Find My Orders
                    </a>
                </li>
            @endif
            <li>
                <a href="#">About</a>
            </li>
            <li>
                <a href="#">Contact</a>
            </li>
            <li>
                <a
                    href="{{ route('changeLang', ['lang' => app()->getlocale()]) }}">{{ app()->getlocale() == 'ar' ? 'English' : 'العربيه' }}</a>
            </li>

        </ul>
    </div>

    <!-- Icon header -->

    <div class="wrap-icon-header flex-w flex-r-m h-full">
        <div class="flex-c-m h-full p-r-25 bor6">
            @php
                if (session('cart') != null) {
                    $cartItemsCount = count(session('cart'));
                } else {
                    $cartItemsCount = 0;
                }
            @endphp
            <div class="icon-header-item cl0 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart"
                data-notify="{{ $cartItemsCount }}">
                <i class="zmdi zmdi-shopping-cart"></i>
            </div>
        </div>

        <div class="flex-c-m h-full p-lr-19">
            <div class="icon-header-item cl0 hov-cl1 trans-04 p-lr-11 js-show-sidebar">
                <i class="zmdi zmdi-menu"></i>
            </div>
        </div>
    </div>

</nav>
