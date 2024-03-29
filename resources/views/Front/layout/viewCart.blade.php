@extends('Front/layout/master')
@section('title')
    viewCartItems
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="bg0 p-t-75 p-b-85" action="{{ route('cartItems.update') }}" method="POST">
                    @csrf
                    <div class="m-l-25 m-r--38 m-lr-0-xl">
                        <div class="wrap-table-shopping-cart">
                            <table class="table-shopping-cart">
                                <tbody>
                                    <tr class="table_head">
                                        <th class="column-1">Processing</th>
                                        <th class="column-1">Product</th>
                                        <th class="column-3">Price</th>
                                        <th class="column-4">Quantity</th>
                                        <th class="column-4">Size</th>
                                        <th class="column-4">Color</th>
                                        <th class="column-5">Total</th>
                                        <th class="column-5">Image</th>
                                    </tr>
                                    @foreach (session('cart') as $x => $item)
                                        @php
                                            $product = App\Models\Product::where('id', $item['product_id'])->first();
                                        @endphp
                                        <tr class="table_row">
                                            <td class="column-1">
                                                <a href="{{ route('cartItem.destroy', $x) }}"
                                                    class="btn btn-outline-danger btn-sm">Delete</a>
                                            </td>
                                            <td class="column-2">{{ $product->name }}</td>
                                            <td class="column-3">{{ $product->price }}</td>
                                            <td class="column-4">
                                                <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                                    <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                        <i class="fs-16 zmdi zmdi-minus"></i>
                                                    </div>
                                                    <input class="mtext-104 cl3 txt-center num-product" type="number"
                                                        name="quantity[{{ $product->id }}]"
                                                        value="{{ $item['quantity'] }}">
                                                    <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                        <i class="fs-16 zmdi zmdi-plus"></i>
                                                    </div>
                                                </div>
                                            </td>
                                            @if (array_key_exists('category_size_id', $item) && array_key_exists('product_color_id', $item))
                                                @php
                                                    $CategorySizeName = App\Models\CategorySize::where('id', $item['category_size_id'])->first();
                                                    $ProductColorName = App\Models\ProductColor::where('id', $item['product_color_id'])->first();
                                                @endphp

                                                <td class="column-5">{{ $CategorySizeName->sizeName }}</td>
                                                <td class="column-5">{{ $ProductColorName->color }}</td>
                                            @elseif(array_key_exists('product_color_id', $item))
                                                @php
                                                    $ProductColorName = App\Models\ProductColor::where('id', $item['product_color_id'])->first();
                                                @endphp
                                                <td class="column-5">{{ '' }} </td>
                                                <td class="column-5">{{ $ProductColorName->color }}</td>
                                            @endif
                                            @php
                                                $total = $item['product_price'] * $item['quantity'];
                                            @endphp
                                            <td class="column-5">{{ $total }}</td>
                                            <td class="column-1">
                                                <div class="how-itemcart1">
                                                    <img src="{{ asset('uploads/products/' . $product->main_image) }}"
                                                        alt="IMG">
                                                </div>
                                            </td>
                                            <td class="column-1">

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                            <div>
                                <button type="submit"
                                    class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
                                    Update Cart</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                <form action="{{ route('checkout.store') }}" id="checkout" method="POST">
                    @csrf
                    <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                        <h4 class="mtext-109 cl2 p-b-30">
                            Cart Totals
                        </h4>
                        @php
                            $SubTotal = array_sum(array_column(session('cart'), 'price'));
                        @endphp
                        <div class="flex-w flex-t bor12 p-b-13">
                            <div class="size-208">
                                <span class="stext-110 cl2">
                                    Subtotal: {{ $SubTotal }}
                                </span>
                            </div>

                            <div class="size-209">
                                <span class="mtext-110 cl2">
                                    <input type="text" value="{{ $SubTotal }}" name="sub_total" readonly hidden>
                                </span>
                            </div>
                        </div>

                        <div class="flex-w flex-t bor12 p-t-15 p-b-30">
                            <div class="size-208 w-full-ssm">
                                <span class="stext-110 cl2">
                                    Shipping:
                                </span>
                            </div>

                            <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                                <p class="stext-111 cl6 p-t-2">
                                    There are no shipping methods available. Please double check your address, or
                                    contact us
                                    if you need any help.
                                </p>
                                    <div class="p-t-15">
                                        <div class="bor8 bg0 m-b-12">
                                            <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text"
                                                name="full_name" placeholder="Full Name"
                                                value="{{ auth()->user()->name ?? '' }}">
                                        </div>
                                        <div class="bor8 bg0 m-b-12">
                                            <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="phone"
                                                placeholder="phone" class="@error('phone') is-invalid @enderror"
                                                value="{{ auth()->user()->phone ?? '' }}">
                                            @error('phone')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="bor8 bg0 m-b-12">
                                            <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="email"
                                                placeholder="email" value="{{ auth()->user()->email ?? '' }}"
                                                class="@error('email') is-invalid @enderror">
                                            @error('email')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="bor8 bg0 m-b-12">
                                            <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="country"
                                                placeholder="country"class="@error('country') is-invalid @enderror">
                                            @error('country')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="bor8 bg0 m-b-12">
                                            <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text"
                                                name="state"
                                                placeholder="State"class="@error('state') is-invalid @enderror">
                                            @error('state')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="bor8 bg0 m-b-22">
                                            <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text"
                                                name="cityAndP-c"
                                                placeholder="City and Postal-code "class="@error('cityAndP-c') is-invalid @enderror">
                                            @error('cityAndP-c')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>
                            </div>
                            
                        </div>

                        <div class="flex-w flex-t p-t-27 p-b-33">
                            <div class="size-208">
                                <input type="hidden" name="total" value="{{ $SubTotal }} " hidden>
                            </div>
                            <div class="size-209 p-t-1">
                                <span class="mtext-110 cl2">
                                    {{ $SubTotal }}
                                </span>
                            </div>
                        </div>

                        <button type="submit" form="checkout"
                            class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                            Proceed to Checkout
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
