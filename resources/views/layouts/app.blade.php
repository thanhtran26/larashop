<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Cửa hàng linh kiện Cảnh Toàn') }}</title>

    <!-- Scripts -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
	@yield('javascript')
	
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    

    <!-- Styles -->
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" >
	<link rel="stylesheet" href="{{ asset('public/css/fontawesome.css') }}" />
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('frontend') }}">
                    {{ config('app.name', 'Cửa hàng linh kiện Cảnh Toàn') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
					@if(Auth::user()->hasRole('admin'))
    {
                    <ul class="navbar-nav me-auto">
						<li class="nav-item">
							<a class="nav-link" href="{{ route('loaisanpham') }}"><i class="fal fa-fw fa-list"></i> Loại sản phẩm</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('hang') }}"><i class="fal fa-fw fa-list"></i> Hãng</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('sanpham') }}"><i class="fal fa-fw fa-cubes"></i> Sản Phẩm</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('thongso') }}">Thông số</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('chitietts') }}"> Chi tiêt kỹ thuật</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('slide') }}"><i class="fal fa-fw fa-cubes"></i> Slide</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('donhang') }}"><i class="fal fa-fw fa-file-invoice"></i> Đơn hàng</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('nguoidung') }}"><i class="fal fa-fw fa-users"></i> Tài khoản</a>
						</li>
					</ul>
	}				@else
	<ul class="navbar-nav me-auto">
						<li class="nav-item">
							<a class="nav-link" href="{{ route('loaisanpham') }}"><i class="fal fa-fw fa-list"></i> Loại sản phẩm</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('hang') }}"><i class="fal fa-fw fa-list"></i> Hãng</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('sanpham') }}"><i class="fal fa-fw fa-cubes"></i> Sản Phẩm</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('donhang') }}"><i class="fal fa-fw fa-file-invoice"></i> Đơn hàng</a>
						</li>
					</ul>
					@endif
                    <!-- Right Side Of Navbar -->
                    
					<ul class="navbar-nav ms-auto">
						@guest
							@if (Route::has('login'))
								<li class="nav-item">
									<a class="nav-link" href="{{ route('login') }}"><i class="fal fa-fw fa-sign-in-alt"></i> Đăng nhập</a>
								</li>
							@endif
							@if (Route::has('register'))
								<li class="nav-item">
									<a class="nav-link" href="{{ route('register') }}"><i class="fal fa-fw fa-user-plus"></i> Đăng ký</a>
								</li>
							@endif
						@else
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#nguoidung" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
									<i class="fal fa-fw fa-user-circle"></i> {{ Auth::user()->name }}
								</a>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
										<i class="fal fa-fw fa-power-off fa-fw"></i> Đăng xuất
									</a>
									<form id="logout-form" action="{{ route('logout') }}" method="post" class="d-none">
										@csrf
									</form>
								</div>
							</li>
						@endguest
					</ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
		<hr class="shadow-sm" />
		<footer>Bản quyền &copy; {{ date('Y') }} bởi lớp DH18TH2.</footer>
    </div>
</body>
</html>
