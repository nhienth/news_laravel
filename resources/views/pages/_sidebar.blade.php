<div class="blog_right_sidebar">
                <aside class="single_sidebar_widget search_widget">
                  <form action="{{url('/search')}}" method="GET">
                    <div class="form-group">
                      <div class="input-group mb-3">
                        <input
                          type="text"
                          name="keyword"
                          class="form-control"
                          placeholder="Nhập từ khóa tìm kiếm"
                          onfocus="this.placeholder = ''"
                          onblur="this.placeholder = 'Nhập từ khóa tìm kiếm'"
                        />
                        <div class="input-group-append">
                          <button class="btns" type="button">
                            <i class="ti-search"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                    <button
                      class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                      type="submit"
                    >
                      Tìm kiếm
                    </button>
                  </form>
                </aside>
                <aside class="single_sidebar_widget post_category_widget">
                  <h4 class="widget_title">Danh mục tin</h4>
                  <ul class="list cat-list">
                    @foreach($allCate as $cate)
                        <li>
                        <a href="{{ url('/cate', [$cate->category_id]) }}" class="d-flex">
                            <p>{{$cate->category_name}}</p>
                            <p>({{$cate->posts->count()}})</p>
                        </a>
                        </li>
                    @endforeach

                  </ul>
                </aside>
                <aside class="single_sidebar_widget popular_post_widget">
                  <h3 class="widget_title">Bài viết gần đây</h3>
                  @foreach ($recentPosts as $post)
                    <div class="media post_item">
                      <img src="{{asset('assets_admin/img/'.$post->news_img)}}" width="80px" height="80px" alt="post" />
                      <div class="media-body">
                        <a href="single-blog.html">
                          <h3><span>
                            {{$post->news_title}}
                          </span></h3>
                        </a>
                        <p>{{$post->date_posted->format('d/m/Y')}}</p>
                      </div>
                    </div>
                  @endforeach
                  
                </aside>
    
                <aside class="single_sidebar_widget instagram_feeds">
                  <h4 class="widget_title">Tin Instagram</h4>
                  <ul class="instagram_row flex-wrap">
                    <li>
                      <a href="#">
                        <img
                          class="img-fluid"
                          src="{{asset('assets/img/post/post_5.png')}}"
                          alt=""
                        />
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <img
                          class="img-fluid"
                          src="{{asset('assets/img/post/post_6.png')}}"
                          alt=""
                        />
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <img
                          class="img-fluid"
                          src="{{asset('assets/img/post/post_7.png')}}"
                          alt=""
                        />
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <img
                          class="img-fluid"
                          src="{{asset('assets/img/post/post_8.png')}}"
                          alt=""
                        />
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <img
                          class="img-fluid"
                          src="{{asset('assets/img/post/post_9.png')}}"
                          alt=""
                        />
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <img
                          class="img-fluid"
                          src="{{asset('assets/img/post/post_10.png')}}"
                          alt=""
                        />
                      </a>
                    </li>
                  </ul>
                </aside>
                <aside class="single_sidebar_widget newsletter_widget">
                  <h4 class="widget_title">Nhận tin mới</h4>
                  <form action="#">
                    <div class="form-group">
                      <input
                        type="email"
                        class="form-control"
                        onfocus="this.placeholder = ''"
                        onblur="this.placeholder = 'Nhập email'"
                        placeholder="Nhập email"
                        required
                      />
                    </div>
                    <button
                      class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                      type="submit"
                    >
                      Đăng ký
                    </button>
                  </form>
                </aside>
              </div>