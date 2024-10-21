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
    <style>
        .bt {
            width: 50%;
            padding: 0.6rem;
            font-size: 1.6rem;
            color: black;
            border-radius: 11px;
            margin: 0px 25% 30%;
            margin-bottom: 30px;
        }



        /* .ch{
        margin: 50px;
      } */
        .table>tbody>tr>td,
        .table>tbody>tr>th,
        .table>tfoot>tr>td,
        .table>tfoot>tr>th,
        .table>thead>tr>td,
        .table>thead>tr>th {
            padding: 8px;
            line-height: 1.42857143;
            vertical-align: middle;
            border-top: 1px solid #f14b4b;
        }

        .im {
            height: 80px;
            width: 80px;
        }

        .checkout {
            margin-right: 50px;
            margin-left: 50px;
            /* .checkout { */
            padding-top: 80px;
            padding-bottom: 10px;
            /* } */
        }

        .invalid-feedback {
            font-size: 1.5rem;
        }

        .btn-block {
            height: 50px;
            display: block;
            width: 100%;
            margin-bottom: 100px;
            font-size: 1.6rem;
        }

        .address {
            /* margin-right: 3%;   */
            width: 100%;
            font-size: 1.6rem;
        }
    </style>
</head>

<body>
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="{{ route('home') }}"><img src="{{ asset('img/logo.png') }}" alt=""></a>
            {{-- <a href="#"><img src="{{ asset('img/logo.png') }}" alt=""></a> --}}
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="{{ route('product.shoppingcart') }}"><i class="fa fa-shopping-bag"></i> <span>3</span></a>
                </li>
            </ul>
            <div class="header__cart__price">item: <span>$150.00</span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="{{ asset('img/language.png') }} " alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Spanis</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div>
            <div class="header__top__right__auth">
                <a href="#"><i class="fa fa-user"></i> Login</a>
            </div>
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
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i>hiamnhatdz203@gmail.com</li>
                <li>Free Shipping for all Order of $99</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row ch">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> hiamnhatdz203@gmail.com</li>
                                <li>Free Shipping for all Order of $99</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <div class="header__top__right__language">
                                <img src="{{ asset('img/language.png') }} " alt="">
                                <div>English</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Spanis</a></li>
                                    <li><a href="#">English</a></li>
                                </ul>
                            </div>
                            <div class="header__top__right__auth">
                                <a href="#"><i class="fa fa-user"></i> Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="{{ route('home') }}"><img src="{{ asset('img/logo.png') }} " alt=""></a>
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
                            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                            <li><a href="{{ route('product.shoppingcart') }}"><i class="fa fa-shopping-bag"></i>
                                    <span>3</span></a></li>
                        </ul>
                        <div class="header__cart__price">item: <span>$150.00</span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
                        <ul>
                            <li><a href="#">Fresh Meat</a></li>
                            <li><a href="#">Vegetables</a></li>
                            <li><a href="#">Fruit & Nut Gifts</a></li>
                            <li><a href="#">Fresh Berries</a></li>
                            <li><a href="#">Ocean Foods</a></li>
                            <li><a href="#">Butter & Eggs</a></li>
                            <li><a href="#">Fastfood</a></li>
                            <li><a href="#">Fresh Onion</a></li>
                            <li><a href="#">Papayaya & Crisps</a></li>
                            <li><a href="#">Oatmeal</a></li>
                            <li><a href="#">Fresh Bananas</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+65 11.188.888</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="row checkout">
        <div class="col-md-6 order-md-2 mb-3">
            @if (isset($carts))
                <form action="{{ route('product.order_all') }}" method="get">
                @else
                    <form action="{{ route('product.order') }}" method="get">
            @endif
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Your cart</span>
                <span class="badge badge-secondary badge-pill">3</span>
            </h4>
            <table class="table table-striped" style="font-size: 1.6rem">
                <thead>
                    <tr>
                        <th scope="col">Sản phẩm</th>
                        <th scope="col">Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($data))
                        <tr>
                            <td><img src="{{ asset($data['img']) }}" alt=""
                                    style="width: 80px; height=80px ;margin: 10px; display: inline-block;"
                                    srcset="">{{ $data['name'] . ' màu ' . $data['color'] . ' x' . $data['qty'] }}
                            </td>
                            <td>{{ $data['sub_total'] }}</td>
                        </tr>
                        <hr>
                </tbody>
            </table>
            <div>
                <div class="flex-container"
                    style="display: flex;
                    justify-content: space-between;
                    margin-top: 100px;
                    font-size: 1.6rem;">
                    <div><b> Tổng tiền</b></div>
                    {{-- <div>2</div> --}}
                    <div><b>{{ $data['sub_total'] }}</b></div>
                </div>
            </div>
        @else
            @foreach ($carts as $v)
                <tr>
                    <td><img src="{{ asset($v->options->img) }}" alt=""
                            style="width: 80px; height=80px ;margin: 10px; display: inline-block;;"
                            srcset="">{{ $v->name . ' màu ' . $v->options->color . ' x' . $v->qty }}</td>
                    <td>{{ number_format($v->total, 0, ',', '.') }}{{ 'vnđ' }}</td>
                </tr>
            @endforeach
            <hr>
            </tbody>
            </table>
            <div>
                <div class="flex-container"
                    style="display: flex;
                            justify-content: space-between;
                            margin-top: 100px;
                            font-size: 1.6rem;">
                    <div><b> Tổng tiền</b></div>
                    {{-- <div>2</div> --}}
                    <div><b>{{ number_format($v->subtotal, 0, ',', '.') }}{{ 'vnđ' }}</b></div>
                </div>
            </div>
            @endif


            <!-- Button trigger modal -->



            {{-- {{-- <form class="card p-2"> --}}
            <div class="input-group">
                <input type="text" class="form-control ch" placeholder="Promo code">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-secondary">Redeem</button>
                </div>
            </div>
            {{-- </form> --}}
        </div>

        <div class="col-md-5 order-md-1">
            <h4 class="mb-3">Billing address</h4>
            {{-- <form class="needs-validation" novalidate=""> --}}
            {{-- <div class="row">
            
          </div> --}}

            <div class="mb-3">
                <label for="username">Username</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">@</span>
                    </div>
                    <input type="text" class="form-control ch" name="Username" id="username"
                        placeholder="Username" required="">
                    <div class="invalid-feedback" style="width: 100%;">
                        Your username is required.
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="email">Email <span class="text-muted"></span></label>
                <input type="email" required="" name="email" class="form-control ch" id="email">
                <div class="invalid-feedback">
                    Please enter a valid email address for shipping updates.
                </div>
            </div>

            <div class="mb-3">
                <label for="phone_number">Số điện thoại</label>
                <input type="text" class="form-control ch" name="phone_number" id="phone_number"
                    placeholder="Số điện thoại" required="">
                <div class="invalid-feedback">
                    Please enter your shipping address.
                </div>
            </div>
            {{-- <div class="wrapper"> --}}
            <div class="mb-3">
                <label for="address">Địa chỉ</label>
                <select name="citi" class="form-select address form-select-sm mb-3" onfocus='this.size=5;'
                    onblur='this.size=1;' onchange='this.size=1; this.blur();' id="city"
                    aria-label=".form-select-sm">
                    <option value="" selected>Chọn tỉnh thành</option>
                </select>
            </div>
            {{-- </div> --}}
            <div class="mb-3">
                <select name="Districts" class="form-select address form-select-sm mb-3" onfocus='this.size=5;'
                    onblur='this.size=1;' onchange='this.size=1; this.blur();' id="district"
                    aria-label=".form-select-sm">
                    <option value="" selected>Chọn quận huyện</option>
                </select>
            </div>
            <div class="mb-3">
                <select name="wards" class="form-select address form-select-sm" onfocus='this.size=5;'
                    onblur='this.size=1;' onchange='this.size=1; this.blur();' id="ward"
                    aria-label=".form-select-sm">
                    <option value="" selected>Chọn phường xã</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="address">Địa chỉ cụ thể</label>
                {{-- <input type="text" class="form-control ch" id="addr" placeholder="Địa chỉ cụ thể"
                    required=""> --}}
                <textarea class="form-control ch" required="" id="addr" placeholder="Địa chỉ cụ thể" name="address"
                    id="" cols="50" rows="5"></textarea>
                <div class="invalid-feedback">
                    Please enter your shipping address.
                </div>
            </div>
        </div>


        <!-- Button trigger modal -->
        <input type="submit" class="btn bt btn-primary " name="btn_order" value="Mua ngay" data-toggle="modal"
            data-target="#exampleModalCenter">


        </form>
    </div>
    {{-- <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';

            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');

                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script> --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    {{-- <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.html"><img src="{{ asset('img/logo.png') }}" alt=""></a>
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
                            <a href="#"><i class="fa fa-facebook"></i></a>
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
    <script>
        $(document).ready(function() {
            $("#city").change(function() {
                var selectedValue = $("#city option:selected").text();;
                // console.log(selectedValue); // In giá trị được chọn ra console
                $("#addr").val(selectedValue);
            });
            $("#district").change(function() {
                var currentValue = $("#district option:selected").text();;
                var previousValue = $("#addr").val();
                var newValue = previousValue + ", " + currentValue;
                $("#addr").val(newValue);
                // console.log(selectedValue); // In giá trị được chọn ra console
            });
            $("#ward").change(function() {
                var currentValue = $("#ward option:selected").text();
                var previousValue = $("#addr").val();
                var newValue = previousValue + ", " + currentValue;
                $("#addr").val(newValue);
                // console.log(selectedValue); // In giá trị được chọn ra console
            });
        });
        //
        $('.hero__categories__all').on('click', function() {
            $('.hero__categories ul').slideToggle(400);
        });
        var citis = document.getElementById("city");
        var districts = document.getElementById("district");
        var wards = document.getElementById("ward");
        var Parameter = {
            url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
            method: "GET",
            responseType: "application/json",
        };
        var promise = axios(Parameter);
        promise.then(function(result) {
            renderCity(result.data);
        });

        function renderCity(data) {
            for (const x of data) {
                citis.options[citis.options.length] = new Option(x.Name, x.Id);
            }
            citis.onchange = function() {
                // console.log("sdsd");
                district.length = 1;
                ward.length = 1;
                onchange = this.size = 1;
                this.blur();
                if (this.value != "") {
                    const result = data.filter(n => n.Id === this.value);

                    for (const k of result[0].Districts) {
                        district.options[district.options.length] = new Option(k.Name, k.Id);
                    }
                }
            };
            district.onchange = function() {
                onchange = this.size = 1;
                this.blur();
                ward.length = 1;
                const dataCity = data.filter((n) => n.Id === citis.value);

                if (this.value != "") {
                    const dataWards = dataCity[0].Districts.filter(n => n.Id === this.value)[0].Wards;
                    for (const w of dataWards) {
                        wards.options[wards.options.length] = new Option(w.Name, w.Id);
                    }
                }
            };
        }
    </script>
    <script src="{{ asset('js/jquery-3.3.1.min.js') }} "></script>
    <script src="{{ asset('js/bootstrap.min.js') }} "></script>
    <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }} "></script>
    <script src="{{ asset('js/jquery.slicknav.js') }} "></script>
    <script src="{{ asset('js/mixitup.min.js') }} "></script>
    <script src="{{ asset('js/owl.carousel.min.js') }} "></script>
    {{-- <script src="{{ asset('js/main.js') }} "></script> --}}
    <script src="{{ asset('js/app.js') }} "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>

</body>

</html>
{{-- @endsection --}}
