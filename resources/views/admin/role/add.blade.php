@extends('layouts.admin')
@section('content')
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
                <h5 class="m-0 ">Thêm mới vai trò</h5>
                <div class="form-search form-inline">
                    <form action="#">
                        <input type="" class="form-control form-search" placeholder="Tìm kiếm">
                        <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">
                    </form>
                </div>
            </div>
            <div class="card-body">
                {{-- <form method="POST" action="{{ route('role.store') }}" enctype="multipart/form-data"> --}}
                    {!! Form::open(['route'=>'role.store']) !!}
                    <div class="form-group">
                        {!! Form::label('name', 'Tên vai trò') !!}
                        {{-- <label class="text-strong" for="name">Tên vai trò</label> --}}
                        {!! Form::text('name', old('name'), ['class'=>"form-control", 'id'=>'name']) !!}
                        {{-- <input class="form-control" type="text" name="name" id="name"> --}}
                        @error('name')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        {!! Form::label('description', 'Mô tả') !!}
                        {{-- <label class="text-strong" for="name">Tên vai trò</label> --}}
                        {!! Form::text('description', old('description'), ['class'=>"form-control", 'id'=>'description']) !!}
                        {{-- <input class="form-control" type="text" name="name" id="name"> --}}
                        @error('description')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    
                    <strong>Vai trò này có quyền gì?</strong>
                    <small class="form-text text-muted pb-2">Check vào module hoặc các hành động bên dưới để chọn
                        quyền.</small>
                    <!-- List Permission  -->
                    @foreach ($permissions as $moduleName => $modulePermission)
                        <div class="card my-4 border">
                            <div class="card-header">
                                {!! Form::checkbox(null, null, null, ['class'=>'check-all', 'id'=>$moduleName]) !!}
                                {!! Form::label($moduleName, 'Module '.$moduleName) !!}
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @foreach ($modulePermission as $v)
                                        <div class="col-md-3">
                                            {!! Form::checkbox('permission_id[]', $v->id, null, ['id'=>$v->slug, 'class'=>'permission']) !!}
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
