@extends('layouts.client')


@section('content')
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div style="padding: 10px; font-size: 1.7rem"> <a href="{{ route('home') }}"><i class="fa-solid fa-house"></i>
                        Trang chủ</a></div>
                <div class="ategory-list" style="margin: 0 auto; padding: 10px;">
                    @if (isset($product_cat_perent))
                        @foreach ($product_cat_perent as $cat)
                            <button style="padding: 5px; font-size: 16px ; margin: 5px 10px;" type="button"
                                data-category="{{ $cat->id }}"
                                class="btn btn-outline-primary category-button">{{ $cat->cat_item }}</button>
                        @endforeach
                    @endif
                </div>
                <div class="col-lg-12 col-md-12">
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    {{-- @if (!isset($product_cat_perent)) --}}
                                    <form action="#">
                                        <span>Sắp xếp</span>
                                        <input type="submit" class="btn btn-secondary btn-lg" value="Giảm dần"
                                            name="sort">
                                        <input type="submit" class="btn btn-secondary btn-lg" value="Tăng dần"
                                            name="sort">
                                    </form>
                                    {{-- @endif --}}
                                </div>
                            </div>
                            {{-- <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    <h6><span>16</span> Products found</h6>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-3">
                                <div class="filter__option">
                                    <span class="icon_grid-2x2"></span>
                                    <span class="icon_ul"></span>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    @if (isset($product_cat_perent))
                        @php
                            $products = $product_all_cat;
                        @endphp
                        @if (isset($_GET['sort']))
                            @php
                                if ($_GET['sort'] == 'Giảm dần') {
                                    $sort = 1;
                                } else {
                                    $sort = 0;
                                }
                                // echo $sort;
                                $products = $products->sortBy('price', SORT_REGULAR, $sort);
                                unset($_GET['sort']);
                            @endphp
                        @endif
                        {{--  --}}
                        <style>
                            .load-more {
                                display: none;
                            }
                        </style>
                        
                        <div id="product-container" class="row">
                            @foreach ($products as $product)
                                <div
                                    class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat item {{ $product->productCat->id }}">
                                    <div class="featured__item cart_product">

                                        <div class="featured__item__pic img product_img set-bg"
                                            data-setbg="{{ asset($product->img) }}"
                                            style="background-image: url('{{ asset($product->img) }}')">

                                            <ul class="featured__item__pic__hover">
                                                <li>
                                                    <a href="{{ route('product.detail', $product->id) }}">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="featured__item__text">
                                            <h6><a href="#">{{ $product->name }}</a></h6>
                                            <h5>{{ number_format($product->price, 0, ',', '.') }}{{ 'vnđ' }}</h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="row" style="justify-content: center ; font-size: 1.6rem">

                            <div id="load-more-container">
                                <button id="load-more-btn"
                                    style="font-size: 1.6rem;color: #fff;
                                        background-color: #c11b39;
                                        border-color: #c11b39;">
                                    Xemthêm</button>
                            </div>
                        </div>



                        <script>
                            $(document).ready(function() {
                                $('.category-button').click(function() {
                                    var category = $(this).data('category');
                                    // alert(category)
                                    $('.item').each(function() {
                                        if (!$(this).hasClass(category)) {
                                            $(this).css('display', 'none');
                                        } else {
                                            $(this).css('display', 'block');
                                        }
                                    });
                                });
                            });
                        </script>
                    @else
                        {{-- <div class="row"> --}}
                        {{-- {{ $cat }} --}}
                        @php
                            $products = $product_cat_item->product;
                        @endphp
                        @if (isset($_GET['sort']))
                            @php
                                if ($_GET['sort'] == 'Giảm dần') {
                                    $sort = 1;
                                } else {
                                    $sort = 0;
                                }
                                // echo $sort;
                                $products = $product_cat_item->product->sortBy('price', SORT_REGULAR, $sort);
                                unset($_GET['sort']);
                            @endphp
                        @endif
                        <style>
                            .load-more {
                                display: none;
                            }
                        </style>
                        <div id="product-container" class="row">
                            @foreach ($products as $product)
                                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat item">
                                    <div class="featured__item">

                                        <div class="featured__item__pic img set-bg"
                                            data-setbg="{{ asset($product->img) }} "
                                            style="background-image: url('{{ asset($product->img) }}')">
                                            <ul class="featured__item__pic__hover">
                                                <li>
                                                    <a href="{{ route('product.detail', $product->id) }}">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="featured__item__text">
                                            <h6><a href="#">{{ $product->name }}</a></h6>
                                            <h5>{{ number_format($product->price, 0, ',', '.') }}{{ 'vnđ' }}
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="row" style="justify-content: center ; font-size: 1.6rem">

                            <div id="load-more-container">
                                <button id="load-more-btn"
                                    style="font-size: 1.6rem;color: #fff;
                                        background-color: #c11b39;
                                        border-color: #c11b39;">
                                    Xemthêm</button>
                            </div>
                        </div>
                        {{-- </div> --}}
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        var shownProducts = 12;
        var loadMoreCount = 12;

        var products = document.getElementById('product-container').getElementsByClassName('item');
        var loadMoreBtn = document.getElementById('load-more-btn');
        var loadMoreContainer = document.getElementById('load-more-container');

        for (var i = shownProducts; i < products.length; i++) {
            products[i].style.display = 'none';
        }

        if (shownProducts < products.length) {
            loadMoreContainer.style.display = 'block';
        }

        loadMoreBtn.addEventListener('click', function() {
            // alert("sdj")
            var hiddenProducts = Array.prototype.filter.call(products, function(product) {
                return product.style.display === 'none';
            });

            var showCount = Math.min(loadMoreCount, hiddenProducts.length);

            for (var i = 0; i < showCount; i++) {
                hiddenProducts[i].style.display = 'block';
            }

            shownProducts += showCount;

            if (shownProducts >= products.length) {
                loadMoreContainer.style.display = 'none';
            }
        });
    </script>
    <script src="{{ asset('js/main.js') }}"></script>
@endsection
