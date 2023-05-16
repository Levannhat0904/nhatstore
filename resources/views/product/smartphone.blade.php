@extends('layouts.client')
@section('navbar')
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Danh mục sản phẩm</span>
                        </div>

                        <ul>
                            <style>
                                .hiddenn {
                                    display: none;
                                }

                                .hiddenn.active {
                                    display: block;
                                }
                            </style>

                            <div style="font-size: 1.6rem">
                                @foreach ($product_cats as $index => $product_cat)
                                    <div>
                                        <a href="{{ route('product.device', Str::slug($product_cat->cat)) }}"><span
                                                data-target="hiddenn{{ $index }}">{{ $product_cat->cat }}</span></a>
                                        <span style="margin: 10px" class="shows"><i
                                                class="fa-solid fa-caret-down fa-beat"></i></span>
                                        <div class="hiddenn" id="hiddenn{{ $index }}">
                                            @foreach ($product_cat->cat_product as $cat)
                                                <div style="margin: 20px">
                                                    <a
                                                        href="{{ route('product.device', Str::slug($cat->cat_item)) }}">{{ $cat->cat_item }}</a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            <script>
                                $(document).ready(function() {
                                    $('.shows').click(function() {
                                        var target = $(this).prev().find('span').data('target');
                                        $('#' + target).toggle();
                                    });
                                });
                            </script>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="{{ route('home') }}">
                                {{--  --}}
                                <input type="text" name="keyword" value="{{ request()->input('keyword') }}"
                                    placeholder="Bạn cần tìm gì?">
                                <button type="submit" name="btn-search" value="Tìm kiếm" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>0559886909</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div style="padding: 10px; font-size: 1.7rem"> <a href="{{ route('home') }}"><i
                            class="fa-solid fa-house"></i> Trang chủ</a></div>
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
                        <div class="row">
                            {{-- @foreach ($product_cat_perent as $cat) --}}
                            @foreach ($products as $product)
                                <div
                                    class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat item {{ $product->productCat->id }}">
                                    <div class="featured__item">

                                        <div class="featured__item__pic img set-bg"
                                            data-setbg="{{ asset($product->img) }} ">
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
                            {{-- @endforeach --}}
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
                        <div class="row">
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
                            @foreach ($products as $product)
                                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                                    <div class="featured__item">

                                        <div class="featured__item__pic img set-bg"
                                            data-setbg="{{ asset($product->img) }} ">
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
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script src="{{ asset('js/main.js') }}"></script>
@endsection
