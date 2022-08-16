@extends('admin.master')
@section('main')
<div class="container-fluid pt-4 px-4">
    <div class="col-sm-12 col-xl-12">
        <div class="bg-light rounded h-100 p-4">
            <h2 class="mb-4">Danh sách tài khoản</h2>
            <table class="table table-bordered table--custom">
                <thead class="bg-info text-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Họ và tên</th>
                        <th scope="col">Email</th>
                        <th scope="col">Ảnh đại diện</th>
                        <th scope="col">Vai trò</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Cập nhật trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allUsers as $user)
                    @php
                        $user->user_status = $user->user_status == 1 ? 'Đang kích hoạt'
                        : 'Chưa kích hoạt';
                    @endphp
                    <tr>
                        <td scope="col">{{$user->user_id}}</td>
                        <td scope="col">{{$user->user_fullname}}</td>
                        <td scope="col">{{$user->email}}</td>
                        <td scope="col"><img src="{{asset('assets_admin/img/'.$user->user_img)}}" width="100px" height="100px" style="display:block; margin: 0 auto;"></td>
                        <td scope="col">{{$user->user_rolename}}</td>
                        <td scope="col">{{$user->user_status}}</td>
                        <td scope="col">
                            <form action="{{url('admin/user/update', [$user->user_id])}}" method="post">
                                @csrf
                                <select class="form-select"  name="user_status" aria-label="Default select example">
                                    <option selected>Trạng thái tài khoản</option>
                                    <option value="1">Kích hoạt</option>
                                    <option value="0">Hủy kích hoạt</option>
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