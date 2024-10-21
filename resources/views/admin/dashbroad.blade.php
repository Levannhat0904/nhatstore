@extends('layouts.admin')
@section('content')
    <div class="container-fluid py-5">
        <div class="row">
            <div class="col">
                <div class="card text-white bg-primary mb-3" style="max-width: 18rem; min-height: 12rem">
                    <div class="card-header">ĐƠN HÀNG THÀNH CÔNG</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $order_success->sum('total') }}</h5>
                        <p class="card-text">Đơn hàng giao dịch thành công</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-white bg-danger mb-3" style="max-width: 18rem; min-height: 12rem">
                    <div class="card-header">ĐANG XỬ LÝ</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $order_processing->sum('total') }}</h5>
                        <p class="card-text">Số lượng đơn hàng đang xử lý</p>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card text-white bg-success mb-3" style="max-width: 18rem; min-height: 12rem">
                    <div class="card-header">DOANH SỐ</div>
                    <div class="card-body">
                        <h5 class="card-title">
                            {{ number_format($order_success->sum('total_order'), 0, ',', '.') }}{{ 'vnđ' }}</h5>
                        <p class="card-text">Doanh số hệ thống</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-white bg-dark mb-3" style="max-width: 18rem; min-height: 12rem">
                    <div class="card-header">ĐƠN HÀNG HỦY</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $order_cance->sum('total') }}</h5>
                        <p class="card-text">Số đơn bị hủy trong hệ thống</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end analytic  -->
        <div class="card">
            <div class="card-header font-weight-bold">
                ĐƠN HÀNG MỚI
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Mã đơn hàng</th>
                            <th scope="col">Khách hàng</th>
                            {{-- <th scope="col">Sản phẩm</th> --}}
                            <th scope="col">Số lượng</th>
                            <th scope="col">Giá trị</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Thời gian</th>
                            <th scope="col">Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $t = 0;
                        @endphp
                        @foreach ($orders as $order)
                            <tr>
                                @php
                                    $t++;
                                @endphp
                                <th scope="row">{{ $t }}</th>
                                <td><a href="{{ route('order_detail',$order->id) }}">{{ $order->orderCode }}</a></td>
                                <td>
                                    {{ $order->username }} <br>
                                    {{ $order->phone_number }}
                                </td>
                                {{-- <td><a href="#">{{}}</a></td> --}}
                                <td>{{ $order->total }}</td>
                                <td>{{ number_format($order->total_order, 0, ',', '.') }}{{ 'vnđ' }}</td>
                                @if ($order->status == 'Thành công')
                                    <td><span class="badge badge-success">{{ $order->status }}</span></td>
                                @else
                                    <td><span class="badge badge-warning">{{ $order->status }}</span></td>
                                @endif
                                <td>{{ $order->created_at }}</td>
                                <td>
                                    <a href="{{ route('order_detail',$order->id) }}" class="btn btn-success btn-sm rounded-0 text-white" type="button"
                                        data-toggle="tooltip" data-placement="top" title="Edit"><i
                                            class="fa fa-edit"></i></a>
                                    {{-- <a href="#" class="btn btn-danger btn-sm rounded-0 text-white" type="button"
                                        data-toggle="tooltip" data-placement="top" title="Delete"><i
                                            class="fa fa-trash"></i></a> --}}
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                {{ $orders->links() }}
            </div>
        </div>

    </div>
@endsection
