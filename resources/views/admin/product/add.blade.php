@extends('layouts.admin')
@section('content')
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold">
                Thêm sản phẩm
            </div>
            <div class="card-body">
                <form action="{{ url('admin/product/store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name">Tên sản phẩm</label>
                                <input class="form-control" type="text" name="name" id="name">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Giá</label>
                                <input class="form-control" type="text" name="price" id="name">
                                @error('price')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="total_product">Số lượng</label>
                                <input class="form-control" type="number" name="total_product" id="total_product">
                                @error('total_product')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="file_upload">Ảnh chi tiết</label>
                                <div></div>
                                <input type="file" name="thumbnail[]" multiple="multiple" id="file_upload">
                            </div>
                            @error('thumbnail')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror

                            <div class="form-group">
                                <label for="img">Ảnh đại diện</label>
                                <div></div>
                                <input type="file" name="img" old('img') multiple="multiple" id="img">
                            </div>
                            @error('img')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <div>

                                    <label for="intro">Màu sắc</label>
                                </div>
                                @foreach ($colorProducts as $color)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="color[]"
                                            value="{{ $color->color_name }}">
                                        <label class="form-check-label"
                                            for="inlineCheckbox1">{{ $color->color_name }}</label>
                                    </div>
                                @endforeach
                                {{-- <textarea name="" class="form-control" id="intro" cols="30" rows="5"></textarea> --}}
                            </div>
                            @error('color')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="intro">Chi tiết sản phẩm</label>
                        <textarea name="content" class="form-control" id="intro" cols="30" rows="5"></textarea>
                        @error('content')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="">Danh mục</label>
                        <select class="form-control" name="category" id="category">
                            @foreach ($cat_product as $key => $cat)
                                <optgroup label={{ $key }}>
                                    @foreach ($cat as $v)
                                        <option value="{{ $v->id }}">{{ $v->cat_item }}</option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                        @error('category')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    {{-- <div class="form-group">
                        <label for="">Trạng thái</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
                                value="option1" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Chờ duyệt
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2"
                                value="option2">
                            <label class="form-check-label" for="exampleRadios2">
                                Công khai
                            </label>
                        </div>
                    </div> --}}



                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                </form>
            </div>
        </div>
    </div>
@endsection
