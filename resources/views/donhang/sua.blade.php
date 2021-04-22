@extends('layouts.app')
@section('content')
	<div class="card">
		<div class="card-header">Sửa đơn hàng</div>
		<div class="card-body">
			<form action="{{ route('donhang.sua', ['id' => $donhang->id]) }}" method="post">
				@csrf
				<div class="mb-3">
					<label class="form-label" for="user_id">Khách hàng</label>
					<input type="text" class="form-control" id="user_id" name="user_id" value="{{ $donhang->NguoiDung->name }}" disabled required />
				</div>
				<div class="mb-3">
					<label class="form-label" for="dienthoaikhachhang">Số điện thoại</label>
					<input type="text" class="form-control @error('dienthoaikhachhang') is-invalid @enderror" id="dienthoaikhachhang" name="dienthoaikhachhang" value="{{ $donhang->dienthoaikhachhang }}" required />
					@error('dienthoaikhachhang')
						<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
					@enderror
				</div>
				<div class="mb-3">
					<label class="form-label" for="emailgiaohang">Email</label>
					<input type="text" class="form-control @error('emailgiaohang') is-invalid @enderror" id="emailgiaohang" name="emailgiaohang" value="{{ $donhang->emailgiaohang }}" required />
					@error('emailgiaohang')
						<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
					@enderror
				</div>
				
				<div class="mb-3">
					<label class="form-label" for="tinhtrang">Tình trạng đơn hàng</label>
					<select class="form-select @error('tinhtrang') is-invalid @enderror" id="tinhtrang" name="tinhtrang" required>
						<option value="">-- Chọn --</option>
						<option value="0" {{ ($donhang->tinhtrang == 0) ? 'selected' : '' }}>Chưa xác nhận</option>
						<option value="1" {{ ($donhang->tinhtrang == 1) ? 'selected' : '' }}>Đã xác nhận</option>

					</select>
					@error('tinhtrang')
						<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
					@enderror
				</div>
				<button type="submit" class="btn btn-primary"><i class="fal fa-save"></i> Cập nhật</button>
			</form>
		</div>
	</div>
@endsection