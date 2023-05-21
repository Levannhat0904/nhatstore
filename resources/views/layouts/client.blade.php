<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nhật Store</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- Css Styles -->
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }} " type="text/css">
    {{-- <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }} " type="text/css"> --}}
    <link rel="stylesheet" href="{{ asset('css/elegant-icons.css') }} " type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/nice-select.css') }} " type="text/css">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css') }} " type="text/css">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }} " type="text/css">
    <link rel="stylesheet" href="{{ asset('css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
    {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}
    @yield('style')
</head>

<body>
    <!-- Page Preloder -->
    {{-- <div id="preloder">
        <div class="loader"></div>
    </div> --}}

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="{{ route('home') }}"><img src="{{ asset('img/logonhat.png') }}" alt=""></a>
            {{-- <a href="#"><img src="{{ asset('img/logo.png') }}" alt=""></a> --}}
        </div>
        <div class="humberger__menu__cart">
            <ul>
                {{-- <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li> --}}
                <ul>
                    <li><a href="{{ route('product.shoppingcart') }}">
                            <h6>Giỏ hàng</h6>
                        </a></li>
                    <li><a href="{{ route('product.shoppingcart') }}"> <i class="fa fa-shopping-bag"></i>
                            <span>{{ Cart::count() }}</span></a></li>
                </ul>
            </ul>
            {{-- <div class="header__cart__price">item: <span>$150.00</span></div> --}}
        </div>
        <div class="humberger__menu__widget">
            {{-- <div class="header__top__right__language">
                <img src="{{ asset('img/language.png') }} " alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">M</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div> --}}
            {{-- @yield('user_responsive') --}}
            @if (Auth::check())
                <div class="dropdown">
                    {{-- <button class="dropbtn">Dropdown</button> --}}
                    <button type="button" class="btn dropdown-toggle">
                        <div class="header__top__right__auth">
                            <a href="#">
                                <i class="fa fa-user"></i>
                                {{ Auth::user()->name }}</a>
                        </div>
                    </button>
                    <div class="dropdown-content">
                        {{-- <a class="dropdown-item" href="#" style="font-size: 1.6rem; text-align: left;"><i
                        style="margin-right: 10px" class="fa fa-user"></i> Tài khoản </a> --}}
                        <a class="dropdown-item" style="font-size: 1.6rem; text-align: left;"
                            href="{{ route('logout') }}"
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

                    <a class="" style="font-size: 1.6rem;background: none; text-align: left;"
                        href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        <i style="margin-right: 10px" class="fa fa-user"></i>
                        Loggin
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            @endif
            {{-- <div class="header__top__right__auth">
                <a href="#"><i class="fa fa-user"></i> Login</a>
            </div> --}}
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="{{ route('home') }}">Home</a></li>
                {{-- <li><a href="./shop-grid.html">Shop</a></li> --}}
                <li><a href="#">Pages</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="./shop-details.html">Shop Details</a></li>
                        <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                        <li><a href="./checkout.html">Check Out</a></li>
                        <li><a href="./blog-details.html">Blog Details</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('blog.index') }}">Tin tức</a></li>
                {{-- <li><a href="./contact.html">Contact</a></li> --}}
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="https://www.facebook.com/lenhat.lhn"><i class="fa-brands fa-facebook"></i></a>
            <a href="http://www.instagram.com/le_vannhat__t"><i class="fa-brands fa-square-instagram"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i>hiamnhatdz203@gmail.com</li>
                {{-- <li>Free Shipping for all Order of $99</li> --}}
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> hiamnhatdz203@gmail.com</li>
                                {{-- <li>Free Shipping for all Order of $99</li> --}}
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="https://www.facebook.com/lenhat.lhn"><i
                                        class="fa-brands fa-facebook"></i></a>
                                <a href="http://www.instagram.com/le_vannhat__t"><i
                                        class="fa-brands fa-square-instagram"></i></a>
                                {{-- <a href="#"><i class="fa-brands fa-tiktok" ></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a> --}}
                            </div>
                            <div class="header__top__right__language">
                                <img style="width: 30px" src="{{ asset('img/vn.jpg') }} " alt="">
                                <div>Việt Nam</div>
                                {{-- <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Spanis</a></li>
                                    <li><a href="#">English</a></li>
                                </ul> --}}
                            </div>
                            {{-- @yield('users') --}}

                            @if (Auth::check())
                                <div class="dropdown">
                                    {{-- <button class="dropbtn">Dropdown</button> --}}
                                    <button type="button" class="btn dropdown-toggle">
                                        <div class="header__top__right__auth">
                                            <a href="#"><i class="fa fa-user"></i>{{ Auth::user()->name }}</a>
                                        </div>
                                    </button>
                                    <div class="dropdown-content">
                                        {{-- <a class="dropdown-item" href="#"
                                            style="font-size: 1.6rem; text-align: left;"><i style="margin-right: 10px"
                                                class="fa fa-user"></i> Tài khoản </a> --}}
                                        <a class="dropdown-item" style="font-size: 1.6rem; text-align: left;"
                                            href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"><i
                                                style="margin-right: 10px" class="fa fa-sign-in"></i>
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            @else
                                <div class="header__top__right__auth">
                                    {{-- <a href="#"><i class="fa fa-user"></i>Login</a> --}}
                                    <a class="dropdown-item"
                                        style="font-size: 1.6rem;background: none; text-align: left;"
                                        href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"><i
                                            style="margin-right: 10px" class="fa fa-user"></i>
                                        {{-- {{ __('Logout') }} Log in --}}Log in
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            @endif

                            {{-- <div class="header__top__right__auth">
                                <a href="#"><i class="fa fa-user"></i> Login</a>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="{{ route('home') }}"><img
                                style="margin-left: 60%;
                            max-width: 33%;"
                                src="{{ asset('img/logox0aphong.png') }} " alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu" style="text-align: center">
                        <ul>
                            <li class="active"><a href="{{ route('home') }}">Home</a></li>
                            {{-- <li><a href="./shop-grid.html">Shop</a></li> --}}
                            <li><a href="#">Pages</a>
                                <ul class="header__menu__dropdown">
                                    @foreach ($pages as $page)
                                        {{-- $pages là biến toàn cục dc dịnh nghĩa trong appseviceprovider --}}
                                        <li><a href="{{ route('page.index', $page->slug) }}">{{ $page->cat }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li><a href="{{ route('blog.index') }}">Tin tức</a></li>
                            {{-- <li><a href="./contact.html">Contact</a></li> --}}
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="{{ route('product.shoppingcart') }}">
                                    <h6>Giỏ hàng</h6>
                                </a></li>
                            <li><a href="{{ route('product.shoppingcart') }}"> <i class="fa fa-shopping-bag"></i>
                                    <span id="cnt_cart">{{ Cart::count() }}</span></a></li>
                        </ul>
                        {{-- <div class="header__cart__price">item: <span>$150.00</span></div> --}}
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->
    @yield('navbar')
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
                                <button type="submit" name="btn-search" value="Tìm kiếm"
                                    class="site-btn">SEARCH</button>
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
    @yield('content')
    <!-- Hero Section Begin -->

    <!-- Blog Section End -->

    <!-- Footer Section Begin -->
    <!-- Footer -->
    <footer class=" text-lg-start bg-white text-muted">
        <!-- Section: Social media -->


        <!-- Section: Links  -->
        <section style="background-color: gainsboro" class="">
            <div class="container text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            <i class="fas fa-gem me-3 text-secondary"></i>Nhatstore
                        </h6>
                        <p>
                            Nhatstore luôn cung cấp luôn là sản phẩm chính hãng có thông tin rõ ràng, chính sách ưu đãi
                            cực lớn cho khách hàng có thẻ thành viên.
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Thông tin cửa hàng
                        </h6>
                        <style>
                            .text-reset {
                                font-size: 1.6rem;
                            }
                        </style>
                        <ul>
                            <li class="text-reset">106 - Trần Bình - Cầu Giấy - Hà Nội</li>
                            <li class="text-reset">0987.654.321 - 0989.989.989</li>
                            <li class="text-reset">vshop@gmail.com</li>
                        </ul>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4" style="font-size: 1.6rem">
                        <!-- Links -->
                        <style>
                            #pageList li {
                                display: none;
                            }

                            #pageList li.visible {
                                display: list-item;
                            }

                            #showMoreBtn {
                                display: none;
                            }
                        </style>

                        <ul id="pageList">

                            {{-- <li class="page-item">Item 1</li> --}}
                            @foreach ($pages as $page)
                                {{-- $pages là biến toàn cục dc dịnh nghĩa trong appseviceprovider --}}
                                <li class="page-item"><a
                                        href="{{ route('page.index', $page->slug) }}">{{ $page->cat }}</a>
                                </li>
                            @endforeach
                            <li id="showMoreBtn" onclick="showMorePages()"> Xem thêm</li>
                        </ul>

                        <script>
                            function showMorePages() {
                                var pageItems = document.getElementById('pageList').getElementsByClassName('page-item');
                                for (var i = 0; i < pageItems.length; i++) {
                                    pageItems[i].classList.add('visible');
                                }
                                document.getElementById('showMoreBtn').style.display = 'none';
                            }

                            window.addEventListener('DOMContentLoaded', function() {
                                var pageItems = document.getElementById('pageList').getElementsByClassName('page-item');
                                if (pageItems.length > 4) {
                                    for (var i = 0; i < 4; i++) {
                                        pageItems[i].classList.add('visible');
                                    }
                                    document.getElementById('showMoreBtn').style.display = 'block';
                                } else {
                                    for (var i = 0; i < pageItems.length; i++) {
                                        pageItems[i].classList.add('visible');
                                    }
                                }
                            });
                        </script>

                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">Liên Hệ</h6>
                        <p><i class="fas fa-home me-3 text-secondary"></i> 70Phùng Hưng - Hà Đông - Hà Nội</p>
                        <p>
                            <i class="fas fa-envelope me-3 text-secondary"></i>
                            hiamnhatdz203@gmail.com
                        </p>
                        <p><i class="fas fa-phone me-3 text-secondary"></i> 0965 203 734</p>
                        <p><i class="fas fa-phone me-3 text-secondary"></i> 0559 886 909</p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.025);">
            © 2023 Copyright:
            <a class="text-reset fw-bold" href="https://mdbootstrap.com/">Nhatstore</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->

    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="{{ asset('js/jquery-3.3.1.min.js') }} "></script>
    <script src="{{ asset('js/bootstrap.min.js') }} "></script>
    <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }} "></script>
    <script src="{{ asset('js/jquery.slicknav.js') }} "></script>
    <script src="{{ asset('js/mixitup.min.js') }} "></script>
    <script src="{{ asset('js/owl.carousel.min.js') }} "></script>
    <script src="{{ asset('js/app.js') }} "></script>
    {{-- <script src="{{ asset('js/main.js') }}"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    {{-- <script src="{{ asset('js/app.js') }} "></script> --}}

    @yield('script')
    <script>
        $(document).ready(function() {
            function number_format(number, decimals, dec_point, thousands_sep) {
                // Định dạng số nguyên theo yêu cầu
                var formattedNumber = number.toFixed(decimals).replace('.', dec_point);
                if (thousands_sep) {
                    var parts = formattedNumber.split(dec_point);
                    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, thousands_sep);
                    formattedNumber = parts.join(dec_point);
                }
                return formattedNumber;
            }
            $(".cat_pro").on("click", "li", function() {
                var cat = $(this).html();
                var dataCatValue = $(this).data('cat');
                var class_cat = "." + dataCatValue;
                // alert(class_cat)
                // alert(dataCatValue)
                // alert(cat);
                var data = {
                    cat: cat,
                    dataCatValue: dataCatValue
                };
                $.ajax({
                    url: "{{ route('product.show') }}",
                    // alert($(this).html());
                    method: "GET",
                    data: data,
                    dataType: "json",
                    // success: function(data) {
                    //    alert(data);
                    // console.log(data);
                    success: function(data) {
                        console.log(data)
                        // Xử lý dữ liệu nhận về từ server
                        var products =
                            data; // Giả sử dữ liệu $products được trả về dưới dạng JSON
                        // console.log(products.length)
                        // Tạo biến để lưu nội dung mới
                        var newContent = "";
                        // var url =" {{ route('home') }}";
                        var ASSET_URL = '{{ env('APP_URL') }}';
                        var DETAIL_URL = '{{ env('APP_URL') }}./product/detail/';
                        // console.log(products.name);
                        // Lặp qua danh sách $products và tạo nội dung mới
                        for (var i = 0; i < products.length; i++) {
                            newContent +=
                                '<div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">' +
                                '<div class="featured__item">' +
                                '<div class="featured__item__pic set-bg"' +
                                'style="background-image: url(\'' + ASSET_URL +
                                products[i].img +
                                '\')"' +
                                'data-setbg="' +
                                ASSET_URL +
                                products[i].img +
                                '">' +
                                '<ul class="featured__item__pic__hover">' +

                                '<li><a href="' +
                                DETAIL_URL + products[i].id +
                                '"><i class="fa fa-shopping-cart"></i></a></li>' +
                                "</ul>" +
                                "</div>" +
                                '<div class="featured__item__text">' +
                                '<h6><a href="#">' +
                                products[i].name +
                                "</a></h6>" +
                                "<h5>" +
                                number_format(products[i].price, 0, ',', '.') + 'vnđ' +
                                "</h5>" +
                                "</div>" +
                                "</div>" +
                                "</div>";

                        }

                        // var newContent=""
                        // // // Đưa nội dung mới vào container
                        $(class_cat).html(newContent);
                        // }
                    },
                    error: function(xhr, status, error) {
                        // console.error(xhr.responseText);
                    },
                });
            });
        });
        $(document).ready(function() {
            // $(document).on("click", ".delete", function() {
            $(document).on("click", ".icon_close", function() {
                var rowId = $(this).data("rowid");
                var data = {
                    rowId: rowId,
                };
                if (confirm("xóa sản phẩm")) {
                    // alert(rowId);
                    $(this).closest("tr").remove();
                    $.ajax({
                        url: "{{ route('removecart') }}",
                        method: "GET",
                        data: data,
                        success: function(data) {
                            console.log("xóa thành công");
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        },
                    });
                }
            })
            // });
        });
        $(document).ready(function() {
            $(document).on("click", ".qtybtn", function() {
                const parent = ($(this).parent())

                var qty = $(parent).find("input[name='qty_cart']").val()
                const rowId = $(parent).find("input[name='qty_cart']").data("id")
                if (qty == 0) {
                    if (confirm("Đã xóa sản phẩm")) {
                        $(this).closest("tr").remove();
                    } else {
                        var qty_item = "#qty-item" + rowId
                        $(parent).find("input[name='qty_cart']").val("1")
                        // const qty = $(parent).find("input[name='qty_cart']").val()
                        qty = 1
                        // qty = $(parent).find("input[name='qty_cart']").val()
                    }
                }
                var data = {
                    rowId: rowId,
                    qty: qty,
                };
                var id = "#total-item-" + rowId;

                // console.log(id);
                $.ajax({
                    url: "{{ route('update_cart') }}",
                    method: 'GET',
                    data: data,
                    dataType: 'json',
                    success: function(data) {
                        // console.log(data.total);
                        $(id).text(data.total);
                        $("#cnt_cart").text(data.cnt);
                    },
                })
            });
        });

        $(document).ready(function() {
            $(document).on("click", ".button", function() {
                // Lấy giá trị của input radio được chọn
                var color = $("input[name='color']:checked").val();
                var qty = $("input[name='qty']").val();
                var id = $(this).data("id");
                var data = {
                    id: id,
                    color: color,
                    qty: qty,
                };

                $.ajax({
                    url: "{{ route('add_cart', 11) }}",
                    method: 'GET',
                    data: data,
                    success: function(data) {
                        // console.log("add thành công");
                        // console.log(data);
                        if (confirm("Đã thêm giỏ hàng thành công")) {
                            window.location.href = "{{ route('product.shoppingcart') }}"
                        }
                    },
                    error: function(xhr, status, error) {
                        // console.error(xhr.responseText);
                    },
                });
            });
        });
        // $(document).ready(function() {
        //     $(document).on("click", ".button_buy", function() {
        //         // Lấy giá trị của input radio được chọn
        //         var color = $("input[name='color']:checked").val();
        //         var qty = $("input[name='qty']").val();
        //         var id = $(this).data("id");
        //         var data = {
        //             id: id,
        //             color: color,
        //             qty: qty,
        //         };

        //         $.ajax({
        //             url: "{{ route('checkout') }}",
        //             method: 'GET',
        //             data: data,
        //             success: function(data) {
        //                 // console.log("add thành công");
        //                 console.log(data);
        //                 // if (confirm("Đã thêm giỏ hàng thành công")) {
        //                     window.location.href = "{{ route('checkout') }}"
        //                 // }
        //             },
        //             error: function(xhr, status, error) {
        //                 // console.error(xhr.responseText);
        //             },
        //         });
        //     });
        // });
    </script>

    <script>
        window.jQuery || document.write('<script src="/docs/4.5/assets/js/vendor/jquery.slim.min.js"><\/script>')
    </script>

</body>

</html>
