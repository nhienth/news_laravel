@php
    use App\Models\User;
    use App\Models\Post;
    use App\Models\Category;
@endphp
@extends('layout')
@section('main')
    <!-- Trending Area Start -->
    <div class="trending-area fix pt-25 gray-bg">
        <div class="container">
            <div class="trending-main">
                <div class="row">
                    <div class="col-lg-8">
                        <!-- Trending Top -->
                        <div class="slider-active">
                            <!-- Single -->
                            @foreach ($postTrendingTop as $post)
                                <div class="single-slider">
                                    <div class="trending-top mb-30">
                                        <div class="trend-top-img">
                                            <img src="{{asset('assets_admin/img/'.$post->news_img)}}" height="610px">
                                            <div class="trend-top-cap">
                                                <span class="bgr" data-animation="fadeInUp" data-delay=".2s" data-duration="1000ms">{{$post->category->category_name}}</span>
                                                <h2><a href="{{url('/post/details', ['id'=>$post->news_id])}}" data-animation="fadeInUp" data-delay=".4s" data-duration="1000ms">{{$post->news_title}}</a></h2>
                                                <p data-animation="fadeInUp" data-delay=".6s" data-duration="1000ms">by {{$post->user->user_fullname}},   {{$post->date_posted->format('d-m-Y')}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            
                        </div>
                    </div>
                    <!-- Right content -->
                    <div class="col-lg-4">
                            <!-- Trending Top -->
                        <div class="row">
                            @foreach ($postTrendingTopRight as $post)
                                <div class="col-lg-12 col-md-6 col-sm-6">
                                    <div class="trending-top mb-30">
                                        <div class="trend-top-img">
                                            <img src="{{asset('assets_admin/img/'.$post->news_img)}}" height="300px">
                                            <div class="trend-top-cap trend-top-cap2">
                                                <span class="bgb">{{$post->category->category_name}}</span>
                                                <h2><a href="{{url('/post/details', ['id'=>$post->news_id])}}">{{$post->news_title}}</a></h2>
                                                <p>by {{$post->user->user_fullname}},   {{$post->date_posted->format('d-m-Y')}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Trending Area End -->
    <!-- Whats New Start -->
    <section class="whats-news-area pt-50 pb-20 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                <div class="whats-news-wrapper">
                    <!-- Heading & Nav Button -->
                    <div class="row justify-content-between align-items-end mb-15">
                        <div class="col-xl-4">
                            <div class="section-tittle mb-30">
                                <h3>Tin tức mới</h3>
                            </div>
                        </div>
                        <div class="col-xl-8 col-md-9">
                            <div class="properties__button">
                                <!--Nav Button  -->                                            
                                <nav>                                                 
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        @foreach ($allCate as $cate)
                                            <a class="nav-item nav-link" id="nav-{{$cate->category_id}}-tab" data-toggle="tab" href="#nav-{{$cate->category_id}}" role="tab" aria-controls="nav-{{$cate->category_id}}" aria-selected="true">
                                                {{$cate->category_name}}
                                            </a>
                                        @endforeach
                                    </div>
                                </nav>
                                <!--End Nav Button  -->
                            </div>
                        </div>
                    </div>
                    <!-- Tab content -->
                    <div class="row">
                        <div class="col-12">
                            <!-- Nav Card -->
                            <div class="tab-content" id="nav-tabContent">
                                <!-- card one -->
                                @foreach ($allCate as $cate)
                                    @php
                                        $postByCategory = Post::with(['user', 'category'])
                                        ->where('news.category_id', $cate->category_id)
                                        ->orderBy('news.news_id', 'desc')
                                        ->take(4)
                                        ->get();
                                        $postLeft = Post::with(['user', 'category'])
                                        ->where('news.category_id', $cate->category_id)
                                        ->first();
                                        $showActive = $cate->category_id == 4 ? 'show active' : '';
                                    @endphp
                                    
                                    <div class="tab-pane fade {{$showActive}}" id="nav-{{$cate->category_id}}" role="tabpanel" aria-labelledby="nav-{{$cate->category_id}}-tab">       
                                        <div class="row">
                                            <!-- Left Details Caption -->
                                            <div class="col-xl-6 col-lg-12">
                                                <div class="whats-news-single mb-40 mb-40">
                                                    <div class="whates-img">
                                                        <img src="{{asset('assets_admin/img/'.$postLeft->news_img)}}" alt="">
                                                    </div>
                                                    <div class="whates-caption">
                                                        <h4><a href="{{url('/post/details', ['id'=>$postLeft->news_id])}}">{{$postLeft->news_title}}</a></h4>
                                                        <span>by {{$postLeft->user->user_fullname}},   {{$postLeft->date_posted->format('d-m-Y')}}</span>
                                                        <p>{{$postLeft->news_summary}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Right single caption -->
                                            <div class="col-xl-6 col-lg-12">
                                                <div class="row">
                                                    <!-- single -->
                                                    @foreach ($postByCategory as $post)
                                                    <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                        <div class="whats-right-single mb-20">
                                                            <div class="whats-right-img">
                                                                <img src="{{asset('assets_admin/img/'.$post->news_img)}}" width="124px" height="104px" alt="">
                                                            </div>
                                                            <div class="whats-right-cap">
                                                                <span class="colorb">{{$post->category->category_name}}</span>
                                                                <h4><a style="display: -webkit-box;
                                                                    -webkit-line-clamp: 2;
                                                                    -webkit-box-orient: vertical;
                                                                    overflow: hidden;" href="{{url('/post/details', ['id'=>$post->news_id])}}">
                                                                        {{$post->news_title}}
                                                                    </span>
                                                                </a></h4>
                                                                <p>{{$post->date_posted->format('d-m-Y')}}</p> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    

                                @endforeach
                                
                                
                            </div>
                        <!-- End Nav Card -->
                        </div>
                    </div>
                </div>
                <!-- Banner -->
                <div class="banner-one mt-20 mb-30">
                    <img src="assets/img/gallery/body_card1.png" alt="">
                </div>
                </div>
                <div class="col-lg-4">
                    <!-- Flow Socail -->
                    <div class="single-follow mb-45">
                        <div class="single-box">
                            <div class="follow-us d-flex align-items-center">
                                <div class="follow-social">
                                    <a href="#"><img src="assets/img/news/icon-fb.png" alt=""></a>
                                </div>
                                <div class="follow-count">  
                                    <span>8,045</span>
                                    <p>Fans</p>
                                </div>
                            </div> 
                            <div class="follow-us d-flex align-items-center">
                                <div class="follow-social">
                                    <a href="#"><img src="assets/img/news/icon-tw.png" alt=""></a>
                                </div>
                                <div class="follow-count">
                                    <span>8,045</span>
                                    <p>Fans</p>
                                </div>
                            </div>
                                <div class="follow-us d-flex align-items-center">
                                <div class="follow-social">
                                    <a href="#"><img src="assets/img/news/icon-ins.png" alt=""></a>
                                </div>
                                <div class="follow-count">
                                    <span>8,045</span>
                                    <p>Fans</p>
                                </div>
                            </div>
                            <div class="follow-us d-flex align-items-center">
                                <div class="follow-social">
                                    <a href="#"><img src="assets/img/news/icon-yo.png" alt=""></a>
                                </div>
                                <div class="follow-count">
                                    <span>8,045</span>
                                    <p>Fans</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Most Recent Area -->
                    <div class="most-recent-area">
                        <!-- Section Tittle -->
                        <div class="small-tittle mb-20">
                            <h4>Bài viết gần đây</h4>
                        </div>
                        <!-- Details -->
                        <div class="most-recent mb-40">
                            <div class="most-recent-img">
                                <img src="{{asset('assets_admin/img/'.$postMostRecentDetails->news_img)}}" height="241px" alt="">
                                <div class="most-recent-cap">
                                    <span class="bgbeg">{{$postMostRecentDetails->category->category_name}}</span>
                                    <h4><a href="{{url('/post/details', ['id'=>$postMostRecentDetails->news_id])}}">     {{$postMostRecentDetails->news_title}}
                                    </a></h4>
                                    <p>{{$postMostRecentDetails->user->user_fullname}}  |  {{$postMostRecentDetails->date_posted->diffForHumans()}}</p>
                                </div>
                            </div>
                        </div>
                        <!-- Single -->
                        @foreach ($postMostRecentSingle as $post)
                            <div class="most-recent-single">
                                <div class="most-recent-images">
                                    <img src="{{asset('assets_admin/img/'.$post->news_img)}}" width="85px" height="79px" alt="">
                                </div>
                                <div class="most-recent-capt">
                                    <h4><a class="custom-line--2" href="{{url('/post/details', ['id'=>$post->news_id])}}">{{$post->news_title}}</a></h4>
                                    <p>{{$post->user->user_fullname}}  |  {{$post->date_posted->diffForHumans()}}</p>
                                </div>
                            </div>
                        @endforeach
                        
                        <!-- Single -->
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Whats New End -->
    <!--   Weekly2-News start -->
    <div class="weekly2-news-area pt-50 pb-30 gray-bg">
        <div class="container">
            <div class="weekly2-wrapper">
                <div class="row">
                    <!-- Banner -->
                    <div class="col-lg-3">
                        <div class="home-banner2 d-none d-lg-block">
                            <img src="assets/img/gallery/body_card2.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="slider-wrapper">
                            <!-- section Tittle -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="small-tittle mb-30">
                                        <h4>Bài viết phổ biến</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- Slider -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="weekly2-news-active d-flex">
                                        <!-- Single -->
                                        @foreach ($postMostPopular as $post)
                                        <div class="weekly2-single">
                                            <div class="weekly2-img">
                                                <img src="{{asset('assets_admin/img/'.$post->news_img)}}" height="162px" alt="">
                                            </div>
                                            <div class="weekly2-caption">
                                                <h4><a class="custom-line--2" href="{{url('/post/details', ['id'=>$post->news_id])}}">
                                                    {{$post->news_title}}
                                                </a></h4>
                                                <p>{{$post->user->user_fullname}}  |  {{$post->date_posted->diffForHumans()}}</p>
                                            </div>
                                        </div>
                                        @endforeach
                                         
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>           
    <!-- End Weekly-News -->
    <!--  Recent Articles start -->
    {{-- <div class="recent-articles pt-80 pb-80">
        <div class="container">
            <div class="recent-wrapper">
                <!-- section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle mb-30">
                            <h3>Trending  News</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="recent-active dot-style d-flex dot-style">
                            <!-- Single -->
                            <div class="single-recent">
                                <div class="what-img">
                                    <img src="assets/img/gallery/tranding1.png" alt="">
                                </div>
                                <div class="what-cap">
                                    <h4><a href="#" > <h4><a href="latest_news.html">What to Expect From the 2020 Oscar Nomin ations</a></h4></a></h4>
                                    <P>Jun 19, 2020</P>
                                    <a class="popup-video btn-icon" href="https://www.youtube.com/watch?v=1aP-TXUpNoU"><span class="flaticon-play-button"></span></a>
                                    
                                </div>
                            </div>
                            <!-- Single -->
                            <div class="single-recent">
                                <div class="what-img">
                                    <img src="assets/img/gallery/tranding2.png" alt="">
                                </div>
                                <div class="what-cap">
                                    <h4><a href="latest_news.html">What to Expect From the 2020 Oscar Nomin ations</a></h4>
                                    <P>Jun 19, 2020</P>
                                    <a class="popup-video" href="https://www.youtube.com/watch?v=1aP-TXUpNoU"><span class="flaticon-play-button"></span></a>
                                </div>
                            </div>
                            <!-- Single -->
                            <div class="single-recent">
                                <div class="what-img">
                                    <img src="assets/img/gallery/tranding1.png" alt="">
                                </div>
                                <div class="what-cap">
                                    <h4><a href="latest_news.html"> <h4><a href="latest_news.html">What to Expect From the 2020 Oscar Nomin ations</a></h4></a></h4>
                                    <P>Jun 19, 2020</P>
                                    <a class="popup-video" href="https://www.youtube.com/watch?v=1aP-TXUpNoU"><span class="flaticon-play-button"></span></a>
                                </div>
                            </div>
                            <!-- Single -->
                            <div class="single-recent">
                                <div class="what-img">
                                    <img src="assets/img/gallery/tranding2.png" alt="">
                                </div>
                                <div class="what-cap">
                                    <h4><a href="latest_news.html">What to Expect From the 2020 Oscar Nomin ations</a></h4>
                                    <P>Jun 19, 2020</P>
                                    <a class="popup-video" href="https://www.youtube.com/watch?v=1aP-TXUpNoU"><span class="flaticon-play-button"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>            --}}
    <!--Recent Articles End -->
    <!-- Start Video Area -->
    <div class="youtube-area video-padding d-none d-sm-block">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="video-items-active">
                        <div class="video-items text-center">
                            <video controls>
                                <source src="assets/video/news2.mp4" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                        <div class="video-items text-center">
                            <video controls>
                                <source src="assets/video/news1.mp4" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                        <div class="video-items text-center">
                            <video controls>
                                <source src="assets/video/news3.mp4" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                        <div class="video-items text-center">
                            <video controls>
                                <source src="assets/video/news1.mp4" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                        <div class="video-items text-center">
                            <video controls>
                                <source src="assets/video/news3.mp4" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>
                </div>
            </div>
            <div class="video-info">
                <div class="row">
                    <div class="col-12">
                        <div class="testmonial-nav text-center">
                            <div class="single-video">
                                <video controls>
                                    <source src="assets/video/news2.mp4" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                                <div class="video-intro">
                                        <h4>Tin tức về Old Spondon - 2020 </h4>
                                </div>
                            </div>
                            <div class="single-video">
                                <video controls>
                                    <source src="assets/video/news1.mp4" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                                <div class="video-intro">
                                    <h4>Video Tin tức Bangladesh </h4>
                                </div>
                            </div>
                            <div class="single-video">
                                <video controls>
                                    <source src="assets/video/news3.mp4" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                                <div class="video-intro">
                                    <h4>Video mới nhất - 2020 </h4>
                                </div>
                            </div>
                            <div class="single-video">
                                <video controls>
                                    <source src="assets/video/news1.mp4" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                                <div class="video-intro">
                                    <h4>Tin tức về Spondon -2019 </h4>
                                </div>
                            </div>
                            <div class="single-video">
                                <video controls>
                                    <source src="assets/video/news3.mp4" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                                <div class="video-intro">
                                    <h4>Video mới nhất - 2020</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <!-- End Start Video area-->
    <!--   Weekly3-News start -->
               
    <!-- End Weekly-News -->
    <!-- banner-last Start -->
    <div class="banner-area gray-bg pt-90 pb-90">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-md-10">
                    <div class="banner-one">
                        <img src="assets/img/gallery/body_card3.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner-last End -->
@endsection