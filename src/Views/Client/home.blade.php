@extends('layouts.master')

@section('title')
    Trang chủ
@endsection

@section('content')
    <!-- ======= Post Grid Section ======= -->
    <section id="posts" class="posts">
        <div class="container" data-aos="fade-up">
            <div class="row g-5">
                <div class="col-lg-6">
                    @include('components.post-entry-1', ['post' => $postFirstLatest])
                </div>

                <div class="col-lg-6">
                    <div class="row g-5">

                        @foreach ($postTop6Chunk as $item)
                            <div class="col-lg-6 border-start custom-border">
                                @foreach ($item as $post)
                                    @include('components.post-entry-1', [
                                        'post' => $post,
                                        'hiddenAuthor' => false,
                                        'hiddenExcerpt' => false,
                                    ])
                                @endforeach
                            </div>
                        @endforeach

                    </div>
                </div>

            </div> <!-- End .row -->
        </div>
    </section> <!-- End Post Grid Section -->
@endsection
