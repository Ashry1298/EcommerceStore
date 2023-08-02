<x-products-section :categories="$cats"/>
<section class="bg0 p-t-23 p-b-130">
    <div class="container">
        <div class="flex-w flex-l-m filter-tope-group m-tb-10">
            <a href="{{ route('front') }}"
                class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 {{ !request()->has('category_id') ? 'how-active1' : '' }} ">
                All Products
                </button>
                @foreach ($cats as $cat)
                    <a href="{{ filterByUrl(url('/'), 'category_id', $cat->id) }}"
                        class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 {{ (request()->has('category_id') and request()->category_id == $cat->id) ? 'how-active1' : '' }}">
                        {{ $cat->title }}
                    </a>
                @endforeach
        </div>   
        <div class="p-b-10">
            <h3 class="ltext-103 cl5">
                Product Overview
            </h3>
            <div class="row isotope-grid">
                @forelse ($products as $product)
                    <x-product-card :product="$product" />
                @empty
                    <span>
                        <h5>Sorry No Products Available For This Category</h5>
                    </span>
                @endforelse
            </div>
        </div>
        <div class="flex-w flex-sb-m p-b-52">
      
            <div class="flex-w flex-sb-m p-b-52">
                <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                    <a href="{{ route('front') }}"
                        class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 {{ !request()->has('size_id') ? 'how-active1' : '' }} ">
                        All Sizes
                        @if (request()->has('category_id'))
                            @foreach (App\Models\Category::findorfail(request()->category_id)->sizes as $size)
                                <a href="{{ filterByUrl(url('/'), 'size_id', $size->id) }}"
                                    class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 {{ (request()->has('size_id') and request()->size_id == $size->id) ? 'how-active1' : '' }}">
                                    {{ $size->sizeName }}
                                </a>
                            @endforeach
                        @else
                        @endif

                </div>

        
            <br>
          
            <!-- Pagination -->
            <div class="flex-c-m flex-w w-full p-t-38">
                <a href="#" class="flex-c-m how-pagination1 trans-04 m-all-7 active-pagination1">
                    1
                </a>

                <a href="#" class="flex-c-m how-pagination1 trans-04 m-all-7">
                    2
                </a>
            </div>
        </div>
</section>
