@extends('layouts.client')
@section('style')
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
@endsection
@section('content')
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
    </div>
    <input type="submit" class="btn bt btn-primary " name="btn_order" value="Mua ngay" data-toggle="modal"
        data-target="#exampleModalCenter">
    </form>
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
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
        // $('.hero__categories__all').on('click', function() {
        //     $('.hero__categories ul').slideToggle(400);
        // });
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
 
 @endsection
 @section('script')
    <script>
        $(".humberger__open").on('click', function () {
        $(".humberger__menu__wrapper").addClass("show__humberger__menu__wrapper");
        $(".humberger__menu__overlay").addClass("active");
        $("body").addClass("over_hid");
    });

    $(".humberger__menu__overlay").on('click', function () {
        $(".humberger__menu__wrapper").removeClass("show__humberger__menu__wrapper");
        $(".humberger__menu__overlay").removeClass("active");
        $("body").removeClass("over_hid");
    });
    </script>
@endsection
