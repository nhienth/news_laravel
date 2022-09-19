@extends('layout')
@section('main')
      <!--================Blog Area =================-->
      <section class="blog_area section-padding">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mb-5 mb-lg-0">
            <div class="blog_left_sidebar">
              <div>
                @php
                  if(isset($message)) echo '<h2>'.$message.'</h2>'; 
                @endphp
              </div>
            @foreach($allPost as $post)
            <article class="blog_item">
                <div class="blog_item_img">
                  <img
                    class="card-img rounded-0"
                    src="{{asset('assets_admin/img/'.$post->news_img)}}"
                    height="385px"
                    alt=""
                  />
                  <a href="#" class="blog_item_date">
                    {{$post->date_posted->format('d/m')}}
                  </a>
                </div>

                <div class="blog_details">
                  <a class="d-inline-block" href="{{url('/post/details', ['id'=>$post->news_id])}}">
                    <h2>{{$post->news_title}}</h2>
                  </a>
                  <p>
                    {{$post->news_summary}}
                  </p>
                  <ul class="blog-info-link">
                    <li>
                      <a href="#"
                        ><i class="fa fa-user"></i> {{$post->category->category_name}}</a
                      >
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-comments"></i> 03 Bình luận</a>
                    </li>
                  </ul>
                </div>
              </article>
            @endforeach
              

              <nav class="blog-pagination justify-content-center d-flex">
                <ul class="pagination">
                  <li class="page-item">
                    <a href="#" class="page-link" aria-label="Previous">
                      <i class="ti-angle-left"></i>
                    </a>
                  </li>
                  <li class="page-item">
                    <a href="#" class="page-link">1</a>
                  </li>
                  <li class="page-item active">
                    <a href="#" class="page-link">2</a>
                  </li>
                  <li class="page-item">
                    <a href="#" class="page-link" aria-label="Next">
                      <i class="ti-angle-right"></i>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
          <div class="col-lg-4">

              @include('pages._sidebar')

            </div>
          </div>
        </div>
      </div>
    </section>
      <!--================ Blog Area end =================-->

@endsection