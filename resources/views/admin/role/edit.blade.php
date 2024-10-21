@extends('layouts.admin')
@section('content')
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
                <h5 class="m-0 ">Cập nhật vai trò</h5>
                <div class="form-search form-inline">
                    <form action="#">
                        <input type="" class="form-control form-search" placeholder="Tìm kiếm">
                        <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">
                    </form>
                </div>
            </div>
            <div class="card-body">
                {{-- <form method="POST" action="{{ route('role.store') }}" enctype="multipart/form-data"> --}}
                {!! Form::open(['route' => ['role.update', $role->id]]) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Tên vai trò') !!}
                    {{-- <label class="text-strong" for="name">Tên vai trò</label> --}}
                    {!! Form::text('name', $role->name, ['class' => 'form-control', 'id' => 'name']) !!}
                    {{-- <input class="form-control" type="text" name="name" id="name"> --}}
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('description', 'Mô tả') !!}
                    {{-- <label class="text-strong" for="name">Tên vai trò</label> --}}
                    {!! Form::text('description', $role->description, ['class' => 'form-control', 'id' => 'description']) !!}
                    {{-- <input class="form-control" type="text" name="name" id="name"> --}}
                    @error('description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <strong>Vai trò này có quyền gì?</strong>
                <small class="form-text text-muted pb-2">Check vào module hoặc các hành động bên dưới để chọn
                    quyền.</small>
                <!-- List Permission  -->
                @foreach ($permissions as $moduleName => $modulePermission)
                    <div class="card my-4 border">
                        <div class="card-header">
                            {!! Form::checkbox(null, null, null, ['class' => 'check-all', 'id' => $moduleName]) !!}
                            {!! Form::label($moduleName, 'Module ' . $moduleName) !!}
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach ($modulePermission as $v)
                                    <div class="col-md-3">
                                        
                                        {!! Form::checkbox('permission_id[]', $v->id, in_array($v->id, $role->permission->pluck('id')->toArray()), [
                                            'id' => $v->slug,
                                            'class' => 'permission',
                                        ]) !!}
                                        {{-- kiểm tra xem id của quyền đang dc show lên có trùng với
                                                các quyền trong db k để tích chọn
                                                ===pluck tức là chỉ lấy id
                                                ===toArray là chuyển các id thành 1 mảng --}}
                                        {!! Form::label($v->slug, $v->name) !!}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
                <input type="submit" name="btn-add" class="btn btn-primary" value="Thêm mới">
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('.check-all').click(function() {
            $(this).closest('.card').find('.permission').prop('checked', this.checked)
        })
    </script>
@endsection
