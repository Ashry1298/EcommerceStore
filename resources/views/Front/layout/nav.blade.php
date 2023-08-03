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
                $cartItemsCount=App\Models\CartItems::count();
            @endphp
            <div class="icon-header-item cl0 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart" data-notify="{{$cartItemsCount}}">
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
