@extends('layouts.app')
@section('content')
	<div class="card">
		<div class="card-header">Thêm đơn hàng</div>
		<div class="card-body">
			<form action="{{ route('donhang.them') }}" method="post">
				@csrf
				<div class="mb-3">
					<label class="form-label" for="user_id">ID Khách hàng</label>
					<input type="text" class="form-control @error('user_id') is-invalid @enderror" id="user_id" name="user_id" value="{{ old('user_id') }}" required />
					@error('user_id')
						<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
					@enderror
				</div>
				<div class="mb-3">
					<label class="form-label" for="dienthoaikhachhang">Số điện thoại</label>
					<input type="text" class="form-control @error('dienthoaikhachhang') is-invalid @enderror" id="dienthoaikhachhang" name="dienthoaikhachhang" value="{{ old('dienthoaikhachhang') }}" required />
					@error('dienthoaikhachhang')
						<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
					@enderror
				</div>
				<div class="mb-3">
					<label class="form-label" for="emailgiaohang">Email</label>
					<input type="text" class="form-control @error('emailgiaohang') is-invalid @enderror" id="emailgiaohang" name="emailgiaohang" value="{{ old('emailgiaohang') }}" required />
					@error('emailgiaohang')
						<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
					@enderror
				</div>
				<div class="mb-3">
					<label class="form-label" for="tinhtrang">Tình trạng</label>
					<input type="text" class="form-control @error('tinhtrang') is-invalid @enderror" id="tinhtrang" name="tinhtrang" value="{{ old('tinhtrang') }}" required />
					@error('tinhtrang')
						<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
					@enderror
				</div>
				<button type="submit" class="btn btn-primary"><i class="fal fa-save"></i> Thêm vào CSDL</button>
			</form>
		</div>
	</div>
@endsection