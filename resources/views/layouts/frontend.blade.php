<!DOCTYPE html>
<html lang="en">
	<!-- Phần head dùng chung -->
	
	<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>@yield('title', 'Trang chủ') - {{ config('app.name', 'Laravel') }}</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
	
    <link rel="stylesheet" href="{{ asset('public/css/bootstrap.min.css') }}">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{ asset('public/css/style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('public/css/responsive.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('public/css/custom.css') }}">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
	<body>
		<!-- Hiệu ứng tải trang -->
		<header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-danger navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-foods" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                   <a class="navbar-brand" href="{{ asset('/') }}"><img style="height:50px; width:400px;margin-left: -100px;"src="{{ asset('public/images/123.png') }}"class="logo" alt=""></a> 
                </div>
                <!-- End Header Navigation -->
				
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">

                        <li class="dropdown megamenu-fw">
                            <a href="#" class="nav-link" data-toggle="dropdown">Thương hiệu</a>
                            <ul class="dropdown-menu megamenu-content" role="menu">
                                <li>
                                    <div class="row">
                                       	@foreach($hang as $hxs)
                                        <div class="col-menu col-md-3">
										<h6 class="title" style="font-size:15px"><a class="dropdown-item nav-link nav_item" href="{{route('frontend.hang',$hxs->id)}}">{{$hxs->tenhang}}</a></h4>
										<hr>
                                            </div>
										
                                        <!-- end col-3 -->@endforeach	
                                    </div>
                                    <!-- end row -->
                                </li>
                            </ul>
                        </li>
						<li class="dropdown megamenu-fw">
                            <a href="#" class="nav-link " data-toggle="dropdown">Loại Phụ Kiện</a>
                            <ul class="dropdown-menu megamenu-content" role="menu">
                                <li>
                                    <div class="row">
                                       	@foreach($loaisanpham as $loai)
											<div class="col-menu col-md-3">
							
												<h6 class="title" style="font-size:15px"><a class="dropdown-item nav-link nav_item" href="{{route('frontend.loaisanpham',$loai->id)}}">{{$loai->tenloai}}</a></h6>
									
                                            
											<hr>
											</div>
                                        <!-- end col-3 -->
										@endforeach	
                                </div>
                                    <!-- end row -->
                                </li>
                            </ul>
                        </li>
                        
                        <li class="nav-item"><a class="nav-link" href="{{route('frontend.lienhe')}}">Liên hệ</a></li>
						@guest
						 @if (Route::has('login'))
						 <li class="nav-item">
							<a class="nav-link" href="{{  route('frontend.dangnhap') }}"> Đăng nhập</a></li>
						 @endif
						@if (Route::has('register'))
						 <li class="nav-item">
							<a class="nav-link" href="{{  route('frontend.dangky') }}"><i class="fa fa-sign-in"></i> Đăng ký</a>
						 </li>
						 @endif
						 @else
							@if(Auth::user()->hasRole('saler'))
						 <li class="dropdown">
							<a href="{{ route('login') }}" class="nav-link " data-toggle="dropdown"> {{ Auth::user()->name }}</a>
							<ul class="dropdown-menu">
							<a class="dropdown-item nav-link nav_item" href="{{ route('admin') }}">Quản lí trang web</a>
							<a class="dropdown-item nav-link nav_item" href="{{ route('khachhang') }}">Quản lí tài khoản</a>
							<li>
								<a class="dropdown-item nav-link nav_item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
									Đăng xuất
								</a>
								<form id="logout-form" action="{{ route('logout') }}" method="post" class="d-none">
									@csrf
								</form></li>
						</ul>
							</li>
								@elseif (Auth::user()->hasRole('admin'))
						 <li class="dropdown">
							<a href="{{ route('login') }}" class="nav-link " data-toggle="dropdown"> {{ Auth::user()->name }}</a>
							<ul class="dropdown-menu">
							<a class="dropdown-item nav-link nav_item" href="{{ route('admin') }}">Quản lí trang web</a>
							<a class="dropdown-item nav-link nav_item" href="{{ route('khachhang') }}">Quản lí tài khoản</a>
							<li>
								<a class="dropdown-item nav-link nav_item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
									Đăng xuất
								</a>
								<form id="logout-form" action="{{ route('logout') }}" method="post" class="d-none">
									@csrf
								</form></li>
						</ul>
							</li>
							@else
							<li class="dropdown">
								<a href="{{ route('login') }}" class="nav-link " data-toggle="dropdown"> {{ Auth::user()->name }}</a>
								<ul class="dropdown-menu">
								<a class="dropdown-item nav-link nav_item" href="{{ route('khachhang') }}">Quản lí tài khoản</a>
								<li>
									<a class="dropdown-item nav-link nav_item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
										Đăng xuất
									</a>
									<form id="logout-form" action="{{ route('logout') }}" method="post" class="d-none">
										@csrf
									</form></li>
							</ul>
								</li>
								@endif
						 @endguest
                    </ul>
					
                </div>
				
                <!-- /.navbar-collapse -->

                <!-- Start Atribute Navigation -->
                <div class="attr-nav ">
                    <ul>
                        <li class="search"><a href="#"><i style="color:white;"class="fa fa-search"></i></a></li>
                        <li class="side-menu"><a href="#">
						<i  style="color:white;" class="fa fa-shopping-bag"></i>
                            <span class="badge">({{ Cart::count() ?? 0 }})</span>
					</a></li>
					
                    </ul>
                </div>
                        	
                <!-- End Atribute Navigation -->
            </div>
            <!-- Start Side Menu -->
            <div class="side">
			@if(Cart::count())
                <a href="#" class="close-side"><i class="fa fa-times"></i></a>
                <li class="cart-box">
                    <ul class="cart-list">
					@foreach(Cart::content() as $value)
                        <li>
                            <a href="#" class="photo"><img src="{{ env('APP_URL') . '/storage/app/' . $value->options->image }}" class="cart-thumb" alt="" /></a>
                            <h6><a href="#">{{$value->name }} </a></h6>
							<span class="cart_quantity"> {{ $value->qty }} x <span class="cart_amount">{{ number_format($value->price) }}đ</span></span>
							
                        </li>
                     @endforeach   
					 <li class="total">
                            
                            <span class="float-right"><strong>Tổng tiền sản phẩm</strong>:{{Cart::priceTotal() }}</span>
							<a href="{{ route('frontend.giohang') }}" class="btn btn-default hvr-hover btn-cart">GIỎ HÀNG</a>
                        </li>
                    </ul>
                </li>
				@endif
            </div>
            <!-- End Side Menu -->
			    <!-- End Top Search -->
        </nav>

		
        <!-- Nav Bar End -->  
			<!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
		 <form role="search"method="get"id="searchform"action="{{route('frontend.timkiem')}}">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control"value=""name="key" id="s"placeholder="Nhập từ khóa">
				
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>    </form>   
            </div>
       
    </div>
        
        <!-- Bottom Bar Start -->
        
		
        <!-- End Navigation -->
    </header>


		@yield('content')
		
  

    <!-- Start Footer  -->
    <footer >
        <div class="footer-main" style="background:#dc3545;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-widget">
                            <h4>Linh kiện máy tính cảnh toàn</h4>
							<ul>
							<img src="{{ asset('public/images/123.png') }}"style="height:50px ;width:90%;"class="logo" alt="">
							<li>
                                </li>
							</ul>		
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link">
                            <h4>Bản đồ chỉ đường đi</h4>
                            <ul>
                                
						<div class="contact-map">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3924.53192602825!2d105.43961194989343!3d10.379260269201707!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x310a72e335722aa9%3A0x445c13e86d459082!2zU8OgbiBnaWFvIGThu4tjaCBCxJBTIEPhuqNuaCBUb8OgbiAoY2FuaHRvYW5sYW5kKQ!5e0!3m2!1svi!2s!4v1617730969101!5m2!1svi!2s" width="300" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
						</div>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link-contact">
                            <h4>Thông tin cửa hàng</h4>
                            <ul>
                                <li>
                                    <p><i class="fas fa-map-marker-alt"></i>Số 38-40 Hùng Vương<br>, Tp. Long Xuyên<br>, An Giang </p>
                                </li>
                                <li>
                                    <p><i class="fas fa-phone-square"></i>Phone: <a href="tel:+84982761913">+84 982 76 19 13</a></p>
                                </li>
                                <li>
                                    <p><i class="fas fa-envelope"></i>Email: <a href="mailto:louisthanh51@gmail.com">louisthanh51@gmail.com</a></p>
                                </li>
								<li><p><i class="fab fa-facebook" aria-hidden="true"></i><a href="https://www.facebook.com/canhtoan.vn">Công ty Cổ phần Cảnh Toàn</a></p>
								</li>
								
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer  -->
<!-- Messenger Plugin chat Code -->
    <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v10.0'
          });
        };

        (function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
      </script>

      <!-- Your Plugin chat code -->
      <div class="fb-customerchat"
        attribution="biz_inbox"
        page_id="107274634827903">
      </div>
    <!-- Start copyright  -->
    <div class="footer-copyright">
        <p class="footer-company">All Rights Reserved. &copy; 2018 <a href="#">ThewayShop</a> Design By :
            <a href="https://html.design/">html design</a></p>
    </div> 
		<!-- Nút quay về đầu trang -->
		<a href="#" id="back-to-top" title="Back to top" style=" left : 0px ;display: none;">&uarr;</a>

    <!-- ALL JS FILES -->
    <script src="{{ asset('public/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('public/js/popper.min.js') }}"></script>
    <script src="{{ asset('public/js/bootstrap.min.js') }}"></script>
    <!-- ALL PLUGINS -->
    <script src="{{ asset('public/js/jquery.superslides.min.js') }}"></script>
    <script src="{{ asset('public/js/bootstrap-select.js') }}"></script>
    <script src="{{ asset('public/js/inewsticker.js') }}"></script>
    <script src="{{ asset('public/js/bootsnav.js.') }}"></script>
    <script src="{{ asset('public/js/images-loded.min.js') }}"></script>
    <script src="{{ asset('public/js/isotope.min.js') }}"></script>
    <script src="{{ asset('public/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('public/js/baguetteBox.min.js') }}"></script>
    <script src="{{ asset('public/js/form-validator.min.js') }}"></script>
    <script src="{{ asset('public/js/contact-form-script.js') }}"></script>
    <script src="{{ asset('public/js/custom.js') }}"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
	
	</body>
</html>