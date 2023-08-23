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
        @if (session('cart') != null)
            <div class="header-cart-content flex-w js-pscroll">
                @forelse (session('cart') as $item)
                    @php
                        $Product = App\Models\Product::findorfail($item['product_id']);
                    @endphp
                    <ul class="header-cart-wrapitem w-full">
                        <h5>{{ $Product->name }}</h5>
                        <li class="header-cart-item flex-w flex-t m-b-12">
                            <div class="header-cart-item-img">
                                <img src="{{ asset('uploads/products/' . $Product->main_image) }}" alt="IMG">
                            </div>
                            @if (array_key_exists('category_size_id', $item) && array_key_exists('product_color_id', $item))
                                @php
                                    $CategorySizeName = App\Models\CategorySize::where('id', $item['category_size_id'])->first();
                                    $ProductColorName = App\Models\ProductColor::where('id', $item['product_color_id'])->first();
                                @endphp
                            @elseif (!array_key_exists('category_size_id', $item) && array_key_exists('product_color_id', $item))
                                @php
                                    $ProductColorName = App\Models\ProductColor::where('id', $item['product_color_id'])->first();
                                @endphp
                            @elseif (array_key_exists('category_size_id', $item) && !array_key_exists('product_color_id', $item))
                                @php
                                    $CategorySizeName = App\Models\CategorySize::where('id', $item['category_size_id'])->first();
                                @endphp
                            {{-- @else --}}
                            {{-- @php
                                
                            @endphp --}}
                            @endif
                            <div class="header-cart-item-txt p-t-8">
                                <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                </a>
                                <span class="header-cart-item-info">
                                    @php
                                        echo $item['quantity'] . ' x ' . $item['product_price'];
                                    @endphp

                                    <br>
                                    {{-- @php
                                        echo $CategorySizeName->sizeName . ' x ' . $ProductColorName->color;
                                    @endphp --}}
                                </span>
                            </div>
                        </li>
                    </ul>
                @empty
                    {{ "You Don't have items in your cart" }}
                @endforelse
        @endif
        <div class="w-full">
            <div class="header-cart-total w-full p-tb-40">
                @if (session('cart') != null)
                    @php
                        $total = array_sum(array_column(session('cart'), 'price'));
                    @endphp
                    Total {{ $total }}
                @else
                    Total 0
                @endif

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
</div>
</div>
