@extends('layouts.frontend')
@section('content')
<div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Liên hệ</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active"> Liên hệ </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Contact Us  -->
    <div class="contact-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-12">
                    <div class="contact-info-left">
                        <h2>Thông tin liên hệ</h2>
                        <p> </p>
                        <ul>
                            <li>
                                <p><i class="fas fa-map-marker-alt"></i>18 Ung Văn Khiêm, Long Xuyên, An Giang </p>
                            </li>
                            <li>
                                <p><i class="fas fa-phone-square"></i>Điện thoại liên lạc: <a href="tel:+84 982 76 19 13">+84 982 76 19 13</a></p>
                            </li>
                            <li>
                                <p><i class="fas fa-envelope"></i>Email: <a href="mailto:louisthanh51@gmail.com">louisthanh51@gmail.com</a></p>
                            </li>
							<li>						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3924.627229108126!2d105.43015021535494!3d10.371661069368885!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x310a731e7546fd7b%3A0x953539cd7673d9e5!2zxJDhuqFpIGjhu41jIEFuIEdpYW5n!5e0!3m2!1svi!2s!4v1610350634824!5m2!1svi!2s" width="200" height="200" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
							</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8 col-sm-12">
                    <div class="contact-form-right">
                        <h2>Liên lạc</h2>
                        <p>Đóng góp ý kiến về công ty</p>
                        <form action="#" method="post" >
						@csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="hovaten" placeholder=" {{ Auth::user()->name }}" required data-error="Điền họ và tên">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" placeholder=" {{ Auth::user()->email }}"  class="form-control" name="mail" required data-error="Điền email">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control"  name="vande" placeholder="Tiêu đề" required data-error="Nhập tiêu đề">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control"  name="tinnhan" placeholder="Nội dung" rows="4" data-error="Điền nội dung" required></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="submit-button text-center">
                                        <button class="btn hvr-hover"  type="submit">Gửi</button>
                                        
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Cart -->
	
@endsection	