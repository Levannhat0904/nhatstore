@extends('layouts.client')
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
    integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
</script>
@section('navbar')
    
@endsection
@section('content')
    <section class="categories">
        <div class="container">
            {{-- <div class="section-title"><img style="width: 500px; height: 90px; " src="{{ asset('img/tophot.png') }}"
                    alt="title" loading="lazy">
            </div> --}}
            
            <div class="row">
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
                
                <div class="categories__slider owl-carousel">
                    @foreach ($product_hots as $p)
                        <div class="col-lg-3">
                            <a href="{{ route('product.detail', $p->id) }}">
                                <div class="categories__item set-bg" data-setbg="{{ asset($p->img) }}"
                                    style="width: 200px; height: 200px;display: flexbox; background-image:url('{{ asset($p->img) }}');margin: 0 auto;">
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
                </div>
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
                    @foreach ($products as $key => $productx)
                        <h2 style="text-align: center">{{ $key }}</h2>

                        <div class="featured__controls">
                            <ul id="cat_s" class="cat_pro">
                                @foreach ($productx as $product)
                                    {{-- <li>{{ explode('.', $product->slug_cat)[1]}}</li> --}}
                                    @php
                                        $slug[] = explode('.', $product->slug_cat)[1];
                                    @endphp
                                @endforeach
                                @foreach (array_unique($slug) as $v)
                                    <li data-cat="catagory_{{ Str::slug($key, '_') }}">{{ $v }}</li>
                                @endforeach
                                @php
                                    $slug = null;
                                @endphp
                                {{-- <li>{{end(array_filter(explode('.', $product->slug_cat)))}}</li> --}}
                            </ul>
                        </div>
                        {{-- </div> --}}

                        <script></script>

                        <div id="product-list">
                            <div class="row featured__filter catagory_{{ Str::slug($key, '_') }}" id="productContainer">
                                @foreach ( collect($productx)->take(12) as $product)
                                {{-- @foreach ($productx->paginate(10) as $product) --}}

                                    <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                                        <div class="featured__item">

                                            <div class="featured__item__pic img set-bg"
                                                data-setbg="{{ asset($product->img) }} " style="background-image:url('{{ asset($product->img) }}') ">
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
                        </div>
                    @endforeach
                </div>
    </section>


    <!-- Featured Section End -->


    {{-- <div class="cb_tip"><span id="dot"><img src="//clickbuy.com.vn/clipse.svg" alt="clipse"></span>
        <div class="textwidget">
            <p>
                <a href="https://clickbuy.com.vn/samsung-galaxy-uu-dai-cuc-khung/" target="_blank"rel="noopener">
                    <strong>
                        <span style="color: #ff0000;">TOP BÁN CHẠY</span>
                    </strong>
                </a>
            </p>
        </div>
    </div> --}}
    <!-- Latest Product Section Begin -->
    {{-- <section class="latest-product spad">
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
    </section> --}}
    <!-- Latest Product Section End -->

    <!-- Blog Section Begin -->
    
    <!-- Blog Section End -->

    <!-- Footer Section Begin -->
@endsection
<!-- Footer Section End -->

<!-- Js Plugins -->
@section('script')
    <script src="{{ asset('js/main.js') }}"></script>
@endsection
