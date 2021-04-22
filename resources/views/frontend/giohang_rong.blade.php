@extends('layouts.frontend')
@section('content')
<!-- Breadcrumb Start -->
	<div class="breadcrumb-wrap">
		<div class="container-fluid">
			<ul class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Home</a></li>
				<li class="breadcrumb-item"><a href="#">Products</a></li>
				<li class="breadcrumb-item active">Cart</li>
			</ul>
		</div>
	</div>
	<!-- Breadcrumb End -->
	<!-- Cart Start -->
	<div class="main_content">
		<div class="section">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-8">
						<div class="text-center order_complete">
							<i class="fal fa-shopping-cart"></i>
							<div class="heading_s1">
								<h3>Giỏ hàng chưa có sản phẩm!</h3>
							</div>
							<p>Giỏ hàng của bạn đang rỗng, xin hãy lấp đầy nó bằng việc duyệt qua các sản phẩm của cửa hàng và bỏ vào giỏ các sản phẩm mà bạn yêu thích và có ý định sẽ sở hữu nó.</p>
							<a href="{{ route('frontend') }}" class="btn btn-fill-out">TIẾP TỤC MUA SẮM</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection		