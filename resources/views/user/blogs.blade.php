@extends('user.layouts.app')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title> Home -   Multivendor </title>

    <meta name="keywords" content=" Preloved Baza" />
    <meta name="description" content=" Preloved Baza is powerful marketplace &amp;  website.">
    <meta name="author" content="BS3-design">

    <!-- Favicon -->
    <link rel="icon" type="image/png"  href="{{asset('frontend-assets/assets/images/icons/favicon.png')}}" >

    <!-- WebFont.js -->
    <script>
        WebFontConfig = {
            google: {
                families: ['Poppins:400,500,600,700,800']
            }
        };
        (function (d) {
            var wf = d.createElement('script'),
                s = d.scripts[0];
            wf.src = 'assets/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>

    <link rel="preload" href="{{asset('frontend-assets/assets/vendor/fontawesome-free/webfonts/fa-regular-400.woff2')}}" as="font" type="font/woff2"
        crossorigin="anonymous">
    <link rel="preload" href="{{asset('frontend-assets/assets/vendor/fontawesome-free/webfonts/fa-solid-900.woff2')}}" as="font" type="font/woff2"
        crossorigin="anonymous">
    <link rel="preload" href="{{asset('frontend-assets/assets/vendor/fontawesome-free/webfonts/fa-brands-400.woff2')}}" as="font" type="font/woff2"
        crossorigin="anonymous">
    <link rel="preload" href="{{asset('frontend-assets/assets/fonts/wolmart.woff?png09e" as="font" type="font/woff')}}" crossorigin="anonymous">

    <!-- Vendor CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend-assets/assets/vendor/fontawesome-free/css/all.min.css')}}">

    <!-- Plugins CSS -->
    <!-- <link rel="stylesheet" href="assets/vendor/swiper/swiper-bundle.min.css"> -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend-assets/assets/vendor/animate/animate.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend-assets/assets/vendor/magnific-popup/magnific-popup.min.css')}}">
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="{{asset('frontend-assets/assets/vendor/swiper/swiper-bundle.min.css')}}">

    <!-- Default CSS -->
    <!-- <link rel="stylesheet" type="text/css" href="{{asset('frontend-assets/assets/css/demo1.min.css')}}"> -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend-assets/assets/css/style.min.css')}}">


</head>

            <!-- Start of Page Header -->
            <div class="page-header">
                <div class="container">
                    <h1 class="page-title mb-0">Grid 3</h1>
                </div>
            </div>
            <!-- End of Page Header -->

            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav mb-6">
                <div class="container">
                    <ul class="breadcrumb">
                        <li><a href="demo1.html">Home</a></li>
                        <li><a href="blog.html">Blog</a></li>
                        <li>Grid 3</li>
                    </ul>
                </div>
            </nav>
            <!-- End of Breadcrumb -->

            <!-- Start of Page Content -->
            <div class="page-content">
                <div class="container">
                   

                    <div class="row grid cols-lg-3 cols-md-2 mb-2" data-grid-options="{
                        'layoutMode': 'fitRows'
                    }" style="position: relative; height: 1112.22px;">
                        <article class="post post-grid-type grid-item overlay-zoom fashion" style="position: absolute; left: 0%; top: 0px;">
                            <figure class="post-media br-sm">
                                <a href="{{route('blog-details')}}">
                                    <img src="{{asset('frontend-assets/assets/images/blog/2cols/1.jpg')}}" width="600" height="420" alt="blog">
                                </a>
                            </figure>
                            <div class="post-details">
                                <div class="post-cats text-primary">
                                    <a href="#">Fashion</a>
                                </div>
                                <h4 class="post-title">
                                    <a href="{{route('blog-details')}}">New found the men dress for summer</a>
                                </h4>
                                <div class="post-content">
                                    <p>Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, 
                                    eget blandit nunc tortor eu nibh. Suspendisse potenti.Sed egstas, ant at 
                                    vulputate volutpat, uctus metus libero eu augue, vitae luctus…</p> <a href="{{route('blog-details')}}" class="btn btn-link btn-primary">(read more)</a>

                                </div>
                                <div class="post-meta">
                                    by <a href="#" class="post-author">John Doe</a>
                                    - <a href="#" class="post-date">03.01.2021</a>
                                    <a href="#" class="post-comment"><i class="w-icon-comments"></i><span>7</span>Comments</a>
                                </div>
                            </div>
                        </article>
                        <article class="post post-grid-type grid-item overlay-zoom others technology" style="position: absolute; left: 33.3321%; top: 0px;">
                            <figure class="post-media br-sm">
                                <a href="{{route('blog-details')}}">
                                    <img src="{{asset('frontend-assets/assets/images/blog/2cols/2.jpg')}}" width="600" height="420" alt="blog">
                                </a>
                            </figure>
                            <div class="post-details">
                                <div class="post-cats text-primary">
                                    <a href="#">Others</a>,
                                    <a href="#">Technology</a>
                                </div>
                                <h4 class="post-title">
                                    <a href="{{route('blog-details')}}">Recognitory the needs is primary condition  for design</a>
                                </h4>
                                <div class="post-content">
                                    <p>Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo,
                                    eget blandit nunc tortor eu nibh. Suspendisse potenti.Sed egstas, ant at
                                    vulputate volutpat, uctus metus libero eu augue, vitae luctus…</p>
                                    <a href="{{route('blog-details')}}" class="btn btn-link btn-primary">(read more)</a>
                                </div>
                                <div class="post-meta">
                                    by <a href="#" class="post-author">John Doe</a>
                                    - <a href="#" class="post-date">03.05.2021</a>
                                    <a href="#" class="post-comment"><i class="w-icon-comments"></i><span>4</span>Comments</a>
                                </div>
                            </div>
                        </article>
                        <article class="post post-grid-type grid-item overlay-zoom clothes" style="position: absolute; left: 66.6641%; top: 0px;">
                            <figure class="post-media br-sm">
                                <a href="{{route('blog-details')}}">
                                    <img src="{{asset('frontend-assets/assets/images/blog/2cols/3.jpg')}}" width="600" height="420" alt="blog">
                                </a>
                            </figure>
                            <div class="post-details">
                                <div class="post-cats text-primary">
                                    <a href="#">Clothes</a>
                                </div>
                                <h4 class="post-title">
                                    <a href="{{route('blog-details')}}">New found the women’s shirt  for summer season</a>
                                </h4>
                                <div class="post-content">
                                    <p>Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo,
                                    eget blandit nunc tortor eu nibh. Suspendisse potenti.Sed egstas, ant at
                                    vulputate volutpat, uctus metus libero eu augue, vitae luctus…</p>
                                    <a href="{{route('blog-details')}}" class="btn btn-link btn-primary">(read more)</a>
                                </div>
                                <div class="post-meta">
                                    by <a href="#" class="post-author">John Doe</a>
                                    - <a href="#" class="post-date">03.01.2021</a>
                                    <a href="#" class="post-comment"><i class="w-icon-comments"></i><span>2</span>Comments</a>
                                </div>
                            </div>
                        </article>
                        <article class="post post-grid-type grid-item overlay-zoom lifestyle" style="position: absolute; left: 0%; top: 556.109px;">
                            <figure class="post-media br-sm">
                                <a href="{{route('blog-details')}}">
                                    <img src="{{asset('frontend-assets/assets/images/blog/2cols/4.jpg')}}" width="600" height="420" alt="blog">
                                </a>
                            </figure>
                            <div class="post-details">
                                <div class="post-cats text-primary">
                                    <a href="#">Lifestyle</a>
                                </div>
                                <h4 class="post-title">
                                    <a href="{{route('blog-details')}}">We want to be different and fashion gives to me that outlet</a>
                                </h4>
                                <div class="post-content">
                                    <p>Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo,
                                    eget blandit nunc tortor eu nibh. Suspendisse potenti.Sed egstas, ant at
                                    vulputate volutpat, uctus metus libero eu augue, vitae luctus…</p>
                                    <a href="{{route('blog-details')}}" class="btn btn-link btn-primary">(read more)</a>
                                </div>
                                <div class="post-meta">
                                    by <a href="#" class="post-author">John Doe</a>
                                    - <a href="#" class="post-date">03.03.2021</a>
                                    <a href="#" class="post-comment"><i class="w-icon-comments"></i><span>5</span>Comments</a>
                                </div>
                            </div>
                        </article>
                        <article class="post post-grid-type grid-item overlay-zoom entertainment shoes lifestyle others" style="position: absolute; left: 33.3321%; top: 556.109px;">
                            <figure class="post-media br-sm">
                                <a href="{{route('blog-details')}}">
                                    <img src="{{asset('frontend-assets/assets/images/blog/2cols/5.jpg')}}" width="600" height="420" alt="blog">
                                </a>
                            </figure>
                            <div class="post-details">
                                <div class="post-cats text-primary">
                                    <a href="#">Entertainment</a>,
                                    <a href="#">Lifestyle</a>,
                                    <a href="#">Others</a>
                                </div>
                                <h4 class="post-title">
                                    <a href="{{route('blog-details')}}">Comes a cool blog post with Images</a>
                                </h4>
                                <div class="post-content">
                                    <p>Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo,
                                    eget blandit nunc tortor eu nibh. Suspendisse potenti.Sed egstas, ant at
                                    vulputate volutpat, uctus metus libero eu augue, vitae luctus…</p>
                                    <a href="{{route('blog-details')}}" class="btn btn-link btn-primary">(read more)</a>
                                </div>
                                <div class="post-meta">
                                    by <a href="#" class="post-author">John Doe</a>
                                    - <a href="#" class="post-date">03.01.2021</a>
                                    <a href="#" class="post-comment"><i class="w-icon-comments"></i><span>2</span>Comments</a>
                                </div>
                            </div>
                        </article>
                        <article class="post post-grid-type grid-item overlay-zoom fashion lifestyle" style="position: absolute; left: 66.6641%; top: 556.109px;">
                            <figure class="post-media br-sm">
                                <a href="{{route('blog-details')}}">
                                    <img src="{{asset('frontend-assets/assets/images/blog/2cols/6.jpg')}}" width="600" height="420" alt="blog">
                                </a>
                            </figure>
                            <div class="post-details">
                                <div class="post-cats text-primary">
                                    <a href="#">Fashion</a>,
                                    <a href="#">Technology</a>
                                </div>
                                <h4 class="post-title">
                                    <a href="{{route('blog-details')}}">Fusce lacinia arcuet nulla</a>
                                </h4>
                                <div class="post-content">
                                    <p>Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo,
                                    eget blandit nunc tortor eu nibh. Suspendisse potenti.Sed egstas, ant at
                                    vulputate volutpat, uctus metus libero eu augue, vitae luctus…</p>
                                    <a href="{{route('blog-details')}}" class="btn btn-link btn-primary">(read more)</a>
                                </div>
                                <div class="post-meta">
                                    by <a href="#" class="post-author">John Doe</a>
                                    - <a href="#" class="post-date">03.06.2021</a>
                                    <a href="#" class="post-comment"><i class="w-icon-comments"></i><span>3</span>Comments</a>
                                </div>
                            </div>
                        </article>
                    </div>
                    <ul class="pagination justify-content-center mb-10 pb-2 pt-2">
                        <li class="prev disabled">
                            <a href="#" aria-label="Previous" tabindex="-1" aria-disabled="true">
                                <i class="w-icon-long-arrow-left"></i>Prev
                            </a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="next">
                            <a href="#" aria-label="Next">
                                Next<i class="w-icon-long-arrow-right"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- End of Page Content -->
        </main>
        @endsection
