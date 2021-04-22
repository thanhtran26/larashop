@extends('layouts.app')
@section('content')
	<div class="card">
		<div class="card-header">Sửa thông tin sản phẩm</div>
		<div class="card-body">
			<form action="{{ route('sanpham.sua', ['id' => $sanpham->id]) }}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="mb-3">
					<label class="form-label" for="tensanpham">Tên sản phẩm</label>
					<input type="text" class="form-control @error('tensanpham') is-invalid @enderror" id="tensanpham" name="tensanpham" value="{{ $sanpham->tensanpham }}" required />
					@error('tensanpham')
						<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
					@enderror
				</div>
				<div class="mb-3">
					<label class="form-label" for="loaisanpham_id">Loại sản phẩm</label>
					<select class="form-select @error('loaisanpham_id') is-invalid @enderror" id="loaisanpham_id" name="loaisanpham_id" required>
						<option value="">-- Chọn loại --</option>
						@foreach($loaisanpham as $value)
							<option value="{{ $value->id }}" {{ ($sanpham->loaisanpham_id == $value->id) ? 'selected' : '' }}>{{ $value->tenloai }}</option>
						@endforeach
					</select>
					@error('loaisanpham_id')
						<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
					@enderror
				</div>
				<div class="mb-3">
					<label class="form-label" for="id_hang">Tên hãng</label>
					<select class="form-select @error('id_hang') is-invalid @enderror" id="id_hang" name="id_hang" required>
						<option value="">-- Chọn loại --</option>
						@foreach($hang as $value)
							<option value="{{ $value->id }}" {{ ($sanpham->id_hang == $value->id) ? 'selected' : '' }}>{{ $value->tenhang }}</option>
						@endforeach
					</select>
					@error('id_hang')
						<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
					@enderror
				</div>
				
				<div class="mb-3">
					<label class="form-label" for="soluong">Số lượng</label>
					<input type="number" class="form-control @error('soluong') is-invalid @enderror" id="soluong" name="soluong" value="{{ $sanpham->soluong }}" required />
					@error('soluong')
						<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
					@enderror
				</div>
				<div class="mb-3">
					<label class="form-label" for="dongia">Đơn giá</label>
					<input type="number" class="form-control @error('dongia') is-invalid @enderror" id="dongia" name="dongia" value="{{ $sanpham->dongia }}" required />
					@error('dongia')
						<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
					@enderror
				</div>
				<div class="mb-3">
					<label class="form-label" for="khuyenmai">Khuyến mãi</label>
					<input type="text" class="form-control @error('khuyenmai') is-invalid @enderror" id="khuyenmai" name="khuyenmai" value="{{ $sanpham->khuyenmai }}" required />
					@error('khuyenmai')
						<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
					@enderror
				</div>
				
				<div class="mb-3">
					<label class="form-label" for="baohanh">Bảo hành</label>
					<input type="text" class="form-control @error('baohanh') is-invalid @enderror" id="baohanh" name="baohanh" value="{{ $sanpham->baohanh }}" required />
					@error('baohanh')
						<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
					@enderror
				</div>
				<div class="mb-3">
					@if(!empty($sanpham->hinhanh))
						<img class="d-block rounded" src="{{ env('APP_URL') . '/storage/app/' . $sanpham->hinhanh }}" width="100" />
						<span class="d-block small text-danger">Bỏ trống nếu muốn giữ nguyên ảnh cũ.</span>
					@endif
					<input type="file" class="form-control @error('hinhanh') is-invalid @enderror" id="hinhanh" name="hinhanh" value="{{ $sanpham->hinhanh }}"  />
					@error('hinhanh')
						<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
					@enderror
				</div>
				<div class="mb-3">
					<label class="form-label" for="thongtinsanpham">Mô tả</label>
					<textarea class="form-control" id="thongtinsanpham" name="thongtinsanpham" value="{{ $sanpham->thongtinsanpham }}" ></textarea>
				</div>
				<button type="submit" class="btn btn-primary"><i class="fal fa-save"></i> Cập nhật</button>
			</form>
		</div>
	</div>
@endsection