@extends('layouts.app')
@section('content')
	<div class="card">
		<div class="card-header">Thêm sản phẩm</div>
		<div class="card-body">
			<form action="{{ route('sanpham.them') }}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="mb-3">
					<label class="form-label" for="tensanpham">Tên sản phẩm</label>
					<input type="text" class="form-control @error('tensanpham') is-invalid @enderror" id="tensanpham" name="tensanpham" value="{{ old('tensanpham') }}" required />
					@error('tensanpham')
						<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
					@enderror
				</div>
				<div class="mb-3">
					<label class="form-label" for="loaisanpham_id">Loại sản phẩm</label>
					<select class="form-select @error('loaisanpham_id') is-invalid @enderror" id="loaisanpham_id" name="loaisanpham_id" required>
						<option value="">-- Chọn loại --</option>
						@foreach($loaisanpham as $value)
							<option value="{{ $value->id }}">{{ $value->tenloai }}</option>
						@endforeach
					</select>
					@error('loaisanpham_id')
						<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
					@enderror
				</div>
				<div class="mb-3">
					<label class="form-label" for="id_hang">Hãng</label>
					<select class="form-select @error('id_hang') is-invalid @enderror" id="id_hang" name="id_hang" required>
						<option value="">-- Chọn loại --</option>
						@foreach($hang as $value)
							<option value="{{ $value->id }}">{{ $value->tenhang }}</option>
						@endforeach
					</select>
					@error('id_hang')
						<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
					@enderror
				</div>
				<div class="mb-3">
					<label class="form-label" for="soluong">Số lượng</label>
					<input type="number" class="form-control @error('soluong') is-invalid @enderror" id="soluong" name="soluong" value="{{ old('soluong') }}" required />
					@error('soluong')
						<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
					@enderror
				</div>
				<div class="mb-3">
					<label class="form-label" for="dongia">Đơn giá</label>
					<input type="number" class="form-control @error('dongia') is-invalid @enderror" id="dongia" name="dongia" value="{{ old('dongia') }}" required />
					@error('dongia')
						<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
					@enderror
				</div>
				<div class="mb-3">
					<label class="form-label" for="khuyenmai">Khuyến mãi</label>
					<input type="text" class="form-control @error('khuyenmai') is-invalid @enderror" id="khuyenmai" name="khuyenmai" value="{{ old('khuyenmai') }}" required />
					@error('khuyenmai')
						<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
					@enderror
				</div>
				<div class="mb-3">
					<label class="form-label" for="dongia_km">Đơn giá khuyến mãi</label>
					<input type="number"  class="form-control @error('dongia_km') is-invalid @enderror" id="dongia_km" name="dongia_km" value="{{ old('dongia')-old('dongia')*old('khuyenmai') }}"/>
					@error('khuyenmai')
						<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
					@enderror
				</div>
				<div class="mb-3">
					<label class="form-label" for="baohanh">Bảo hành</label>
					<input type="text" class="form-control @error('baohanh') is-invalid @enderror" id="baohanh" name="baohanh" value="{{ old('baohanh') }}" required />
					@error('baohanh')
						<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
					@enderror
				</div>
				<div class="mb-3">
					<label class="form-label" for="hinhanh">Hình ảnh</label>
					<input type="file" class="form-control @error('hinhanh') is-invalid @enderror" id="hinhanh" name="hinhanh" value="{{ old('hinhanh') }}" required />
					@error('hinhanh')
						<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
					@enderror
				</div>
				<div class="mb-3">
					<label class="form-label" for="thongtinsanpham">Mô tả</label>
					<textarea class="form-control" id="thongtinsanpham" name="thongtinsanpham" value="{{ old('thongtinsanpham') }}" ></textarea>
				</div>
				<button type="submit" class="btn btn-primary"><i class="fal fa-save"></i> Thêm vào CSDL</button>
			</form>
		</div>
	</div>
@endsection