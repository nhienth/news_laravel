@extends('admin.master')
@section('main')
<div class="container-fluid pt-4 px-4">
    <div class="col-sm-12 col-xl-12">
        <div class="bg-light rounded h-100 p-4">
            <h2 class="mb-4">Danh sách danh mục</h2>
            <table class="table table-bordered table--custom">
                <thead class="bg-info text-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên danh mục</th>
                        <th scope="col">Sửa</th>
                        <th scope="col">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allCate as $cate)
                    <tr>
                        <th scope="row">{{$cate->category_id}}</th>
                        <td>{{$cate->category_name}}</td>
                        <td><a class="btn btn-square btn-outline-primary m-2" href="{{url('/admin/cate/update', [$cate->category_id])}}">
                            <i class="fas fa-edit"></i>
                        </a></td>
                        <td><a onclick="confirm('Bạn chắc chắn muốn xóa danh mục này ?')" class="btn btn-square btn-outline-danger m-2" href="{{url('/admin/cate/delete', [$cate->category_id])}}">
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