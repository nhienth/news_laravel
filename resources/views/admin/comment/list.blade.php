@extends('admin.master')
@section('main')
<div class="container-fluid pt-4 px-4">
    <div class="col-sm-12 col-xl-12">
        <div class="bg-light rounded h-100 p-4">
            <h2 class="mb-4">Danh sách bình luận</h2>
            <table class="table table-bordered table--custom">
                <thead class="bg-info text-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nội dung bình luận</th>
                        <th scope="col">Bài viết</th>
                        <th scope="col">Ngày bình luận</th>
                        <th scope="col">Người bình luận</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Cập nhật trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allComments as $comment)
                    @php
                        $comment->comment_status = $comment->comment_status == 1 ? 'Hiện'
                        : 'Ẩn';
                    @endphp
                    <tr>
                        <td scope="col">{{$comment->comment_id}}</td>
                        <td scope="col">{{$comment->comment_content}}</td>
                        <td scope="col">{{$comment->post->news_title}}</td>
                        <td scope="col">{{$comment->comment_date->format('d/m/Y')}}</td>
                        <td scope="col">{{$comment->user->user_fullname}}</td>
                        <td scope="col">{{$comment->comment_status}}</td>
                        <td scope="col">
                            <form action="{{url('admin/comment/update', [$comment->comment_id])}}" method="post">
                                @csrf
                                <select class="form-select"  name="comment_status" aria-label="Default select example">
                                    <option selected>Trạng thái bình luận</option>
                                    <option value="1">Hiện</option>
                                    <option value="0">Ẩn</option>
                                </select>
                                <button type="submit" class="btn btn-primary m-2 p-1">Cập nhật</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection