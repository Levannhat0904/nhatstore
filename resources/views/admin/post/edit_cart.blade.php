
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
                        Cập nhật danh mục
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.update_cat', $cat_edit->id)}} " method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Tên danh mục</label>
                                <input class="form-control" value="{{$cat_edit->catagory_item}}" type="text" name="item" id="name">
                                @error('item')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="parent">Danh mục cha</label>
                                <select class="form-control" name="parent" id="parent">
                                    
                                    {{-- <option>Chính sách</option> --}}
                                    @foreach ($cats as $cat)
                                        <option>{{ $cat->catagorys }}</option>
                                    @endforeach
                                </select>
                                @error('parent')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <button type="submit" name="btn_add" value="btn_add" class="btn btn-primary">Cập nhật</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card">
                    <div class="card-header font-weight-bold">
                        Danh mục
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Tên danh mục</th>
                                    <th scope="col">Tên danh cha</th>
                                    {{-- <th scope="col">Slug</th> --}}
                                    <th scope="col">Tác vụ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $t = 0;
                                @endphp
                                @foreach ($cat_items as $cat_item)
                                    @php
                                        $t++;
                                    @endphp
                                    <tr>
                                        <th scope="row">{{ $t }}</th>
                                        <td>{{ $cat_item->catagory_item }}</td>
                                        <td>{{ $cat_item->catagorys }}</td>
                                        {{-- <td>Otto</td> --}}
                                        <td>
                                            <a href="{{ route('admin.edit_cat', $cat_item->id) }}"
                                                class="btn btn-success btn-sm rounded-0 text-white" type="button"
                                                data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                    class="fa fa-edit"></i></a>
                                            {{-- @if (Auth::id() != $user->id) --}}
                                            {{-- KIỂM TRA ĐỂ XUẤT HIỆN PHẦN XÓA BẢN GHI(USER) --}}
                                            <a href="{{ route('admin.delete_cat', $cat_item->id)  }}"
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
            </div>
        </div>

    </div>
@endsection
