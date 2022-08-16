@extends('admin.master')
@section('main')
<div class="container-fluid pt-4 px-4">
    <div class="col-sm-12 col-xl-12">
        <div class="bg-light rounded h-100 p-4">
            <h2 class="mb-4">Danh sách tin tức</h3>
            <table class="table table-bordered table--custom">
                <thead class="bg-info text-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tiêu đề</th>
                        <th scope="col">Thể loại</th>
                        <th scope="col">Tóm tắt</th>
                        <th scope="col">Ngày đăng</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Tác giả</th>
                        <th scope="col">Lượt xem</th>
                        <th scope="col">Sửa</th>
                        <th scope="col">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    @php
                        
                        if($post->news_status == 1) {
                            $status_class = "btn btn-success m-2 p-1";
                            $news_status = "Công khai";
                        }else {
                            $status_class = "btn btn-secondary m-2 p-1";
                            $news_status =  "Ẩn";
                        }
                    @endphp
                    <tr>
                        <td scope="col">{{$post->news_id}}</td>
                        <td class="post_title" scope="col"><span>{{$post->news_title}}</span></td>
                        <td scope="col">{{$post->category->category_name}}</td>
                        <td class="post_summary" scope="col"><span>{{$post->news_summary}}</span></td>
                        <td scope="col">{{$post->date_posted->format('d/m/Y')}}</td>
                        <td scope="col" style="width:120px"><span class="{{$status_class}}">{{$news_status}}</span></td>
                        <td scope="col">{{$post->user->user_fullname}}</td>
                        <td scope="col">{{$post->news_views}}</td>
                        <td><a class="btn btn-square btn-outline-primary m-2" href="{{url('/admin/post/update', [$post->news_id])}}">
                            <i class="fas fa-edit"></i>
                        </a></td>
                        <td><a onclick="confirm('Bạn chắc chắn muốn xóa bài viết này ?')" class="btn btn-square btn-outline-danger m-2 aDeleteJs" href="{{url('/admin/post/delete', [$post->news_id])}}">
                            <i class="fas fa-trash-alt"></i>
                        </a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
