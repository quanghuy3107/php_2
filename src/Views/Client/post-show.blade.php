@extends('layouts.master')

@section('title')
    Trang chi tiết
@endsection

@section('content')
    <section class="single-post-content">
        <div class="container">
            <div class="row">
                <div class="col-md-9 post-content" data-aos="fade-up">

                    <!-- ======= Single Post Content ======= -->
                    <div class="single-post">
                        <div class="post-meta">
                            <span class="date">{{ $post['name'] }}</span>
                            <span class="mx-1">&bullet;</span>
                            <span>Jul 5th '22</span>
                        </div>
                        <h1 class="mb-5">{{ $post['title'] }}</h1>

                        <figure class="my-4">
                            <img src="{{ $post['image'] }}" alt="" style="width: 100%; padding: 0 10% 0 10%;"
                                class="img-fluid">
                            <figcaption style="padding: 0 10% 0 10%;">{{ $post['name'] }}</figcaption>
                        </figure>

                        <div style="white-space: break-spaces;">
                            {!! $post['content'] !!}
                        </div>
                    </div><!-- End Single Post Content -->
                </div>

                @include('components.sidebar')
            </div>
        </div>
    </section>
@endsection
