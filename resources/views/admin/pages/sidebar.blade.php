<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="index.html" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>NEWS</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="{{asset('assets_admin/img/'.Auth::user()->user_img)}}" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">{{Auth::user()->user_fullname}}</h6>
                <span>{{Auth::user()->user_rolename}}</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="index.html" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Bảng điều khiển</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-list-alt"></i>Danh mục</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{url('/admin/cate/add')}}" class="dropdown-item">Thêm mới</a>
                    <a href="{{url('/admin/cate/list')}}" class="dropdown-item">Danh sách</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-newspaper"></i>Bài viết</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{url('/admin/post/add')}}" class="dropdown-item">Thêm mới</a>
                    <a href="{{url('/admin/post/list')}}" class="dropdown-item">Danh sách</a>
                </div>
            </div>
            <a href="{{url('/admin/user/list')}}" class="nav-item nav-link"><i class="fas fa-user-circle"></i>Tài khoản</a>
            <a href="form.html" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Forms</a>
            <a href="table.html" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Tables</a>
            <a href="chart.html" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Charts</a>
        </div>
    </nav>
</div>