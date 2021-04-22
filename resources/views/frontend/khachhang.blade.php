@extends('layouts.frontend')
@section('content')

	<!-- My Account Start -->
	<div class="my-account" style="min-height:700px;">
		<div class="container-fluid">
			<div class="row">

				<div class="col-md-3"style="min-height:400px;">
					<div class="account-box" style="margin-bottom: 30px;box-shadow: 0 0 20px rgb(0 0 0 / 30%);border-radius: 10px;">
                                <div class="service-box">
                                    <div class="service-desc">
                                        <h4> Xin chào {{ Auth::user()->name }}</h4>
                                        <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                                           <a class="nav-link active" id="dashboard-nav" data-toggle="pill" href="#dashboard-tab" role="tab"><i class="fa fa-tachometer-alt"></i>Dashboard</a>
						<a class="nav-link" id="lichsu-nav" data-toggle="pill" href="#lichsu-tab" role="tab"><i class="fa fa-history"></i> Lịch sử mua hàng</a>
						<a class="nav-link" id="order-nav" data-toggle="pill" href="#order-tab" role="tab"><i class="fa fa-credit-card"></i>Payment Method</a>
						<a class="nav-link" id="address-nav" data-toggle="pill" href="#address-tab" role="tab"><i class="fa fa-map-marker-alt"></i>address</a>
						<a class="nav-link" id="account-nav" data-toggle="pill" href="#account-tab" role="tab"><i class="fa fa-user"></i>Account Details</a>
						<a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-sign-out-alt"></i>Đăng xuất</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
				
					
				</div>
				
				
                   
				
				<div class="col-md-9" style="min-height:300px;">
					<div class="tab-content">
						
						<div class="tab-pane fade" id="order-tab" role="tabpanel" aria-labelledby="order-nav">
							<div class="table-responsive">
						 <table class="table">
                            <thead>
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Bảo hành</th>
                                    <th>Đơn giá</th>
									 <th>Thành tiền</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                               @foreach(Cart::content() as $value)
                                <tr>
                                    <td class="thumbnail-img">
                                <a href="#"><img class="img-fluid" src="{{  env('APP_URL') . '/storage/app/' . $value->options->image }}" alt="">
								</a>
                                    </td>
                                    <td class="name-pr">
                                        <a href="#">
									{{ $value->name }}
								</a>
                                    </td>
									<td>
									<a class="minus"  href="{{ route('frontend.giohang.giam', ['row_id' => $value->rowId]) }}"> - </a>
									<input type="text" disabled name="qty" value="{{ $value->qty }}"  />
									<a class="plus" href="{{ route('frontend.giohang.tang', ['row_id' => $value->rowId]) }}"> +</a>
									</td>
									<td class="baohanh-pr">
                                        <a href="#">
									{{ $value->baohanh }}
								</a>
                                    </td>
                                    <td class="price-pr">
                                        <p>{{ number_format($value->price) }}<sup>đ</sup></p>
                                    </td>
                                    
                                    <td class="total-pr">
                                        <p>{{number_format($value->price*$value->qty)}}<sup>đ</sup></p>
                                    </td>
                                    <td class="remove-pr">
                                        <a href="{{route('frontend.giohang.xoa',['row_id' => $value->rowId])}}">
									<i class="fas fa-times"></i>
								</a>
                                    </td>
                                </tr>
								@endforeach
                            </tbody>
                        </table>
						</div>
						</div>
						
						<div class="tab-pane fade" id="lichsu-tab" role="tabpanel" aria-labelledby="lichsu-nav">
							<div class="table-responsive">
								<table class="table table-bordered">
									<thead class="thead-dark">
										<tr>
											<th>No</th>
											<th>Sản phẩm</th>
											<th>Date</th>
											<th>Qty</th>
											<th>Price</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($ctdh as $value)
											<tr>
												<td>{{ $loop->iteration }}</td>
												<td>{{ $value->SanPham->tensanpham }}</td>
												<td>{{ $value->created_at }}</td>
												<td>{{ $value->soluongban }}</td>
												<td>{{ $value->dongiaban }}</td>
												<td>{{ $value->DonHang->tinhtrang }}</td>
												<td><button class="btn">View</button></td>
											</tr>
										@endforeach
									</tbody>

								</table>
							</div>
						</div>
						<div class="tab-pane fade" id="payment-tab" role="tabpanel" aria-labelledby="payment-nav">
							<h4>Payment Method</h4>
							<p>
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum quam ac mi viverra dictum. In efficitur ipsum diam, at dignissim lorem tempor in. Vivamus tempor hendrerit finibus. Nulla tristique viverra nisl, sit amet bibendum ante suscipit non. Praesent in faucibus tellus, sed gravida lacus. Vivamus eu diam eros. Aliquam et sapien eget arcu rhoncus scelerisque.
							</p> 
						</div>
						<div class="tab-pane fade" id="address-tab" role="tabpanel" aria-labelledby="address-nav">
							<h4>Address</h4>
							<div class="row">
								@csrf
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
                                <input type="text" class="form-control" name="address" placeholder=""value="{{ Auth::user()->address ?? '' }}" required>
                                <div class="invalid-feedback"> Vui lòng điền địa chỉ </div>
                            </div>
                            
                            </div>

                            <hr class="mb-1"> 
                   
							</div>
							</div>
						</div>
						<div class="tab-pane fade" id="account-tab" role="tabpanel" aria-labelledby="account-nav">
							<h4>Account Details</h4>
							<div class="row">
								<div class="col-md-6">
									<label>Họ và tên *</label>
										<input class="form-control" name="name"  type="text" value="{{ Auth::user()->name ?? '' }}"  required />
								</div>
								<div class="col-md-6">
									<input class="form-control" type="text" placeholder="Last Name">
								</div>
								<div class="col-md-6">
									<input class="form-control" type="text" placeholder="Mobile">
								</div>
								<div class="col-md-6">
									<input class="form-control" type="text" placeholder="Email">
								</div>
								<div class="col-md-12">
									<input class="form-control" type="text" placeholder="Address">
								</div>
								<div class="col-md-12">
									<button class="btn">Update Account</button>
									<br><br>
								</div>
							</div>
							<h4>Password change</h4>
							<div class="row">
								<div class="col-md-12">
									<input class="form-control" type="password" placeholder="Current Password">
								</div>
								<div class="col-md-6">
									<input class="form-control" type="text" placeholder="New Password">
								</div>
								<div class="col-md-6">
									<input class="form-control" type="text" placeholder="Confirm Password">
								</div>
								<div class="col-md-12">
									<button class="btn">Save Changes</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- My Account End -->
@endsection