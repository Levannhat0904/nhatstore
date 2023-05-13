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
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }} " type="text/css">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }} " type="text/css">
    <link rel="stylesheet" href="{{ asset('css/elegant-icons.css') }} " type="text/css">
    <link rel="stylesheet" href="{{ asset('css/nice-select.css') }} " type="text/css">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css') }} " type="text/css">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }} " type="text/css">
    <link rel="stylesheet" href="{{ asset('css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
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
            {{-- <div class="header__top__right__auth">
                <a href="#"><i class="fa fa-user"></i> Login</a>
            </div> --}}
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="./index.html">Home</a></li>
                <li><a href="./shop-grid.html">Shop</a></li>
                <li><a href="#">Pages</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="./shop-details.html">Shop Details</a></li>
                        <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                        <li><a href="./checkout.html">Check Out</a></li>
                        <li><a href="./blog-details.html">Blog Details</a></li>
                    </ul>
                </li>
                <li><a href="./blog.html">Blog</a></li>
                <li><a href="./contact.html">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="https://www.facebook.com/lenhat.lhn"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
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
                                <a href="https://www.facebook.com/lenhat.lhn"><i class="fa fa-facebook"></i></a>
                                <a href="http://www.instagram.com/le_vannhat__t"><i class="fa fa-instagram"></i></a>
                                {{-- <a href="#"><i class="fa-brands fa-tiktok" ></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a> --}}
                            </div>
                            <div class="header__top__right__language">
                                <img style="width: 30px"
                                    src="{{ asset('img/Flag_of_North_Vietnam_(1955–1976).jpg') }} " alt="">
                                <div>Việt Nam</div>
                                {{-- <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Spanis</a></li>
                                    <li><a href="#">English</a></li>
                                </ul> --}}
                            </div>
                            {{-- @yield('users') --}}

                            @if (!empty($user))
                                <div class="dropdown">
                                    {{-- <button class="dropbtn">Dropdown</button> --}}
                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <div class="header__top__right__auth">
                                            <a href="#"><i class="fa fa-user"></i>{{ $user }}</a>
                                        </div>
                                    </button>
                                    <div class="dropdown-content">
                                        <a class="dropdown-item" href="#"
                                            style="font-size: 1.6rem; text-align: left;"><i style="margin-right: 10px"
                                                class="fa fa-user"></i> Tài khoản </a>
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
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="./shop-grid.html">Shop</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="./shop-details.html">Shop Details</a></li>
                                    <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                                    <li><a href="./checkout.html">Check Out</a></li>
                                    <li><a href="./blog-details.html">Blog Details</a></li>
                                </ul>
                            </li>
                            <li><a href="./blog.html">Blog</a></li>
                            <li><a href="./contact.html">Contact</a></li>
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
    @yield('content')
    <!-- Hero Section Begin -->

    <!-- Blog Section End -->

    <!-- Footer Section Begin -->
    <div id="footer-wp" style="box-sizing: border-box;font-size: 1.6rem;background-color: aliceblue">
        <div id="foot-body">
            <div class="wp-inner clearfix">
                <div class="block" id="info-company">
                    <h3 class="title">ISMART</h3>
                    <p class="desc">ISMART luôn cung cấp luôn là sản phẩm chính hãng có thông tin rõ ràng, chính sách
                        ưu đãi cực lớn cho khách hàng có thẻ thành viên.</p>
                    <div id="payment">
                        <div class="thumb">
                            <img src="public/images/img-foot.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="block menu-ft" id="info-shop">
                    <h3 class="title">Thông tin cửa hàng</h3>
                    <ul class="list-item">
                        <li>
                            <p>106 - Trần Bình - Cầu Giấy - Hà Nội</p>
                        </li>
                        <li>
                            <p>0987.654.321 - 0989.989.989</p>
                        </li>
                        <li>
                            <p>vshop@gmail.com</p>
                        </li>
                    </ul>
                </div>

                <div class="block menu-ft policy" id="info-shop">
                    <h3 class="title">Chính sách mua hàng</h3>
                    <ul class="list-item"style="list-style-type: none">
                        <li>
                            <a href="" title="">Quy định - chính sách</a>
                        </li>
                        <li>
                            <a href="" title="">Chính sách bảo hành - đổi trả</a>
                        </li>
                        <li>
                            <a href="" title="">Chính sách hội viện</a>
                        </li>
                        <li>
                            <a href="" title="">Giao hàng - lắp đặt</a>
                        </li>
                    </ul>
                </div>
                <div class="block" id="newfeed">
                    <h3 class="title">Bảng tin</h3>
                    <p class="desc">Đăng ký với chung tôi để nhận được thông tin ưu đãi sớm nhất</p>
                    <div id="form-reg">
                        <form method="POST" action="">
                            <input type="email" name="email" id="email" placeholder="Nhập email tại đây">
                            <button type="submit" id="sm-reg">Đăng ký</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="foot-bot">
            <div class="wp-inner">
                <p id="copyright">© Bản quyền thuộc về Nhatstore</p>
            </div>
        </div>
    </div>
    {{-- <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.html"><img src="{{ asset('img/logonhat.png') }}" alt=""></a>
                        </div>
                        <ul>
                            <li>Address: 60-49 Road 11378 New York</li>
                            <li>Phone: +65 11.188.888</li>
                            <li>Email: hiamnhatdz203@gmail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Useful Links</h6>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">About Our Shop</a></li>
                            <li><a href="#">Secure Shopping</a></li>
                            <li><a href="#">Delivery infomation</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Our Sitemap</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Who We Are</a></li>
                            <li><a href="#">Our Services</a></li>
                            <li><a href="#">Projects</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Innovation</a></li>
                            <li><a href="#">Testimonials</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Join Our Newsletter Now</h6>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#">
                            <input type="text" placeholder="Enter your mail">
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="https://www.facebook.com/lenhat.lhn"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text">
                            <p>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;
                                <script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved | This template is made with <i
                                    class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com"
                                    target="_blank">Colorlib</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                        <div class="footer__copyright__payment"><img src="{{ asset('img/payment-item.png') }}"
                                alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer> --}}
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    {{-- <script src="{{ asset('js/app.js') }} "></script> --}}
    @yield('script')
    <script>
        // $(document).ready(function() {
        //     $("#cat_laptop").on("click", "li", function() {
        //         var cat = $(this).html();
        //         alert(cat);
        //         var data = {
        //             cat: cat
        //         };
        //         $.ajax({
        //             url: "{{ route('product.show') }}",
        //             // alert($(this).html());
        //             method: "GET",
        //             data: data,
        //             dataType: "json",
        //             // success: function(data) {
        //             //    alert(data);
        //             // console.log(data);
        //             success: function(data) {
        //                 // Xử lý dữ liệu nhận về từ server
        //                 var products =
        //                     data; // Giả sử dữ liệu $products được trả về dưới dạng JSON
        //                 console.log(products.length)
        //                 // Tạo biến để lưu nội dung mới
        //                 var newContent = "";
        //                 // var url =" {{ route('home') }}";
        //                 var ASSET_URL = '{{ env('APP_URL') }}';
        //                 var DETAIL_URL = '{{ env('APP_URL') }}./product/detail/';
        //                 //    console.log(DETAIL_URL)
        //                 // console.log(products.name);
        //                 // Lặp qua danh sách $products và tạo nội dung mới
        //                 for (var i = 0; i < products.length; i++) {
        //                     newContent +=
        //                         '<div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">' +
        //                         '<div class="featured__item">' +
        //                         '<div class="featured__item__pic set-bg"' +
        //                         'style="background-image: url(\'' + ASSET_URL +
        //                         products[i].img +
        //                         '\')"' +
        //                         'data-setbg="' +
        //                         ASSET_URL +
        //                         products[i].img +
        //                         '">' +
        //                         '<ul class="featured__item__pic__hover">' +

        //                         '<li><a href="' +
        //                         DETAIL_URL + products[i].id +
        //                         '"><i class="fa fa-shopping-cart"></i></a></li>' +
        //                         "</ul>" +
        //                         "</div>" +
        //                         '<div class="featured__item__text">' +
        //                         '<h6><a href="#">' +
        //                         products[i].name +
        //                         "</a></h6>" +
        //                         "<h5>" +
        //                         products[i].price +
        //                         " đ</h5>" +
        //                         "</div>" +
        //                         "</div>" +
        //                         "</div>";

        //                 }
        //                 // console.log(newContent)

        //                 // // Đưa nội dung mới vào container
        //                 $("#product_laptop").html(newContent);
        //                 // // }
        //             },
        //             error: function(xhr, status, error) {
        //                 // console.error(xhr.responseText);
        //             },
        //         });
        //     });
        // });
        $(document).ready(function() {
            $(".cat_pro").on("click", "li", function() {
                var cat = $(this).html();
                var dataCatValue = $(this).data('cat');
                var class_cat = "."+dataCatValue;
                // alert(class_cat)
                // alert(dataCatValue)
                // alert(cat);
                var data = {
                    cat: cat,
                    dataCatValue:dataCatValue
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
                        var products =data; // Giả sử dữ liệu $products được trả về dưới dạng JSON
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
                                products[i].price +
                                " đ</h5>" +
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
