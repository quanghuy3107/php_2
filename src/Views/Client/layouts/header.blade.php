<header id="header" class="header d-flex align-items-center fixed-top">
    @php
    $categories = (new \Quanghuy\Mvcoop\Models\Category())->getAllCategory();
    @endphp
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="/" class="logo d-flex align-items-center">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="/assets/client/assets/img/logo.png" alt=""> -->
            <h1>ZenBlog</h1>
        </a>
        <nav id="navbar" class="navbar">
            <ul>
                @foreach($categories as $cate)
                    <li><a href="/category/{{$cate['id']}}">{{$cate['name']}}</a></li>
                @endforeach

            </ul>
        </nav><!-- .navbar -->

        <div class="position-relative">
            <a href="#" class="mx-2"><span class="bi-facebook"></span></a>
            <a href="#" class="mx-2"><span class="bi-twitter"></span></a>
            <a href="#" class="mx-2"><span class="bi-instagram"></span></a>

            <a href="#" class="mx-2 js-search-open"><span class="bi-search"></span></a>
            <i class="bi bi-list mobile-nav-toggle"></i>

            <!-- ======= Search Form ======= -->
            <div class="search-form-wrap js-search-form-wrap">
                <form action="" class="search-form">
                    <span class="icon bi-search"></span>
                    <input type="search" placeholder="Search" name="search" class="form-control">
                    <button class="btn js-search-close"><span class="bi-x"></span></button>
                </form>
            </div><!-- End Search Form -->

        </div>

    </div>

</header>