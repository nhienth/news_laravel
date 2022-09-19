@extends('layout')
@section('main')
      <!--================Blog Area =================-->
      <section class="blog_area single-post-area section-padding">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 posts-list">
              <div class="single-post">
                <div class="feature-img">
                  <img
                    class="img-fluid"
                    src="{{asset('assets_admin/img/'.$post->news_img)}}"
                    height="375px"
                  />
                </div>
                <div class="blog_details">
                  <h2>
                    {{$post->news_title}}
                  </h2>
                  <ul class="blog-info-link mt-3 mb-4">
                    <li>
                      <a href="#"
                        ><i class="fa fa-user"></i>  {{$post->category->category_name}}</a
                      >
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-comments"></i> 03 bình luận</a>
                    </li>
                    <li>
                        <a href="#"><i class="fas fa-eye"></i> {{$post->news_views}}</a>
                      </li>
                  </ul>
                  <p class="excert">
                    <b>{{$post->news_summary}}</b>
                  </p>
                  <p class="excert">
                  <?php echo  $post->news_content ?>
                  </p>
                
                </div>
              </div>
              <div class="navigation-top">
                <div class="d-sm-flex justify-content-between text-center">
                  <p class="like-info">
                    <span class="align-middle"
                      ><i class="fa fa-heart"></i
                    ></span>
                    Lily và 4 người khác thích bài viết này
                  </p>
                  <div class="col-sm-4 text-center my-2 my-sm-0">
                    <!-- <p class="comment-count"><span class="align-middle"><i class="fa fa-comment"></i></span> 06 Comments</p> -->
                  </div>
                  <ul class="social-icons">
                    <li>
                      <a href="#"><i class="fab fa-facebook-f"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fab fa-dribbble"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fab fa-behance"></i></a>
                    </li>
                  </ul>
                </div>
                
              </div>
              <div class="blog-author">
                <div class="media align-items-center">
                  <img src="{{asset('assets_admin/img/'.$post->user->user_img)}}" alt="" />
                  <div class="media-body">
                    <a href="#">
                      <h4>{{$post->user->user_fullname}}</h4>
                    </a>
                    <p>
                        Mọi nơi, mọi lúc, mọi News
                    </p>
                  </div>
                </div>
              </div>
              <div class="comments-area">
                <h4>05 Bình luận</h4>
                @foreach ($allComments as $comment)
                <div class="comment-list">
                  <div class="single-comment justify-content-between d-flex">
                    <div class="user justify-content-between d-flex">
                      <div class="thumb">
                        <img src="{{asset('assets_admin/img/'.$comment->user->user_img)}}" width="70px" height="70px" alt="" />
                      </div>
                      <div class="desc">
                        <p class="comment">
                          {{$comment->comment_content}}
                        </p>
                        <div class="d-flex justify-content-between">
                          <div class="d-flex align-items-center">
                            <h5>
                              <a href="#">{{$comment->user->user_fullname}}</a>
                            </h5>
                            <p class="date">{{$comment->comment_date->format('d/m/Y')}}</p>
                          </div>
                          <div class="reply-btn">
                            <a href="#" class="btn-reply text-uppercase"
                              >Phản hồi</a
                            >
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
                
                
              </div>
              <div class="comment-form">
                <h4>Để lại phản hồi</h4>
                <form
                  class="form-contact comment_form"
                  action="{{url('/post/comment')}}"
                  id="commentForm"
                  method="POST"
                >
                @csrf
                <input type="hidden" name="news_id" value="{{$post->news_id}}">
                  <div class="row">
                    <div class="col-12">
                      <div class="form-group">
                        <textarea
                          class="form-control w-100"
                          name="comment_content"
                          id="comment"
                          cols="30"
                          rows="5"
                          placeholder="Viết bình luận"
                        ></textarea>
                      </div>
                    </div>
                    
                    
                  </div>
                  <div class="form-group">
                    <button
                      type="submit"
                      class="button button-contactForm btn_1 boxed-btn"
                    >
                      Gửi bình luận
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="col-lg-4">
              @include('pages._sidebar')
            </div>
          </div>
        </div>
      </section>
      <!--================ Blog Area end =================-->

@endsection