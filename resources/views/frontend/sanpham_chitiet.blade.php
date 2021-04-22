@extends('layouts.frontend')
@section('content')

 
	<hr>
	    <div class="shop-detail-box-main"style="padding:0 0;">
        <div class="container" >
            <div class="row" style="box-shadow: 0 0 20px rgb(0 0 0 / 10%);border-radius: 10px;">
                <div class="col-xl-5 col-lg-5 col-md-6">
                    <img src="{{ env('APP_URL') . '/storage/app/' . $sanpham->hinhanh }}"width="100%"/>
								<a href="#" class="product_img_zoom" title="Zoom">
									<span class="linearicons-zoom-in"></span>
								</a>
                </div>
				
                <div class="col-xl-7 col-lg-7 col-md-6 pt-3">
                    <div class="single-product-details">
                        <h2>{{$sanpham->tensanpham}}</h2>
						
						@if($sanpham->khuyenmai==0)
						<h5>{{number_format($sanpham->dongia_km)}}<sup>đ</sup></h5>
						@else
                        <h4> <del>{{number_format($sanpham->dongia)}}<sup>đ</sup></del> Giảm {{$sanpham->khuyenmai*100}}<sup>%</sup></h4>
						<h5>{{number_format($sanpham->dongia_km)}}<sup>đ</sup></h5>
						@endif
                        <p class="available-stock"><span> Số lượng còn lại <a href="#">{{$sanpham->soluong}}</a></span></p>
						<p class="available-stock"><span> Hang <a href="#">{{$sanpham->Hang->tenhang}}</a></span></p>
						<p class="available-stock"><span> loai <a href="#">{{$sanpham->LoaiSanPham->tenloai}}</a></span></p>
                            							<h5>Thời gian bảo hành : {{$sanpham->baohanh}}</h5>
							
					
							
                               <p>
							<div class="single-item-options">
							<select class="wc-select" name="color">
								<option>So luong</option>
								<option value="1">1</option>
								<option value="1">2</option>
								<option value="1">3</option>
								<option value="1">4</option>
								<option value="1">5</option>
								<option value="1">6</option>
								<option value="1">7</option></select>
							</div>
							
                                <div class="price-box-bar">
                                    <div class="cart-and-bay-btn">
                                        <a class="btn hvr-hover" data-fancybox-close="" href="{{ route('frontend.giohang.them', ['tensanpham_slug' => $sanpham->tensanpham_slug]) }}">Thêm vào giỏ hàng</a>
                                        <a class="btn hvr-hover" data-fancybox-close="" href="{{ route('frontend.dathang') }}">Mua ngay</a>
                                    </div>
                                </div>
							</p>
							
                    </div>
                </div>
					</div>
					<hr>
						<ul class="nav nav-tabs">
                                    <li>
                                        <a class="nav-link active" href="#Description" data-toggle="tab">Thông tin sản phẩm </a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="#Additional-info" data-toggle="tab">Thông số kỹ thuật </a>
                                    </li>
                                </ul>
								
							
							<div class="tab-content shop_info_tab"style="padding:20px;box-shadow: 0 0 20px rgb(0 0 0 / 10%);border-radius: 10px;height:200px;">
								<div class="tab-pane fade show active" id="Description" role="tabpanel" aria-labelledby="Description-tab">
									<p>{{$sanpham->thongtinsanpham}}</p>
								</div>
								<div class="tab-pane fade" id="Additional-info" role="tabpanel" aria-labelledby="Additional-info-tab">
									<table class="table table-bordered">
										<tr>
										@foreach($thongso_sp as $value)
											<th>{{$value->tenthongso}}</th>
											
										
										@endforeach
										<tr>
										@foreach($chitiet_ts as $value)
											<td>{{$value->ts}}</td>
											
										@endforeach
										</tr>
									</table>
								</div>
							</div>
							<hr>
            <div class="row my-5">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Sản Phẩm Liên Quan</h1>
                    </div>
                    <div class="featured-products-box owl-carousel owl-theme">
					@foreach($sp_lienquan as $value)
                        <div class="item">
                            <div class="products-single fix">
                                <div class="box-img-hover" style="height:300px;width:255px;">
                                    <img src="{{ env('APP_URL') . '/storage/app/' . $value->hinhanh }}" class="img-fluid" alt="Image">
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
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
	<hr>

					
				


@endsection