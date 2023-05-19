@extends('layouts.client')
@section('content')
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div style="padding: 10px; font-size: 1.7rem"> <a href="{{ route('home') }}"><i class="fa-solid fa-house"></i>
                        Trang chủ</a></div>
                <div class="col-lg-12 col-md-12">
                    <div style="padding: 10px; font-size: 1.7rem">
                        <i><b>{{ $page->title }}</b></i>
                    </div>
                    <dir><hr></dir>
                </div>
                <div>
                    {!! $page->content !!}
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
@section('script')
    <script src="{{ asset('js/main.js') }}"></script>
@endsection
