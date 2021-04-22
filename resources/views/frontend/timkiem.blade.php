@extends('layouts.frontend')
@section('content')
	<!-- Phần tiêu đề và đường dẫn riêng của từng trang -->
	<div class="breadcrumb_section bg_gray page-title-mini">
		<div class="container">
			
		</div>
	</div>
	<!-- Nội dung riêng của từng trang -->
	 <div class="shop-box-inner">
        <div class="container">
            <div class="row">
                    <div class="right-product-box" >
                        <div class="product-item-filter row">
                            
                                
                            <div class="col-12 col-sm-4 text-center text-sm-right "style="margin-left:800px;">
                                <ul class="nav nav-tabs ml-auto">
                                    <li>
                                        <a class="nav-link active" href="#grid-view" data-toggle="tab"> <i class="fa fa-th"></i> </a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="#list-view" data-toggle="tab"> <i class="fa fa-list-ul"></i> </a>
                                    </li>
                                </ul>
                            </div>
                       

                        <div class="row product-categorie-box">
						  
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                    <div class="row">
								@foreach($sanpham as $value)
							@if($value->khuyenmai==0)
										 <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
										<div class="products-single fix">
											<div class="box-img-hover">
												
											<div class="type-lb">
												<p class="new">Mới</p>
											</div>
												<img src="{{ env('APP_URL') . '/storage/app/' . $value->hinhanh }}" height="300px" class="img-fluid" alt="Image">
											<div class="mask-icon">
												<ul>
													<li><a  href="{{ route('frontend.sanpham.chitiet', ['tenloai_slug' => $value->LoaiSanPham->tenloai_slug, 'tensanpham_slug' => $value->tensanpham_slug]) }}" data-toggle="tooltip" data-placement="right" title="Xem chi tiết"><i class="fas fa-search"></i></a></li>
													<li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
													<li><a href="#" data-toggle="tooltip" data-placement="right" title="Thích"><i class="far fa-heart"></i></a></li>
												</ul>
												<a class="cart" href="{{ route('frontend.giohang.them', ['tensanpham_slug' => $value->tensanpham_slug]) }}">Thêm vào giỏ</a>
											</div>
										</div>
										<div class="why-text">
											<h4 style="overflow: hidden;white-space: nowrap;text-overflow: ellipsis;">{{ $value->tensanpham }}</h4>
											<h5>
												<span class="flash-del">{{ number_format($value->dongia) }}<sup>đ</sup></span></h5>
											</div>
										</div>
														</div>
														@else
								<div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
									<div class="products-single fix">
										<div class="box-img-hover">
											
											
											<div class="type-lb">
												<p class="sale">Sale {{ ($value->khuyenmai)*100 }}<sup>%</sup></p>
											</div>
											<img src="{{ env('APP_URL') . '/storage/app/' . $value->hinhanh }}" height="200px" class="img-fluid" alt="Image">
											<div class="mask-icon">
												<ul>
													<li><a  href="{{ route('frontend.sanpham.chitiet', ['tenloai_slug' => $value->LoaiSanPham->tenloai_slug, 'tensanpham_slug' => $value->tensanpham_slug]) }}" data-toggle="tooltip" data-placement="right" title="Xem chi tiết"><i class="fas fa-search"></i></a></li>
													<li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
													<li><a href="#" data-toggle="tooltip" data-placement="right" title="Thích"><i class="far fa-heart"></i></a></li>
												</ul>
												<a class="cart" href="{{ route('frontend.giohang.them', ['tensanpham_slug' => $value->tensanpham_slug]) }}">Thêm vào giỏ</a>
											</div>
										</div>
										<div class="why-text">
											<h4 style="overflow: hidden;white-space: nowrap;text-overflow: ellipsis;">{{ $value->tensanpham }}</h4>
											<h5>
												<span class="flash-del"><del>{{ number_format($value->dongia) }}<sup>đ</sup></del></span>
												<span class="flash-sale">{{ number_format($value->dongia_km) }}<sup>đ</sup></span>
												
											</h5>
										</div>
									</div>
								</div>
											@endif
								@endforeach
							</div>
						
                                        
                                       
                                   
                                    </div>
                               
						<div role="tabpanel" class="tab-pane fade" id="list-view">
                                    <div class="list-view-box">
                                        <div class="row">
										@foreach($sanpham as $value)
							@if($value->khuyenmai==0)
										 <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
										<div class="products-single fix">
											<div class="box-img-hover">
												
											<div class="type-lb">
												<p class="new">Mới</p>
											</div>
												<img src="{{ env('APP_URL') . '/storage/app/' . $value->hinhanh }}" height="300px" class="img-fluid" alt="Image">
											<div class="mask-icon">
												<ul>
													<li><a  href="{{ route('frontend.sanpham.chitiet', ['tenloai_slug' => $value->LoaiSanPham->tenloai_slug, 'tensanpham_slug' => $value->tensanpham_slug]) }}" data-toggle="tooltip" data-placement="right" title="Xem chi tiết"><i class="fas fa-search"></i></a></li>
													<li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
													<li><a href="#" data-toggle="tooltip" data-placement="right" title="Thích"><i class="far fa-heart"></i></a></li>
												</ul>
												

											</div>
										</div>
										<div class="why-text">
											<h4 style="overflow: hidden;white-space: nowrap;text-overflow: ellipsis;">{{ $value->tensanpham }}</h4>
											<h5>
												<span class="flash-del">{{ number_format($value->dongia) }}<sup>đ</sup></span></h5>
											</div>
										</div>
														</div>
														@else
								<div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
									<div class="products-single fix">
										<div class="box-img-hover">
											
											
											<div class="type-lb">
												<p class="sale">Sale {{ ($value->khuyenmai)*100 }}<sup>%</sup></p>
											</div>
											<img src="{{ env('APP_URL') . '/storage/app/' . $value->hinhanh }}" height="200px" class="img-fluid" alt="Image">
											<div class="mask-icon">
												<ul>
													<li><a  href="{{ route('frontend.sanpham.chitiet', ['tenloai_slug' => $value->LoaiSanPham->tenloai_slug, 'tensanpham_slug' => $value->tensanpham_slug]) }}" data-toggle="tooltip" data-placement="right" title="Xem chi tiết"><i class="fas fa-search"></i></a></li>
													<li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
													<li><a href="#" data-toggle="tooltip" data-placement="right" title="Thích"><i class="far fa-heart"></i></a></li>
												</ul>
												
											</div>
										</div>
										<div class="why-text">
											<h4 style="overflow: hidden;white-space: nowrap;text-overflow: ellipsis;">{{ $value->tensanpham }}</h4>
											<h5>
												<span class="flash-del"><del>{{ number_format($value->dongia) }}<sup>đ</sup></del></span>
												<span class="flash-sale">{{ number_format($value->dongia_km) }}<sup>đ</sup></span>
												
											</h5>
										</div>
									</div>
								</div>
											@endif
								
                                            
                                            <div class="col-sm-6 col-md-6 col-lg-8 col-xl-8">
                                                <div class="why-text full-width">
                                                    <h4>{{$value->tensanpham}}</h4>
                                                    <h5><span class="flash-del"><del>{{ number_format($value->dongia) }}<sup>đ</sup></del></span>
													<span class="flash-sale">{{ number_format($value->dongia_km) }}<sup>đ</sup></span></h5>
                                                    <p>{{ $value->thongtinsanpham }}</p>
                                                    <a   class="btn btn-default hvr-hover btn-cart" href="{{ route('frontend.giohang.them', ['tensanpham_slug' => $value->tensanpham_slug]) }}">Thêm vào giỏ</a>
                                                </div>
												
                                            </div>
											@endforeach
                                        </div>
                                    </div>
                                </div>
							 </div>
								
                                
                        
                    </div>
                </div>
            </div>
        </div>
		</div>
		</div>
@endsection