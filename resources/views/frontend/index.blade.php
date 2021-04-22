@extends('layouts.frontend')
@section('content')
<!-- Phần tiêu đề và đường dẫn riêng của từng trang -->
<!-- Start Slider -->
<div class="container">
		<div class="row">
				<div id="slides" class="carousel slide d-none d-lg-block" data-ride="carousel">
					<a href="{{ route('frontend.sanpham') }}">
					<ul class="carousel-indicators">
						<li data-target="#slides" data-slide-to="0" class="active"></li>
						<li data-target="#slides" data-slide-to="1"></li>
						<li data-target="#slides" data-slide-to="2"></li>
					</ul>
					<div class="carousel-inner" >
						<div class="carousel-item active ">
							
							<img style="height: 400px;width:100%;"  src="{{ asset('public/images/slideshow_1.jpg')}}">
							
						</div>
						<div class="carousel-item">
							<img style="height: 400px;width:100%;"  src="{{ asset('public/images/slideshow_2.jpg')}}">
						</div>
						<div class="carousel-item">
							<img style="height: 400px;width:100%;"  src="{{ asset('public/images/slideshow_3.jpg')}}">
						</div>
					</div>
					<a class="carousel-control-prev" href="#slides" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#slides" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
					</a>
					</a>
			</div>	
		</div>	
	</div>
<div id="sticky-banner"style=" position: fixed; left: 10px; right: 0; top: 175px;margin: auto;z-index: 99999;width: 1650px;">
	<div id="sticky-banner-target">
		<div class="large">
			<a style="position: absolute;left:-10px;"href="{{$slide->link}}" target="_blank" class="left">
				<img src="{{env('APP_URL') . '/storage/app/' . $slide->hinhanh  }}"style="min-height:400px; width:150px;"></a>
			<a style="position: absolute;right: 220px;"href="{{$slide2->link}}" target="_blank" class="right">
				<img src="{{env('APP_URL') . '/storage/app/' . $slide2->hinhanh  }}" style="min-height:400px; width:150px;"></a>
		</div>
	</div>
</div>


<!-- End Slider -->	
<hr>

<hr>
<!-- Nội dung riêng của từng trang -->
<div class="products-box" style="background:#fff;padding:0 auto;">
	<div class="title-all text-center">
        <h1>SẢN PHẨM ĐANG KHUYẾN MÃI</h1>
    </div>
    <div class="container "style="background-color:#dc3545;margin-bottom: 30px;box-shadow: 0 0 20px rgb(0 0 0 / 30%);border-radius: 10px;">
        <div class="row ">
            @foreach($sanpham_km as $value)
            @if($value->khuyenmai!=0)
            <div class="col-lg-3 col-md-6" style="margin-top: 30px;box-shadow: 0 0 20px rgb(0 0 0 / 20%);">
                <div class="products-single fix">
                    <div class="box-img-hover" style="height:250px;width:255px;">
                        <div class="type-lb">
                            <p class="sale">Sale {{ ($value->khuyenmai)*100 }}<sup>%</sup></p>
                        </div>
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
                    <div class="why-text"style="background:#343a40;">
					<a href="{{ route('frontend.sanpham.chitiet', ['tenloai_slug' => $value->LoaiSanPham->tenloai_slug, 'tensanpham_slug' => $value->tensanpham_slug]) }}">
                        <h4 style="overflow: hidden;white-space: nowrap;text-overflow: ellipsis;color:#fff;">{{ $value->tensanpham }}</h4>
                        <h5 style="color:#fff;">
                            <span class="flash-del"><del>{{ number_format($value->dongia) }}<sup>đ</sup></del></span>
                            <span class="flash-sale">{{ number_format($value->dongia-$value->dongia*$value->khuyenmai) }}<sup>đ</sup></span>
                        </h5>
						</a>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
	<div class="container">
        <div class="row" style="text-align: center;
    box-shadow: 0 0 10px rgb(0 0 0 / 20%);
    padding: 40px 20px;
    border-radius: 10px;">
            @foreach($hang as $hang)
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
                <div class="shop-cat-box " style=" border-color: red; height:120px;width:250px;border-radius: 20px;text-align:center;">
                     <a href="{{route('frontend.hang',$hang->id)}}"><img style="height:120px;width:260px;"class="img-fluid" src="{{ env('APP_URL') . '/storage/app/' . $hang->hinhanh }}" alt="Image"/>
                  </a>
                </div>
            </div>
            @endforeach	
        </div>
    </div>
    <div class="title-all text-center">
        <h1>SẢN PHẨM NỔI BẬT</h1>
    </div>
    <div class="container "style="margin-bottom: 30px;box-shadow: 0 0 20px rgb(0 0 0 / 30%);border-radius: 10px;">
        <div class="row">
            @foreach($sanpham as $value)
            @if($value->khuyenmai==0)
            <div class="col-lg-3 col-md-6" style="margin-top: 30px;box-shadow: 0 0 20px rgb(0 0 0 / 30%);">
                <div class="products-single fix">
                    <div class="box-img-hover"style="height:300px;width:255px;">
                        <img src="{{ env('APP_URL') . '/storage/app/' . $value->hinhanh }}"  class="img-fluid" alt="Image">
                        <div class="mask-icon">
                            <ul>
                                <li><a  href="{{ route('frontend.sanpham.chitiet', ['tenloai_slug' => $value->LoaiSanPham->tenloai_slug, 'tensanpham_slug' => $value->tensanpham_slug]) }}" data-toggle="tooltip" data-placement="right" title="Xem chi tiết"><i class="fas fa-search"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Thích"><i class="far fa-heart"></i></a></li>
                            </ul>
							<a class="cart" href="{{ route('frontend.giohang.them', ['tensanpham_slug' => $value->tensanpham_slug]) }}">Thêm vào giỏ</a>
                        </div>
                    </div>
                    <div class="why-text" style="background:#dc3545;" >
					<a  href="{{ route('frontend.sanpham.chitiet', ['tenloai_slug' => $value->LoaiSanPham->tenloai_slug, 'tensanpham_slug' => $value->tensanpham_slug]) }}">
                        <h4  href="{{ route('frontend.sanpham.chitiet', ['tenloai_slug' => $value->LoaiSanPham->tenloai_slug, 'tensanpham_slug' => $value->tensanpham_slug]) }}"style="overflow: hidden;white-space: nowrap;text-overflow: ellipsis;color:#fff;">{{ $value->tensanpham }}</h4>
                        <h5 style="color:#fff;">
                            <span class="flash-sale">{{ number_format($value->dongia_km) }}<sup>đ</sup></span>
                        </h5>
						</a>
                    </div>
                </div>
            </div>
            @else
            <div class="col-lg-3 col-md-6"style="margin-top: 30px;box-shadow: 0 0 20px rgb(0 0 0 / 30%);">
                <div class="products-single fix">
                    <div class="box-img-hover" style="height:300px;width:255px;">
                        <div class="type-lb">
                            <p class="sale">Sale {{ ($value->khuyenmai)*100 }}<sup>%</sup></p>
                        </div>
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
                    <div class="why-text" style="background:#dc3545;">
					<a  href="{{ route('frontend.sanpham.chitiet', ['tenloai_slug' => $value->LoaiSanPham->tenloai_slug, 'tensanpham_slug' => $value->tensanpham_slug]) }}">
                         <h4 style="overflow: hidden;white-space: nowrap;text-overflow: ellipsis;color:#fff;">{{ $value->tensanpham }}</h4>
                        <h5 style="color:#fff;">
                            <span class="flash-del"><del>{{ number_format($value->dongia) }}<sup>đ</sup></del></span>
                            <span class="flash-sale">{{ number_format($value->dongia_km) }}<sup>đ</sup></span>
                        </h5></a>                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
   
</div>
@endsection