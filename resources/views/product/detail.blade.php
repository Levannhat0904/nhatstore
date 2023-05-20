@extends('layouts.client')
@section('content')
    
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    
    <!-- Breadcrumb Section End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            
            <div class="row">
                
                
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                src="{{ asset($products->img) }}" alt="">
                        </div>
                      
                        <div class=" product__details__pic__slider owl-carousel">
                            @php
                            $k = json_decode($products->thumbnail);
                           foreach ($k as $key => $value){
                             
                           @endphp
                                <img data-imgbigurl="{{asset($value)}}"
                                    src="{{asset($value)}}" alt="">
                             @php
                                 }
                             @endphp
                        </div>
                    </div>
                    
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <form action="{{ route('buy_item', $products->id) }}">
                            @csrf       
                        <h3>{{$products->name}}</h3>
                        <div class="product__details__price">{{ number_format($products->price, 0, ',', '.') }}{{ 'vnđ' }}</div>
                        <h3>Màu sắc</h3>
                        @php
                            $k = json_decode($products->color);
                           foreach ($k as $key => $value){
                            //  echo $value;
                           @endphp
                           <div class="form-check form-check-inline">
                                        <input class="form-check-input color" type="radio" id="inlineCheckbox1" name="color"
                                            value="{{ $value }}">
                                        <label class="form-check-label color" 
                                            for="inlineCheckbox1"><h4>{{ $value }}</h4></label>
                                    </div>
                             @php
                                 }
                             @endphp
                            <div style="margin: 20px auto; color: red; font-size: 1.4rem"><i>* Lưu ý: Nếu không chọn màu, shop sẽ giao màu ngẫu nhiên</i></div>
                             {{-- <input type="button" value="Thêm mới" data-id="{{$products->id}}" class="button" name="button"> --}}
                             <div>  </div>
                             <div>  </div>
                                {{-- <label for="qty" ><h3 style="margin-right: 10px">Số lượng:</h3></label>
                                <input style="font-size: 1.6rem;
                                width: 100px;
                                text-align: center;" type="number" value="1" name="qty" min="1"class="qty" id="qty"> --}}
                                
                             <div class="product__details__quantity">
                                 <div class="quantitys">
                                     <label for="qty" ><h3 style="margin-right: 10px">Số lượng:</h3></label>
                                     <div class="pro-qty">
                                        <input type="text" value="1" min="1" name="qty" class="qty" id="qty">
                                    </div>
                                    </div>
                                </div> 
                                
                                
                                <HR></HR>
                        <dir></dir> 
                        <input type="submit" data-id="{{$products->id}}" value="Mua ngay"class="primary-btn button_buy">
                    </form>
                        <input type="button" data-id="{{$products->id}}" value="Thêm vào giỏ hàng"class="primary-btn button">
                        {{-- <a href="{{ route('add_cart', $products->id) }}" class="primary-btn">Thêm vào giỏ hàng</a> --}}
                        {{-- <a href="{{route('checkout')}}" class="primary-btn">Mua ngay</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
         

        .box input[name="readmore"]{
            display: none;
        }
        
        .box .des{
            text-align: justify;
            position: relative;
            overflow: hidden;
            max-height: 500px;
            transition: 0.5s ease-in-out;
        }
        .box .des::before{
            position: absolute;
            bottom:0;
            left:0;
            width:100%;
            height:50px;
            transition: 0.5s ease-in-out;
            content:'';
            background-image: linear-gradient(to top, #2F144C, transparent);
        }
        .box .button{
            margin-top:30px;
            text-align: center;
        }
        .box label{
            text-align: center;
            display: inline-block;
            border:1px solid #000;
            width:140px;
            height:50px;
            position: relative;
            cursor: pointer;
        }
        .box label::before{
            position: absolute;
            top:0;
            left:0;
            width:100%;
            height:100%;
            content:attr(data-more);
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .box input[name="readmore"]:checked ~ .content label::before{
            content:attr(data-less);
        }
        .box input[name="readmore"]:checked ~ .content .des{
            max-height: 100%;
        }
        .box input[name="readmore"]:checked ~ .content .des::before{
            height: 0px;
        }
        .content{
            position: relative;
        }
        .content::before{
            position: absolute;
            bottom:50px;
            right:5px;
            width:50px;
            height: 70px;
            content:'';
            background-image: url(img1.png);
            background-size: 100%;
            background-repeat: no-repeat;
            z-index: 1;
            transition: 3s ease-in-out;
        }
        .content::after{
            position: absolute;
            bottom:0px;
            right:0px;
            transform: translate(70%,50%);
            /* width:200px; */
            /* height: 150px; */
            content:'';
            background-image: url(img2.png);
            background-size: 100%;
            background-repeat: no-repeat;
            z-index: 1;
            transition: 3s ease-in-out;
        }
        .box input[name="readmore"]:checked ~ .content::before{
            bottom:80%;
            right:100%;
            transform: rotate(-50deg);
        }
        .box input[name="readmore"]:checked ~ .content::after{
            transform: translate(75%,55%) rotate(30deg);
        }
          
            </style>
    <div class="col-lg-12">
        <div style="margin: 100px 10px" >
           <p><b style="font-size: 30px">Chi tiết sản phẩm</b> </p>
           
            
            <div class="box">
                <input type="checkbox" name="readmore" id="readmore">
                <div class="content">
                    <div class="des" style="margin: 0 10%">
                        {!! $products->content !!}
                    </div>
                    <div class="button">
                        <label for="readmore"
                            data-more="READ MORE"
                            data-less="READ LESS"
                        ></label>
                    </div>
                </div>
            </div>
       </div>
    </div>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Sản phẩm tương tự</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($product_same as $v)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg"  data-setbg="{{ asset($v->img) }}">
                            <ul class="product__item__pic__hover">
                                {{-- <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li> --}}
                                <li><a href="{{ route('product.detail', $v->id) }}"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">{{$v->name}}</a></h6>
                            <h5>{{ number_format($v->price, 0, ',', '.') }}{{ 'vnđ' }}</h5>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
@section('script')

<script src="{{ asset('js/main.js') }}"></script>
@endsection