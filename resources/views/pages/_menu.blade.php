@php
    use App\Models\Category;
    $allCate = Category::all()->sortDesc(); 
@endphp
<div class="main-menu d-none d-md-block">
    <nav>                  
        <ul id="navigation">
            <li><a href="/">Trang chủ</a></li>
            @foreach($allCate as $cate)
                <li><a href="{{ url('/cate', [$cate->category_id]) }}">{{$cate->category_name}}</a></li>
            @endforeach
        </ul>
    </nav>
</div>