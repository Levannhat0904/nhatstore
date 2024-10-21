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
                        Thêm danh Cha
                    </div>
                    <div class="card-body">
                        <form action="{{ url('admin/post/cat_parent/add') }} " method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Tên danh mục</label>
                                <input class="form-control" type="text" name="cat" id="name">
                                @error('cat')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <button type="submit" name="btn_add_parent" value="btn_add_parent" class="btn btn-primary">Thêm
                                mới</button>
                        </form>
                    </div>
                    <div class="card-header font-weight-bold">
                        Thêm danh mục
                    </div>
                    <div class="card-body">
                        <form action="{{ url('admin/post/cat/add') }} " method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Tên danh mục</label>
                                <input class="form-control" type="text" name="cat_item" id="name">
                                @error('cat_item')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="parent">Danh mục cha</label>
                                <select class="form-control" name="cat_parent" id="parent">

                                    <option value="" style="text-align: center;">-----------Chọn----------</option>
                                    @foreach ($cat_post as $key => $cat)
                                        <optgroup label={{ $key }}>
                                            @foreach ($cat as $v)
                                                <option value={{ $v->id }}>{{ $v->cat }}</option>
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                                @error('parent')
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
                        Danh mục con
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Tên danh mục</th>
                                    <th scope="col">Tên danh mục cha</th>
                                    {{-- <th scope="col">Slug</th> --}}
                                    <th scope="col">Tác vụ</th>
                                </tr>
                            </thead>
                            {{-- sdsl --}}
                            <tbody>
                                @php
                                    $t = 0;
                                @endphp
                                @foreach ($cat_post_item as $item)
                                    @php
                                        $t++;
                                    @endphp
                                    <tr>
                                        <th scope="row">{{ $t }}</th>
                                        <td>{{ $item->cat_item }}</td>
                                        <td>{{ $item->cat->cat }}</td>
                                        {{-- <td>Otto</td> --}}
                                        <td>
                                            <a href="{{ route('admin.edit_cat_item_post', $item->id) }}"
                                                class="btn btn-success btn-sm rounded-0 text-white" type="button"
                                                data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                    class="fa fa-edit"></i></a>
                                            {{-- @if (Auth::id() != $user->id) --}}
                                            {{-- KIỂM TRA ĐỂ XUẤT HIỆN PHẦN XÓA BẢN GHI(USER) --}}
                                            <a href="{{ route('admin.delete_cat_item', $item->id) }}"
                                                onclick="return confirm('bạn có chăc chắn xóa bản ghi này')"
                                                class="btn btn-danger btn-sm rounded-0 text-white" type="button"
                                                data-toggle="tooltip" data-placement="top" title="Delete"><i
                                                    class="fa fa-trash"></i></a>
                                            {{-- @endif --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header font-weight-bold">
                        Danh mục con
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Tên danh mục</th>
                                    <th scope="col">Tác vụ</th>
                                </tr>
                            </thead>
                            {{-- sdsl --}}
                            <tbody>
                                @php
                                    $t = 0;
                                @endphp
                                @foreach ($cat_post as $k => $item)
                                    @foreach ($item as $cat)
                                        @php
                                            $t++;
                                        @endphp
                                        <tr>
                                            <th scope="row">{{ $t }}</th>

                                            <td>{{ $cat->cat }}</td>
                                            {{-- <td>{{ $item->cat->cat }}</td> --}}
                                            {{-- <td>Otto</td> --}}
                                            <td>
                                                <a href="{{ route('admin.edit_cat',$cat->id) }}" class="btn btn-success btn-sm rounded-0 text-white"
                                                    type="button" data-toggle="tooltip" data-placement="top"
                                                    title="Edit"><i class="fa fa-edit"></i></a>
                                                {{-- @if (Auth::id() != $user->id) --}}
                                                {{-- KIỂM TRA ĐỂ XUẤT HIỆN PHẦN XÓA BẢN GHI(USER) --}}
                                                <a href="{{ route('admin.delete_cat',$cat->id) }}"
                                                    onclick="return confirm('bạn có chăc chắn xóa bản ghi này')"
                                                    class="btn btn-danger btn-sm rounded-0 text-white" type="button"
                                                    data-toggle="tooltip" data-placement="top" title="Delete"><i
                                                        class="fa fa-trash"></i></a>
                                                {{-- @endif --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach



                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
