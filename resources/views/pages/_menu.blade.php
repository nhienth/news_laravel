<?php
    use App\Models\Category;
    $cate = new Category();
    $listCate = $cate->GetAll();
?>

<div class="main-menu d-none d-md-block">
    <nav>                  
        <ul id="navigation">
            <li><a href="/">Trang chủ</a></li>
            @foreach($listCate as $cate)
                <li><a href="{{ url('/cat', [$cate->danhmuc_id]) }}">{{$cate->danhmuc_ten}}</a></li>
            @endforeach
            <!-- <li><a href="about.html">Giới thiệu</a></li>
            <li><a href="contact.html">Liên hệ</a></li> -->
        </ul>
    </nav>
</div>