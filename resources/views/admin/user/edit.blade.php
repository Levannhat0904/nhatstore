@extends('layouts.admin')

@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Cập nhật người dùng
        </div>
        <div class="card-body">
            <form action="{{route('user.update', $user->id)}}" method="POST">
                @csrf 
                <div class="form-group">
                    <label for="name">Họ và tên</label>
                    <input class="form-control" type="text" value="{{$user->name}}" name="name" id="name">
                    @error('name')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="email" name="email" value="{{$user->email}}" disabled id="email">
                    @error('email')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('roles', 'Roles') !!}
                    @php
                        // $select_role= [5,6];
                        $select_role= $user->roles->pluck('id')->toArray();
                        $option =$role->pluck('name','id')->toArray();
                    @endphp
                    {!! Form::select('roles[]', $option, $select_role, ['id'=>'roles', 'class'=>'form-control', 'multiple'=>true]) !!}
                </div>

                <button type="submit" value="update" name="btn_update" class="btn btn-primary">Thêm mới</button>
            </form>
        </div>
    </div>
</div>
@endsection