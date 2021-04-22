@extends('layouts.frontend')
@section('content')
	<!-- Breadcrumb Start -->

	<!-- Breadcrumb End -->
	<div class="col-lg-6">
		@guest
			<div class="toggle_info">
				<span>
					<i class="fas fa-user"></i>Đã từng đăng ký?
					<a href="#loginform" data-toggle="collapse" class="collapsed" aria-expanded="false">Nhấn vào để đăng nhập</a>
				</span>
			</div>
			<div class="panel-collapse collapse login_form" id="loginform">
				<div class="panel-body">
					<p>Nếu bạn đã đăng ký tài khoản, xin vui lòng đăng nhập.</p>
					<form action="{{ route('login') }}" method="post">
						@csrf
						<div class="form-group">
							<input type="text" class="form-control{{ ($errors->has('email') || $errors->has('username')) ? ' is-invalid' : '' }}"
								name="email" value="{{ old('email') }}" placeholder="Tên đăng nhập hoặc Email *" required />
							@if ($errors->has('email') || $errors->has('username'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ empty($errors->first('email')) ? $errors->first('username') : $errors->first('email') }}</strong>
								</span>
							@endif
						</div>
						<div class="form-group">
							<input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Mật khẩu *" required />
							@error('password')
								<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
							@enderror
						</div>
						<div class="login_footer form-group">
							<div class="chek-form">
								<div class="custome-checkbox">
									<input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
									<label class="form-check-label" for="remember"><span>Nhớ thông tin đăng nhập</span></label>
								</div>
							</div>
							<a href="#">Quên mật khẩu?</a>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-fill-out btn-block">ĐĂNG NHẬP</button>
						</div>
					</form>
				</div>
			</div>
			@else
			<div class="toggle_info text-center">
				<span><i class="fas fa-user"></i>Bạn đã đăng nhập với tài khoản khách hàng <strong>{{ Auth::user()->name }}</strong>.</span>
			</div>
		@endguest
	</div>
	<!-- Checkout Start -->
	    <div class="cart-box-main">
        <div class="container">  
		<form action="#" method="post"   class="needs-validation" novalidate>
		@csrf
            <div class="row">
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="checkout-address">
                        <div class="title-left">
                            <h3>Địa chỉ giao hàng</h3>
                        </div>
                      
								<div class=" mb-3">
										<label>Họ và tên *</label>
										<input class="form-control" name="name"  type="text" value="{{ Auth::user()->name ?? '' }}"  required />
									</div>
                            <div class="mb-3">
										<label>E-mail *</label>
										<input class="form-control" name="emailgiaohang" type="text" value="{{ Auth::user()->email ?? '' }}" >
                            </div>
							<div class="mb-3">
										<label>Số điện thoại *</label>
										<input class="form-control" name="dienthoaikhachhang" type="text" value="{{ Auth::user()->sdt ?? '' }}" >
                            </div>
                            <div class="mb-3">
                                <label for="address">Địa chỉ giao hàng</label>
                                <input type="text" class="form-control" name="address" placeholder="" required>
                                <div class="invalid-feedback"> Vui lòng điền địa chỉ </div>
                            </div>
                            
                           

                            <hr class="mb-1"> 
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="shipping-method-box">
                                <div class="title-left">
                                    <h3>Phí vận chuyển</h3>
                                </div>
                                <div class="mb-4">
                                    <div class="custom-control custom-radio">
                                        
                                        <label class="custom-control-label" for="shippingOption3">Phí vận chuyển</label> <span class="float-right font-weight-bold">Free</span> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="odr-box">
                                <div class="title-left">
                                    <h3>Shopping cart</h3>
                                </div>@foreach(Cart::content() as $value)
                                <div class="rounded p-2 bg-light">
                                    
                                    <div class="media mb-2">
                                        <div class="media-body"> <a href="detail.html">{{ $value->name }}</a>
                                            <div class="small text-muted">{{number_format($value->price)}} <span class="mx-2">|</span> {{ $value->qty }} <span class="mx-2">|</span> Tổng tiền sản phẩm: {{ number_format($value->price * $value->qty) }}<sup>đ</sup></div>
                                        </div>
                                    </div>
									
										
									
                                </div>
								@endforeach
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="order-box">
                                <div class="title-left">
                                    <h3>Đơn hàng của bạn</h3>
                                </div>
                                <div class="d-flex">
                                    <div class="font-weight-bold">Product</div>
                                    <div class="ml-auto font-weight-bold">Total</div>
                                </div>
                                <hr class="my-1">
                                
                                <div class="d-flex">
                                    <h4>Shipp</h4>
                                    <div class="ml-auto font-weight-bold"> Free </div>
                                </div>
                                <hr>
                                <div class="d-flex gr-total">
                                    <h5>{{Cart::priceTotal() }}</h5>
                                    <div class="ml-auto h5">  </div>
                                </div>
                                <hr> </div>
                        </div>
                        <div class="col-12 d-flex shopping-box"> <button style="submit"  class="ml-auto btn hvr-hover">Thanh toán</button> </div>
                    </div>
                </div>
            </div>
</form>
        </div>
    </div>
<!-- Checkout End -->
@endsection		