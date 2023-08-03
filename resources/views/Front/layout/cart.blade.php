<div class="wrap-header-cart js-panel-cart">
    <div class="s-full js-hide-cart"></div>

    <div class="header-cart flex-col-l p-l-65 p-r-25">
        <div class="header-cart-title flex-w flex-sb-m p-b-8">
            <span class="mtext-103 cl2">
                Your Cart
            </span>

            <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                <i class="zmdi zmdi-close"></i>
            </div>
        </div>
        @php
            $cartItems = App\Models\CartItems::get();
        @endphp
        @if (count($cartItems) != 0)

            <div class="header-cart-content flex-w js-pscroll">
                <ul class="header-cart-wrapitem w-full">
                    @foreach (App\Models\CartItems::get() as $cartItem)
                        {{-- @php
                        $Product = App\Models\Product::findorfail($cartItem->product_id);
                        
                    @endphp --}}
                        <h5>{{ $cartItem->product->name }}</h5>
                        <li class="header-cart-item flex-w flex-t m-b-12">
                            <div class="header-cart-item-img">
                                <img src="{{ asset('uploads/products/' . $cartItem->product->main_image) }}"
                                    alt="IMG">
                            </div>
                            @if ($cartItem->category_size_id != null && $cartItem->product_color_id != null)
                                <div class="header-cart-item-txt p-t-8">
                                    <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">

                                    </a>

                                    <span class="header-cart-item-info">
                                        @php
                                            $CategorySizeName = App\Models\CategorySize::where('id', $cartItem->category_size_id)->first();
                                            $ProductColorName = App\Models\ProductColor::where('id', $cartItem->product_color_id)->first();
                                        @endphp
                                        {{ $cartItem->quantity }} x {{ $cartItem->product->price }}
                                        <br>
                                        {{ $CategorySizeName->sizeName }} x {{ $ProductColorName->color }}
                                    </span>
                                </div>
                            @endif


                        </li>
                    @endforeach

                </ul>

                <div class="w-full">
                    <div class="header-cart-total w-full p-tb-40">
                        Total: {{ App\Models\CartItems::sum('totPrice') }}
                    </div>

                    <div class="header-cart-buttons flex-w w-full">
                        <a href="{{ route('viewCartItems', 1) }}"
                            class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                            View Cart
                        </a>

                        <a href="shoping-cart.html"
                            class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                            Check Out
                        </a>
                    </div>
                </div>
            </div>
        @endif

    </div>
</div>
