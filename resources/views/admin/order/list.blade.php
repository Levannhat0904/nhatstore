@extends('layouts.admin')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
            <h5 class="m-0 ">Danh sách đơn hàng</h5>
            <div class="form-search form-inline">
                <form action="#">
                    <input type="text" class="form-control form-search" value="{{request()->input('key')}}" name="key" placeholder="Tìm kiếm">
                    <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="analytic">
                <div class="analytic">
                    <a href="{{ request()->fullUrlWithQuery(['status' => 'shipping']) }}" class="text-primary">Đang vận chuyển<span
                            class="text-muted">({{ $count[0] }})</span></a>
                    <a href="{{ request()->fullUrlWithQuery(['status' => 'waiting']) }}" class="text-primary">Đang chờ gửi hàng<span
                            class="text-muted">({{ $count[1] }})</span></a>
                    <a href="{{ request()->fullUrlWithQuery(['status' => 'cancel']) }}" class="text-primary">Đã hủy<span
                            class="text-muted">({{ $count[2] }})</span></a>
                    <a href="{{ request()->fullUrlWithQuery(['status' => 'success']) }}" class="text-primary">Thành công<span
                            class="text-muted">({{ $count[3] }})</span></a>
                   
                </div>
            </div>
            {{-- <div class="form-action form-inline py-3">
                <select class="form-control mr-1" id="">
                    <option>Chọn</option>
                    <option>Tác vụ 1</option>
                    <option>Tác vụ 2</option>
                </select>
                <input type="submit" name="btn-search" value="Áp dụng" class="btn btn-primary">
            </div> --}}
            <div style=" margin: 20px"></div>
            <h5 style="color: red"><i>*Bấm vào mã đơn hàng để xem chi tiết đơn hàng</i></h5>
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
                        {{-- <th scope="col">Tác vụ</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @if ($orders->total()>0)
                        
                    
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
                            {{-- <td>
                                <a href="#" class="btn btn-success btn-sm rounded-0 text-white" type="button"
                                    data-toggle="tooltip" data-placement="top" title="Edit"><i
                                        class="fa fa-edit"></i></a>
                                <a href="#" class="btn btn-danger btn-sm rounded-0 text-white" type="button"
                                    data-toggle="tooltip" data-placement="top" title="Delete"><i
                                        class="fa fa-trash"></i></a>
                            </td> --}}
                        </tr>
                    @endforeach
                    @else
                        <tr>
                            <td style="color: red" colspan="8"><i>*Không có bản ghi nào</i></td>
                        </tr>
                    @endif
                </tbody>
            </table>
            {{ $orders->links() }}
            
        </div>
    </div>
</div>
@endsection