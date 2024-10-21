@extends('layouts.admin')
@section('content')
    <div id="content" class="container-fluid">
        <div class="card">
            @if(!empty(session('status')))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                
            @endif
            <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
                <h5 class="m-0 ">Danh sách bài viết</h5>
                <div class="form-search form-inline">
                    <form action="#">
                        <input type="text" name="keyword" value="{{ request()->input('keyword') }}"
                            class="form-control form-search" placeholder="Tìm kiếm">
                        <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="analytic">
                    <a href="{{ request()->fullUrlWithQuery(['status' => 'active']) }}" class="text-primary">Kích hoạt<span
                            class="text-muted">({{ $count[0] }})</span></a>
                    <a href="{{ request()->fullUrlWithQuery(['status' => 'trash']) }}" class="text-primary">Vô hiệu hóa<span
                            class="text-muted">({{ $count[1] }})</span></a>
                </div>
                <form action="{{ url('admin/post/action') }}">
                    @csrf
                    <div class="form-action form-inline py-3">
                        <select class="form-control mr-1" name="act" id="">
                            <option>Chọn</option>
                            @foreach ($list_act as $k => $act)
                                <option value="{{ $k }}"> {{ $act }}</option>
                            @endforeach
                        </select>
                        <input type="submit" name="btn-search" value="Áp dụng" class="btn btn-primary">
                    </div>
                    @if ($posts->total() > 0)
                        <table class="table table-striped table-checkall">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        <input name="checkall" type="checkbox">
                                    </th>
                                    <th scope="col">Stt</th>
                                    <th scope="col">Tác giả</th>
                                    <th scope="col">Tiêu đề</th>
                                    <th scope="col">Danh mục</th>
                                    <th scope="col">Ngày tạo</th>
                                    @if ((isset($_GET['status']) && $_GET['status'] != 'trash') || !isset($_GET['status']))
                                        <th scope="col">Tác vụ</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $stt = 0;
                                @endphp
                                @foreach ($posts as $post)
                                    @php
                                        $stt++;
                                    @endphp
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="list_check[]" value="{{ $post->id }}">
                                            {{-- mỗi ô chechbox sẽ có  value bằng id của user đó và dc lưu trong mảng
                                điều nàyy thực hiện chức năng sửa xóa trên nhìeeu user 1 lúc --}}
                                        </td>
                                        <td scope="row">{{ $stt }}</td>
                                        <td>
                                            {{ $post->user->name }}
                                            {{-- {{ $post->user  }} --}}
                                            {{-- {{$post->id}} --}}
                                            {{-- @php
                                    use App\Models\Post;
                                    $user = Post::find($post->id)->user;
                                    echo $user;
                                @endphp --}}
                                        </td>
                                        <td><a href="">{{ $post->title }}</a></td>
                                        <td>{{ $post->cat->cat_item }}</td>
                                        <td>{{ $post->created_at }}</td>
                                        {{-- <td>
                                        <button class="btn btn-success btn-sm rounded-0" type="button"
                                            data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                class="fa fa-edit"></i>
                                            </button>
                                        <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip"
                                            data-placement="top" title="Delete"><i class="fa fa-trash"></i>
                                        </button>
                                    </td> --}}
                                        @if ((isset($_GET['status']) && $_GET['status'] != 'trash') || !isset($_GET['status']))
                                            <td>
                                                <a href="{{ route('edit_post', $post->id) }}"
                                                    class="btn btn-success btn-sm rounded-0 text-white" type="button"
                                                    data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                        class="fa fa-edit"></i></a>
                                                {{-- @if (Auth::id() != $user->id) --}}
                                                {{-- KIỂM TRA ĐỂ XUẤT HIỆN PHẦN XÓA BẢN GHI(USER) --}}
                                                <a href="{{ route('delete_post', $post->id) }}"
                                                    onclick="return confirm('bạn có chăc chắn xóa bản ghi này')"
                                                    class="btn btn-danger btn-sm rounded-0 text-white" type="button"
                                                    data-toggle="tooltip" data-placement="top" title="Delete"><i
                                                        class="fa fa-trash"></i></a>
                                                {{-- @endif --}}
                                            </td>
                                        @endif
                                @endforeach
                            </tbody>
                        </table>
                </form>
                {{ $posts->links() }}
            @else
                <hr>
                <p><i style="color: red">*Không có bản ghi nào</i></p>
                @endif

            </div>
        </div>
    </div>
@endsection
