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
                        <form action="{{ route('admin.update_cat_product',$cat_edit->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Tên danh mục</label>
                                <input class="form-control" value="{{ $cat_edit->cat }}" type="text" name="cat"
                                    id="name">
                                @error('cat')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <button type="submit" name="btn_add_parent" value="btn_add_parent" class="btn btn-primary">Cập nhật</button>
                        </form>
                    </div>


                </div>
            </div>
            <div class="col-8">

                <div class="card">
                    <div class="card-header font-weight-bold">
                        Danh mục cha
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Tên danh mục</th>
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
