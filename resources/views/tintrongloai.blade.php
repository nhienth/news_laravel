@extends('layout')
@section('main')
      <!--================Blog Area =================-->
      <section class="blog_area section-padding">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mb-5 mb-lg-0">
            <div class="blog_left_sidebar">
            @foreach($listTin as $tin)
            <article class="blog_item">
                <div class="blog_item_img">
                  <img
                    class="card-img rounded-0"
                    src="../../assets/img/blog/single_blog_1.png"
                    alt=""
                  />
                  <a href="#" class="blog_item_date">
                    <h3>15</h3>
                    <p>Jan</p>
                  </a>
                </div>

                <div class="blog_details">
                  <a class="d-inline-block" href="{{ url('/tin', [$tin->tin_id]) }}">
                    <h2>{{$tin->tin_tieude}}</h2>
                  </a>
                  <p>
                    {{$tin->tin_tomtat}}
                  </p>
                  <ul class="blog-info-link">
                    <li>
                      <a href="#"
                        ><i class="fa fa-user"></i> Travel, Lifestyle</a
                      >
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-comments"></i> 03 Comments</a>
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