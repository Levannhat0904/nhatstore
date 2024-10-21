@extends('layouts.admin')
@section('content')
    <section class="h-100 gradient-custom">
        <div class="container w-100 py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-10 col-xl-8">
                    <div class="card" style="border-radius: 10px;">
                        {{-- <div class="card-header px-4 py-5">
              <h5 class="text-muted mb-0">Thanks for your Order, <span style="color: #a8729a;">Anna</span>!</h5>
            </div> --}}
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <p class="lead fw-normal mb-0" style="color: #a8729a;">Chi tiết đơn hàng</p>
                                <p class="small text-muted mb-0">Mã đơn hàng : {{ $order->orderCode }}</p>
                            </div>



                            <div class="card shadow-0 border mb-4">
                                @foreach ($order->order_detail as $v)
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <img src="{{ asset($v->product->img) }}" class="img-fluid" alt="Phone">
                                            </div>
                                            <div
                                                class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0">{{ $v->product->name }}</p>
                                            </div>
                                            <div
                                                class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 small">Màu sắc {{ $v->color }}</p>
                                            </div>
                                            <div
                                                class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 small">Số lượng: {{ $v->qty_buy }}</p>
                                            </div>
                                            <div
                                                class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 small">Giá: {{ $v->price }}</p>
                                            </div>
                                            <div
                                                class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 small">Tổng tiền: {{ $v->qty_buy * $v->price }}
                                                </p>
                                            </div>
                                        </div>
                                        <hr class="mb-4" style="background-color: #e0e0e0; opacity: 1;">
                                @endforeach
                                <div class="row d-flex align-items-center">
                                    <div class="col-md-2">
                                        <p class="text-muted mb-0 ">Trạng thái đơn hàng</p>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="d-flex justify-content-around mb-1">
                                            <select name="status">
                                                <option @php if($order->status=="Đang vận chuyển"){echo "selected";} @endphp
                                                    value="Đang vận chuyển">Đang vận chuyển</option>
                                                <option
                                                    @php if ($order->status=="Đang chờ gửi hàng"){echo "selected";} @endphp
                                                    value="Đang chờ gửi hàng">Đang chờ gửi hàng</option>
                                                <option @php if ($order->status=="Đã hủy"){echo "selected";} @endphp
                                                    value="Đã hủy">Đã hủy</option>
                                                <option @php if ($order->status=="Thành công"){echo "selected";} @endphp
                                                    value="Thành công">Thành công</option>
                                            </select>
                                            <button data-id="{{ $order->id }} "id="status">Cập nhật</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                            
                 

                        <div class="d-flex justify-content-between pt-2">
                            <p class="fw-bold mb-0">Họ tên:{{ $order->username }} </p>
                            <p class="text-muted mb-0"><span class="fw-bold me-4">Tổng số lượng: {{ $order->total }}</span>
                            </p>
                        </div>
                        <div class="d-flex justify-content-between pt-2">
                            <p class="fw-bold mb-0">Email: {{ $order->email }}</p>
                            <p class="text-muted mb-0"><span class="fw-bold me-4">Tổng tiền:
                                    {{ $order->total_order}}
                        </div>

                        <div class="d-flex justify-content-between pt-2">
                            <p class="text-muted mb-0">Số điện thoại: {{ $order->phone_number }}</p>
                            <p class="text-muted mb-0"><span class="fw-bold me-4">Phí vận chuyển</span> 30.000vnd</p>
                        </div>

                        <div class="d-flex justify-content-between">
                            <p class="text-muted mb-0">Ngày đặt hàng: {{ $order->created_at }}</p>
                            <p class="text-muted mb-0"><span class="fw-bold me-4">Thành tiền{{ $order->total_order }}
                        </div>

                        <div class="d-flex justify-content-between mb-5">
                            <p class="text-muted mb-0">Phương thức thanh toán : thanh toán khi nhận hàng</p>
                            {{-- <p class="text-muted mb-0"><span class="fw-bold me-4">Delivery Charges</span> Free</p> --}}
                        </div>
                    </div>
                    {{-- <div class="card-footer border-0 px-4 py-5"
              style="background-color: #a8729a; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
              <h5 class="d-flex align-items-center justify-content-end text-white text-uppercase mb-0">Total
                paid: <span class="h2 mb-0 ms-2">$1040</span></h5>
            </div> --}}
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
