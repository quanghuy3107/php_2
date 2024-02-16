<div class="col-md-3">
    <!-- ======= Sidebar ======= -->
    <div class="aside-block">

        <ul class="nav nav-pills custom-tab-nav mb-4" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-popular-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-popular" type="button" role="tab" aria-controls="pills-popular"
                    aria-selected="true">Popular</button>
            </li>
        </ul>

        <div class="tab-content" id="pills-tabContent">
            @php
                $posts = (new \Quanghuy\Mvcoop\Models\Posts())->getTop6();
            @endphp
            <!-- Popular -->
            <div class="tab-pane fade show active" id="pills-popular" role="tabpanel"
                aria-labelledby="pills-popular-tab">
                @if (!empty($posts))
                    @foreach ($posts as $post)
                        <div class="post-entry-1 border-bottom">
                            <div class="post-meta"><span class="date">{{ $post['name'] }}</span> <span
                                    class="mx-1">&bullet;</span>
                                <span>Jul 5th '22</span>
                            </div>
                            <h2 class="mb-2"><a href="/post/{{ $post['postsid'] }}">{{ $post['title'] }}</a></h2>
                        </div>
                    @endforeach
                @endif



            </div> <!-- End Popular -->


        </div>
    </div>


    <div class="aside-block">
        <h3 class="aside-title">Categories</h3>
        <ul class="aside-links list-unstyled">
            @php
                $categories = (new \Quanghuy\Mvcoop\Models\Category())->getAllCategory();
            @endphp
            @if (!empty($categories))
                @foreach ($categories as $cate)
                    <li><a href="/category/{{ $cate['id'] }}">{{ $cate['name'] }}</a></li>
                @endforeach
            @endif

        </ul>
    </div><!-- End Categories -->



</div>
