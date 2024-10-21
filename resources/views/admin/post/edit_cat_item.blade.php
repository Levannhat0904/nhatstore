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
                        Cập nhật danh mục con
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.update_cat_item',$cat_edit->id) }} " method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Tên danh mục</label>
                                <input class="form-control" value="{{ $cat_edit->cat_item }}" type="text" name="cat_item" id="name">
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
                                                <option @php
                                                    if($cat_edit->cat->id == $v->id)
                                                    echo ' selected="selected"';
                                                @endphp value={{ $v->id }}>{{ $v->cat }}</option>
                                            @endforeach
                                        </optgroup>
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
                        Danh mục con
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Tên danh mục</th>
                                    <th scope="col">Tên danh cha</th>
                                    {{-- <th scope="col">Slug</th> --}}
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
