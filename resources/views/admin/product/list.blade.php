@extends('layouts.admin')
@section('content')
    <div id="content" class="container-fluid">
        <div class="card">
            @if ('status')
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
                <h5 class="m-0 ">Danh sách sản phẩm</h5>
                <div class="form-search form-inline">
                    <form action="#">
                        <input type="text" name="keyword" value="{{ request()->input('keyword') }}"
                            class="form-control form-search" placeholder="Tìm kiếm tên sản phẩm">
                        <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="analytic">
                    <a href="{{ request()->fullUrlWithQuery(['status' => 'active']) }}" class="text-primary">Kích hoạt<span
                            class="text-muted">({{ $count[0] }})</span></a>
                    <a href="{{ request()->fullUrlWithQuery(['status' => 'trash']) }}" class="text-primary">Vô hiệu hóa<span
                            class="text-muted">({{ $count[1] }})</span></a>

                </div>
                <form action="{{ url('admin/product/action') }}">

                    <div class="form-action form-inline py-3">
                        <select class="form-control mr-1" name="act" id="">
                            <option>Chọn</option>
                            @foreach ($list_act as $k => $act)
                                <option value="{{ $k }}"> {{ $act }}</option>
                            @endforeach
                        </select>
                        <input type="submit" name="btn-search" value="Áp dụng" class="btn btn-primary">
                    </div>
                    <table class="table table-striped table-checkall">
                        <thead>
                            <tr>
                                <th scope="col">
                                    <input name="checkall" type="checkbox">
                                </th>
                                <th scope="col">#</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Màu sắc</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Danh mục</th>
                                <th scope="col">Ngày tạo</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($products->total() == 0)
                                <td colspan="9">
                                    <p><i style="color: red">*Không có bản ghi nào</i></p>
                                </td>
                            @else
                                @php
                                    $stt = 0;
                                @endphp
                                @foreach ($products as $product)
                                    @php
                                        $stt++;
                                    @endphp
                                    <tr class="">

                                        <td>
                                            <input type="checkbox" name="list_check[]" value="{{ $product->id }}">
                                        </td>
                                        <td>{{ $stt }}</td>
                                        <td><a href="#">{{ $product->name }}</a></td>
                                        <td>
                                            {{-- màu sắc --}}
                                            @php
                                                
                                                $k = json_decode($product->color);
                                                foreach ($k as $key => $value) {
                                                    # code...
                                                    if ($key == 0) {
                                                        echo $value;
                                                    } else {
                                                        # code...
                                                        echo ', ' . $value;
                                                    }
                                                    // echo $key;
                                                }
                                            @endphp

                                            {{-- hình ảnh --}}
                                            {{-- @php
                                        $k = json_decode($product->thumbnail);
                                        foreach ($k as $key => $value) {
                                            # code...
                                            if ($key == 0) {
                                                @endphp
                                                <img src="{{url($value)}}" alt="">
                                                
                                                @php
                                            }
                                             else {
                                                # code...
                                                echo ', ' . $value;
                                            }
                                            // echo $key;
                                        }
                                        
                                     @endphp --}}
                                        </td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->productCat->cat_item }}</td>
                                        <td>{{ $product->created_at }}</td>
                                        @if ($product->total>0)
                                        <td><span class="badge badge-success">{{"Còn hàng"}}</span>  </td>
                                        @else
                                        <td><span class="badge badge-warning">{{ "Hết hàng" }}</span></td>
                                        @endif
                                      
                                        <td>
                                            <a href="{{ route('admin.edit_product', $product->id) }}" class="btn btn-success btn-sm rounded-0 text-white"
                                                type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                    class="fa fa-edit"></i></a>
                                            <a href="{{ route('admin.delete_product', $product->id) }}"
                                                onclick="return confirm('Bạn có chắc chắn xóa sản phẩm này')"
                                                class="btn btn-danger btn-sm rounded-0 text-white" type="button"
                                                data-toggle="tooltip" data-placement="top" title="Delete"><i
                                                    class="fa fa-trash"></i></a>
                                        </td>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </form>
                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection
