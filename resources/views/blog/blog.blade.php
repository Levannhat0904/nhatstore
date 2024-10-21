@extends('layouts.client')
@section('content')
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div style="padding: 10px; font-size: 1.7rem"> <a href="{{ route('home') }}"><i class="fa-solid fa-house"></i>
                        Trang chủ</a></div>
                <div class="col-lg-12 col-md-12">
                    @foreach ($posts as $post)
                        <div>
                            <div>
                                <style>
                                    .img {
                                        width: 300px;
                                        height: 200px;
                                    }

                                    @media only screen and (max-width: 768px) {
                                        .img {
                                            width: 200px;
                                            height: 100px;
                                        }
                                    }
                                </style>
                                <a style="display: flex; margin: 30px 50px" href="{{ route('blog.detail', $post->id) }}">
                                    <img class="img" src="{{ $post->img }}" alt="">
                                    <div
                                        style="font-size: 1.6rem; margin:0 20px 40px;text-align: justify; line-height: 20px; word-spacing: 5px;">
                                        <div style="color: rgba(37, 189, 245, 0.843); font-size: 1.7rem">
                                            <b><i>{{ $post->cat->cat->cat }}{{ " - " }}{{ $post->cat->cat_item }}</i></b>
                                        </div>
                                        <div><b><i>{{ $post->title }}</i></b></div>
                                        <div><i><b><i class="fa-solid fa-calendar-days"></i></b></i>
                                            {{ $post->created_at->format('d/m/Y') }}</div>
                                        <div><i>Tác giả: {{ $post->user->name }}</i></div>
                                    </div>
                                </a>
                            </div>
                    @endforeach
                </div>
            </div>
            <div style="margin: 0 auto; font-size: 1.6rem">
                {{ $posts->links() }}
            </div>
        </div>
        </div>
    </section>
@endsection
@section('script')
    <script src="{{ asset('js/main.js') }}"></script>
@endsection
