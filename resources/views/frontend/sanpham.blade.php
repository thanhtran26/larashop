@extends('layouts.frontend')
@section('content')

 <div class="shop-box-inner">
        <div class="container">
            <div class="row">
                    <div class="right-product-box" >
                        <div class="product-item-filter row">
                            
                                <div class="col-12 col-sm-4 text-center text-sm-left">
								 <div class="custom_select">
								 <form action="{{ route('frontend.sanpham') }}" method="post">
								 @csrf
								 <select class="form-control form-control-sm" id="sapxep" name="sapxep" onchange="if(this.value != 0) { this.form.submit(); }">
								 <option value="default" {{ session('sapxep') == 'default' ? 'selected' : '' }}>Sắp xếp mặc định</option>
								 <option value="popularity" {{ session('sapxep') == 'popularity' ? 'selected' : '' }}>Mua nhiều nhất</option>
								 <option value="date" {{ session('sapxep') == 'date' ? 'selected' : '' }}>Hàng mới nhất</option>
								 <option value="price" {{ session('sapxep') == 'price' ? 'selected' : '' }}>Xếp theo giá: thấp đến cao</option>
								 <option value="price-desc" {{ session('sapxep') == 'price-desc' ? 'selected' : '' }}>Xếp theo giá: cao xuống thấp</option>
								 </select>
								 </form>
								 </div>
								</div>

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
												<img src="{{ env('APP_URL') . '/storage/app/' . $value->hinhanh }}"style="height:300px;" class="img-fluid" alt="Image">
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
											<img src="{{ env('APP_URL') . '/storage/app/' . $value->hinhanh }}"style="height:300px;" class="img-fluid" alt="Image">
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
											<div class="box-img-hover"style="height:380px;">
												
											<div class="type-lb">
												<p class="new">Mới</p>
											</div>
												<img src="{{ env('APP_URL') . '/storage/app/' . $value->hinhanh }}"style="min-height:380px;" class="img-fluid" alt="Image">
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
										<div class="box-img-hover" style="min-height:380px;">
											
											
											<div class="type-lb">
												<p class="sale">Sale {{ ($value->khuyenmai)*100 }}<sup>%</sup></p>
											</div>
											<img src="{{ env('APP_URL') . '/storage/app/' . $value->hinhanh }}"style="height:380px;" class="img-fluid" alt="Image">
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
                                                <div class="why-text full-width"style="height:370px;"> 
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
								
                                
                        
                    </div>{{$sanpham->links()}}
                </div>
            </div>
        </div>
		</div>
		</div>
@endsection