@extends('layouts.admin')
@section('content')
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold">
                Cập nhật bài viết
            </div>
            <div class="card-body">
                <form action="{{route('update_post', $post->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Tiêu đề bài viết</label>
                        <input class="form-control" type="text" value="{{ $post->title }}" name="title" id="title">
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="img">Ảnh</label>
                        <div></div>
                        <input type="file" name="img" old('img') multiple="multiple" id="img">
                    </div>
                    @error('img')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <div class="form-group">
                        <label for="content">Nội dung bài viết</label>
                        <textarea name="content" class="form-control"  id="content" cols="30" rows="5">{{$post->content}}</textarea>
                        @error('content')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category">Danh mục</label>
                        <select class="form-control" name="category" id="category">
                            <option value="">-----Chọn danh mục-----</option>
                            @foreach ($cat_post as $key => $cat)
                                <optgroup label={{$key}}>
                                    @foreach ($cat as $v)
                                        <option
                                         @php
                                        if($post->cat_id == $v->id)
                                        echo ' selected="selected"';
                                        @endphp 
                                    value="{{ $v->id }}">{{ $v->cat_item }}</option>
                                    @endforeach
                                </optgroup>
                            @endforeach

                        </select>
                        @error('category')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" name="btn_add" class="btn btn-primary">Cập nhật</button>
                </form>
            </div>
        </div>
    </div>
@endsection
