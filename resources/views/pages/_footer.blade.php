@php
    use App\Models\Post;
    $postTrendingTop = Post::with(['user', 'category'])
        ->orderBy('news.news_views', 'desc')
        ->take(3)
        ->get();
@endphp
<div class="footer-main footer-bg">
        <div class="footer-area footer-padding">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-3 col-lg-3 col-md-5 col-sm-8">
                        <div class="single-footer-caption mb-50">
                            <div class="single-footer-caption mb-30">
                                <!-- logo -->
                                <div class="footer-logo">
                                    <a href="index.html"><img src="{{asset('assets/img/logo/logo2_footer.png')}}" alt=""></a>
                                </div>
                                <div class="footer-tittle">
                                    <div class="footer-pera">
                                        <p class="info1">Giấy phép xuất bản số 110/GP - BTTTT cấp ngày 24.3.2020</p>
                                        <p class="info2">© 2003-2022 Bản quyền thuộc về Báo News. Cấm sao chép dưới mọi hình thức nếu không có sự chấp thuận bằng văn bản.</p>
                                        <p class="info2">Phát triển bởi ePi Technologies, JSC.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-5 col-sm-7">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Bài viết phổ biến</h4>
                            </div>
                            <!-- Popular post -->
                            @foreach ($postTrendingTop as $post)
                                <div class="whats-right-single mb-20">
                                    <div class="whats-right-img">
                                        <img src="{{asset('assets_admin/img/'.$post->news_img)}}" width="86px" height="80px" style="max-width:86px !important; height:80px !important;" alt="">
                                    </div>
                                    <div class="whats-right-cap">
                                        <h4><a class="custom-line--2" href="{{url('/post/details', ['id'=>$post->news_id])}}">{{$post->news_title}}</a></h4>
                                        <p>{{$post->user->user_fullname}}  |  {{$post->date_posted->diffForHumans()}}</p> 
                                    </div>
                                </div>
                            @endforeach
                            
                            
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-5 col-sm-7">
                        <div class="single-footer-caption mb-50">
                            <div class="banner">
                                <img src="{{asset('assets/img/gallery/body_card4.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer-bottom aera -->
        <div class="footer-bottom-area footer-bg">
            <div class="container">
                <div class="footer-border">
                    <div class="row d-flex align-items-center">
                        <div class="col-xl-12 ">
                            <div class="footer-copy-right text-center">
                                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> FPT Polytechnic | Website được thực hiện <i class="fa fa-heart" aria-hidden="true"></i> bởi <a href="https://colorlib.com" target="_blank">Nhienth</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>