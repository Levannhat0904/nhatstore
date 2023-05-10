@extends('layouts.client')
@section('users')
    @if (!empty($user))
        <div class="dropdown">
            {{-- <button class="dropbtn">Dropdown</button> --}}
            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="header__top__right__auth">
                    <a href="#"><i class="fa fa-user"></i>{{ $user }}</a>
                </div>
            </button>
            <div class="dropdown-content">
                <a class="dropdown-item" href="#" style="font-size: 1.6rem; text-align: left;"><i
                        style="margin-right: 10px" class="fa fa-user"></i> Tài khoản </a>
                <a class="dropdown-item" style="font-size: 1.6rem; text-align: left;" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();"><i
                        style="margin-right: 10px" class="fa fa-sign-in"></i>
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    @else
        <div class="header__top__right__auth">
            {{-- <a href="#"><i class="fa fa-user"></i>Login</a> --}}
            <a class="dropdown-item" style="font-size: 1.6rem;background: none; text-align: left;"
                href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();"><i
                    style="margin-right: 10px" class="fa fa-user"></i>
                {{-- {{ __('Logout') }} Log in --}}Log in
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    @endif
@endsection
@section('user_responsive')
    {{-- <div class="header__top__right__auth">
        <a href="#"><i class="fa fa-user"></i>{{ $user }}</a>
    </div> --}}
    @if (!empty($user))
        <div class="dropdown">
            {{-- <button class="dropbtn">Dropdown</button> --}}
            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <div class="header__top__right__auth">
                    <a href="#">
                        <i class="fa fa-user"></i>
                        {{ $user }}</a>
                </div>
            </button>
            <div class="dropdown-content">
                <a class="dropdown-item" href="#" style="font-size: 1.6rem; text-align: left;"><i
                        style="margin-right: 10px" class="fa fa-user"></i> Tài khoản </a>
                <a class="dropdown-item" style="font-size: 1.6rem; text-align: left;" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();"><i
                        style="margin-right: 10px" class="fa fa-sign-in"></i>
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    @else
        <div class="header__top__right__auth">

            <a class="" style="font-size: 1.6rem;background: none; text-align: left;" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                <i style="margin-right: 10px" class="fa fa-user"></i>
                Log inn
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    @endif
@endsection
@section('content')
    <!-- Hero Section Begin -->

    <!--hihi -->
    <!--hii -->
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->\

    <section class="categories">

        <div class="container">
            <div class="section-title"><img style="width: 500px; height: 90px; " src="{{ asset('img/tophot.png') }}"
                    alt="title" loading="lazy">

            </div>
            <div class="row">



                <div class="categories__slider owl-carousel">
                    @foreach ($product_hots as $p)
                        <div class="col-lg-3">
                            <a href="{{ route('product.detail', $p->id) }}">
                                <div class="categories__item set-bg" data-setbg="{{ asset($p->img) }}"
                                    style="width: 200px; height: 200px;">
                                </div>

                            </a>
                            <div>
                                <h5 style="text-align: center">
                                    <p>{{ $p->name }}</p>
                                </h5>

                            </div>
                            {{-- <h5><b style="text-align: center">Mua Ngay</b></h5> --}}
                        </div>
                    @endforeach
                    {{-- <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{ asset('img/categories/cat-2.jpg') }}">
                            <h5><a href="#">Dried Fruit</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{ asset('img/categories/cat-3.jpg') }}">
                            <h5><a href="#">Vegetables</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{ asset('img/categories/cat-4.jpg') }}">
                            <h5><a href="#">drink fruits</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{ asset('img/categories/cat-5.jpg') }} ">
                            <h5><a href="#">drink fruits</a></h5>
                        </div>
                    </div> --}}
                </div>
            </div>

        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Điện thoại</h2>
                    </div>
                    <div class="featured__controls">
                        <ul id="cat">
                            @foreach ($cat_smartphone as $cat)
                                <li>{{ $cat->catagory_item }}</li>
                            @endforeach
                            {{-- <li>Samsung </li>
                            <li>Pixel </li>
                            <li>Redmi </li> --}}
                            {{-- <li class="active"><a href="{{ asset('product/iphone') }}"> iPhone</a> </li>
                            <li><a href="{{ asset('product/samsung') }}">Samsung</a></li>
                            <li><a href="{{ asset('product/pixel') }}">Pixel</a></li>
                            <li><a href="{{ asset('product/Redmi') }}">Redmi</a></li> --}}
                            {{-- <li ><a href="">All</a></li>
                            <li ><a href="">All</a></li> --}}
                        </ul>
                    </div>
                </div>
                <div id="product-list">
                    <div class="row featured__filter" id="productContainer">

                        @foreach ($products_smartphone as $product)
                            <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                                <div class="featured__item">

                                    <div class="featured__item__pic img set-bg" data-setbg="{{ asset($product->img) }} ">
                                        <ul class="featured__item__pic__hover">
                                            {{-- <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li> --}}
                                            <li><a href="{{ route('product.detail', $product->id) }}"><i
                                                        class="fa fa-shopping-cart"></i></a></li>
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
                </div>
            </div>
    </section>
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Laptop</h2>
                    </div>
                    <div class="featured__controls">
                        <ul id="cat_laptop">
                            @foreach ($cat_laptop as $cat)
                                <li>{{ $cat->catagory_item }}</li>
                            @endforeach
                            {{-- <li>Samsung </li>
                            <li>Pixel </li>
                            <li>Redmi </li> --}}
                            {{-- <li class="active"><a href="{{ asset('product/iphone') }}"> iPhone</a> </li>
                            <li><a href="{{ asset('product/samsung') }}">Samsung</a></li>
                            <li><a href="{{ asset('product/pixel') }}">Pixel</a></li>
                            <li><a href="{{ asset('product/Redmi') }}">Redmi</a></li> --}}
                            {{-- <li ><a href="">All</a></li>
                            <li ><a href="">All</a></li> --}}
                        </ul>
                    </div>
                </div>
                <div id="product-list">
                    <div class="row featured__filter" id="product_laptop">

                        @foreach ($products_laptop as $product)
                            <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                                <div class="featured__item">

                                    <div class="featured__item__pic img set-bg" data-setbg="{{ asset($product->img) }} ">
                                        <ul class="featured__item__pic__hover">
                                            {{-- <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li> --}}
                                            <li><a href="{{ route('product.detail', $product->id) }}"><i
                                                        class="fa fa-shopping-cart"></i></a></li>
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
                </div>
            </div>
    </section>
    
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    {{-- <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="{{ asset('img/banner/banner-1.jpg') }} " alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="{{ asset('img/banner/banner-2.jpg') }} " alt="">
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Banner End -->
    <div class="cb_tip"><span id="dot"><img src="//clickbuy.com.vn/clipse.svg" alt="clipse"></span>
        <div class="textwidget">
            <p>
                <a href="https://clickbuy.com.vn/samsung-galaxy-uu-dai-cuc-khung/" target="_blank"rel="noopener">
                    <strong>
                        <span style="color: #ff0000;">TOP BÁN CHẠY</span>
                    </strong>
                </a>
            </p>
        </div>
    </div>
    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Latest Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ asset('img/latest-product/lp-1.jpg') }} " alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ asset('img/latest-product/lp-3.jpg') }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ asset('img/latest-product/lp-3.jpg') }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ asset('img/latest-product/lp-1.jpg') }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ asset('img/latest-product/lp-2.jpg') }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ asset('img/latest-product/lp-3.jpg') }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Top Rated Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ asset('img/latest-product/lp-1.jpg') }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ asset('img/latest-product/lp-2.jpg') }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ asset('img/latest-product/lp-3.jpg') }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ asset('img/latest-product/lp-1.jpg') }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ asset('img/latest-product/lp-2.jpg') }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ asset('img/latest-product/lp-3.jpg') }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Review Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ asset('img/latest-product/lp-1.jpg') }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ asset('') }}img/latest-product/lp-2.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ asset('img/latest-product/lp-3.jpg') }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ asset('img/latest-product/lp-1.jpg') }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ asset('img/latest-product/lp-2.jpg') }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ asset('img/latest-product/lp-3.jpg') }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Product Section End -->

    <!-- Blog Section Begin -->
    <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>From The Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="{{ asset('img/blog/blog-1.jpg') }}" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Cooking tips make cooking simple</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="{{ asset('img/blog/blog-2.jpg') }}" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">6 ways to prepare breakfast for 30</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="{{ asset('img/blog/blog-3.jpg') }}" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Visit the clean farm in the US</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

    <!-- Footer Section Begin -->
@endsection
<!-- Footer Section End -->

<!-- Js Plugins -->
