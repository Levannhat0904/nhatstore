@extends('layouts.admin')
@section('content')
    <div id="content" class="container-fluid">
        <div class="row">
            <div class="col-4">
                <div class="card">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-header font-weight-bold">
                        Chỉnh sửa quyền
                    </div>
                    <div class="card-body">
                        {!! Form::open(['route' =>['permission.update', $permission->id],'method'=>'post']) !!}
                        <div class="form-group">
                            {!! Form::label('name', 'Tên quyền') !!}
                            {!! Form::text('name', $permission->name, ['class' => 'form-control', 'id' => 'name']) !!}
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'Slug') !!}
                            <small class="form-text text-muted pb-2">Ví dụ: posts.add</small>
                            {!! Form::text('slug',$permission->slug, ['class' => 'form-control', 'id' => 'slug']) !!}
                            @error('slug')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            {!! Form::label('description', 'Mô tả') !!}
                            {!! Form::text('description',$permission->description, [
                                'class' => 'form-control',
                                'id' => 'description',
                                'row' => 3,
                            ]) !!}
                        </div>
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card">
                    <div class="card-header font-weight-bold">
                        Danh sách quyền
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên quyền</th>
                                    <th scope="col">Slug</th>
                                    <th scope="col">Tác vụ</th>
                                    <!-- <th scope="col">Mô tả</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($permissions as $moduleName => $modulePermission)
                                    <tr>
                                        <td></td>
                                        <td colspan="2"><strong>Module {{ ucfirst($moduleName) }}</strong></td>
                                        {{-- ucfirst viết hoa kí tự đầu --}}
                                        <td></td>
                                        <!-- <td></td> -->
                                    </tr>
                                    @foreach ($modulePermission as $v)
                                        <tr>
                                            <td scope="row">{{ $i++ }}</td>
                                            <td>|---{{ $v->name }}</td>
                                            <td>{{ $v->slug }}</td>
                                            <td>
                                                <a href="{{ route('permission.edit', $v->id) }}"
                                                    class="btn btn-success btn-sm rounded-0 text-white" type="button"
                                                    data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                        class="fa fa-edit"></i></a>
                                                {{-- @if (Auth::id() != $user->id) --}}
                                                {{-- KIỂM TRA ĐỂ XUẤT HIỆN PHẦN XÓA BẢN GHI(USER) --}}
                                                <a href="{{ route('permission.delete', $v->id) }}"
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
