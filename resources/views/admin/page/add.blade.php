@extends('layouts.admin')
@section('content')
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold">
                Thêm bài viết
            </div>
            <div class="card-body">
                <form action="{{ url('admin/page/store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">Tiêu đề bài viết</label>
                        <input class="form-control" type="text" name="title" id="title">
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <div class="form-group">
                            <label for="category">Danh mục</label>
                            <input class="form-control" type="text" name="category" id="category">
                            @error('category')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="content">Nội dung bài viết</label>
                        <textarea name="content" class="form-control" id="content" cols="30" rows="5"></textarea>
                        @error('content')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    
                    <button type="submit" name="btn_add" class="btn btn-primary">Thêm mới</button>
                </form>
            </div>
        </div>
    </div>
@endsection
