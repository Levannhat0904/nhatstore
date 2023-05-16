@extends('layouts.client')
@section('navbar')
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">

                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
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
                <div style="margin: 0 auto; padding: 10px;">
                    @foreach ($product_cat as $cat)
                        <button style="padding: 5px; font-size: 16px ; margin: 5px 10px;" type="button"
                            class="btn btn-outline-primary"><a href="">{{ $cat->cat_item }}</a></button>
                    @endforeach
                </div>
                <div class="col-lg-12 col-md-12">
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <span>Sort By</span>
                                    <select>
                                        <option value="0">Default</option>
                                        <option value="0">Default</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    <h6><span>16</span> Products found</h6>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-3">
                                <div class="filter__option">
                                    <span class="icon_grid-2x2"></span>
                                    <span class="icon_ul"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($product_cat as $cat)
                            @foreach ($cat->product as $product)
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
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script src="{{ asset('js/main.js') }}"></script>
@endsection
