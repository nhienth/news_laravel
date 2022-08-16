@extends('admin.master')
@section('main')
<div class="container-fluid pt-4 px-4">
    <div class="col-sm-12 col-xl-12">
        <div class="bg-light rounded h-100 p-4">
            <h2 class="mb-4">Thêm tin tức</h2>
            <form action="{{url('admin/post/add')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="news_title" class="form-label">Tiêu đề</label>
                    <input type="text" name="news_title" class="form-control" id="news_title">
                </div>
                <div class="mb-3">
                    <label for="news_summary" class="form-label">Tóm tắt</label>
                    <textarea name="news_summary" id="news_summary" rows="3" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label for="news_img" class="form-label">Hình</label>
                    <input class="form-control" name="news_img" type="file" id="news_img" multiple>
                </div>
                <div class="mb-3">
                    <label for="news_content" class="form-label">Nội dung</label>
                    <textarea name="news_content" id="summernote"></textarea>
                </div>
                <div>
                    <label for="category_id" class="form-label">Thể loại tin</label>
                    <select class="form-select mb-3" id="category_id" name="category_id" aria-label="Default select example">
                        <option selected>Chọn thể loại tin</option>
                        @foreach ($allCates as $cate)
                            <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>                         
                        @endforeach
                    </select>
                </div>
                <fieldset class="row mb-3">
                    <legend class="col-form-label col-sm-2 pt-0">Trạng thái</legend>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="news_status"
                                id="gridRadios1" value="1" checked>
                            <label class="form-check-label" for="gridRadios1">
                                Công khai
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="news_status"
                                id="gridRadios2" value="0">
                            <label class="form-check-label" for="gridRadios2">
                                Ẩn
                            </label>
                        </div>
                    </div>
                </fieldset>
                <button type="submit" class="btn btn-primary">Thêm</button>
            </form>
        </div>
    </div>
</div>
<script>
    $('#summernote').summernote({
      placeholder: 'Nội dung bài viết',
      tabsize: 2,
      height: 300
    });
  </script>
@endsection