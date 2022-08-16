@extends('admin.master')
@section('main')
<div class="container-fluid pt-4 px-4">
    <div class="col-sm-12 col-xl-12">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Cập nhật danh mục</h6>
            <form action="{{url('admin/cate/update', [$cate->category_id])}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="category_name" class="form-label">Tên danh mục</label>
                    <input type="text" name="category_name" value="{{$cate->category_name}}" class="form-control" id="category_name">
                </div>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </form>
        </div>
    </div>
</div>
@endsection