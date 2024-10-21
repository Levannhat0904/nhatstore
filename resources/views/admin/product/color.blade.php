@extends('layouts.admin')
@section('content')
    <div id="content" class="container-fluid">
        <div class="row">
            <div class="col-4">
                <div class="card">
                    @if ('status')
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-header font-weight-bold">
                        Thêm màu sắc
                    </div>
                    <div class="card-body">
                        <form action="{{ url('admin/product/color/add') }} " method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="color">Màu sắc</label>
                                <input class="form-control" type="color" name="color" id="color">
                                @error('color')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="color_name">Tên màu sắc</label>
                                <input class="form-control" type="text" name="color_name" id="color_name">
                                @error('color')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            
                            <button type="submit" name="btn_add" value="btn_add" class="btn btn-primary">Thêm mới</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card">
                    <div class="card-header font-weight-bold">
                        Danh mục màu sắc
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Tên Màu</th>
                                    <th scope="col">Mã màu</th>

                                    {{-- <th scope="col">Slug</th> --}}
                                    <th scope="col">Tác vụ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $t = 0;
                                @endphp
                                @foreach ($colorProducts as $colorProduct)
                                    @php
                                        $t++;
                                    @endphp
                                    <tr>
                                        <th scope="row">{{ $t }}</th>
                                        <td>{{ $colorProduct->color_name}}</td>
                                        <td>{{ $colorProduct->color }}</td>
                                        {{-- <td>Otto</td> --}}
                                        <td>
                                            <a href="{{ route('admin.edit_color', $colorProduct->id) }}"
                                                class="btn btn-success btn-sm rounded-0 text-white" type="button"
                                                data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                    class="fa fa-edit"></i></a>
                                            {{-- @if (Auth::id() != $user->id) --}}
                                            {{-- KIỂM TRA ĐỂ XUẤT HIỆN PHẦN XÓA BẢN GHI(USER) --}}
                                            <a href="{{ route('admin.delete_color', $colorProduct->id)  }}"
                                                onclick="return confirm('bạn có chăc chắn xóa bản ghi này')"
                                                class="btn btn-danger btn-sm rounded-0 text-white" type="button"
                                                data-toggle="tooltip" data-placement="top" title="Delete"><i
                                                    class="fa fa-trash"></i></a>
                                            {{-- @endif --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            {{-- body --}}
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
