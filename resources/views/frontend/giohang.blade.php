
@extends('layouts.frontend')
@section('content')
    <div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
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
            </div>
            <div class="row my-5">
                <div class="col-lg-8 col-sm-12"></div>
                <div class="col-lg-4 col-sm-12">
                    <div class="order-box">
                        <h3>Thanh toán</h3>
                        <div class="d-flex gr-total">
                            <h5>Tổng tiền sản phẩm</h5>
                            <div class="ml-auto h5">{{Cart::priceTotal() }} </div>
                        </div>
                        <hr> </div>
                </div>
                <div class="col-12 d-flex shopping-box"><a href="{{route('frontend.dathang')}}" class="ml-auto btn hvr-hover">Thanh toán</a> </div>
            </div>

        </div>
    </div>

	
@endsection		