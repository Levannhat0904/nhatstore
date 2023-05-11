@extends('layouts.client')
@section('content')
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Sản Phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng tiền</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <form action="buy_all_cart" method="get">

                                    @foreach (Cart::content() as $v)
                                        <tr>
                                            <td class="shoping__cart__item">
                                                <img style="width: 80px; height: 80px;" src="{{ asset($v->options->img) }}"
                                                    alt="">
                                                <h5 class="">{{ $v->name }} màu{{ $v->options->color }}</h5>
                                            </td>
                                            <td class="shoping__cart__price">
                                                {{ number_format($v->price, 0, ',', '.') }}{{ 'vnđ' }}
                                            </td>
                                            <td class="shoping__cart__quantity">
                                                <div class="quantity">
                                                    <div class="pro-qty">
                                                        <input type="text" name="qty_cart" data-id="{{ $v->rowId }}"
                                                            min="1" id="qty-item-{{ $v->rowId }}"
                                                            value=" {{ $v->qty }}">
                                                    </div>
                                                </div>
                                            </td>
                                            {{-- <td><input type="number" name="qty_cart" value="{{$v->qty}}" class="qty_cart" id=""></td> --}}
                                            <td class="shoping__cart__total" id="total-item-{{ $v->rowId }}">
                                                {{ number_format($v->total, 0, ',', '.') }}{{ 'vnđ' }}
                                            </td>
                                            <td class="shoping__cart__item__close">
                                                <span data-rowid="{{ $v->rowId }}" class="icon_close "></span>
                                            </td>
                                        </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">

                {{-- <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                            </form>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6" >
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Subtotal <span>$454.98</span></li>
                            <li>Total <span>$454.98</span></li>
                        </ul>
                        <a href="#" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div> --}}
                <div class="col-lg-12">
                    <div class="shoping__cart__btns" style="margin-top: 30px">
                        <a href="{{ route('home') }}" class="primary-btn cart-btn">Tiếp tục mua</a>
                        <input type="submit" value="Thanh toán ngay" class="primary-btn cart-btn cart-btn-right"
                            style="border: none; margin-left: 20px">
                        <a href="{{ route('product.shoppingcart') }}" class="primary-btn cart-btn cart-btn-right"><span
                                class="icon_loading"></span>
                            Cập nhật giỏ hàng
                        </a>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </section>
@endsection
