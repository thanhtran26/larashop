@extends('layouts.app')
@section('content')
	<div class="card">
		<div class="card-header">Thêm slide</div>
		<div class="card-body">
			<form action="{{ route('hang.them') }}" method="post">
				@csrf
				<div class="mb-3">
					<label class="form-label" for="link">Link</label>
					<input type="text" class="form-control @error('link') is-invalid @enderror" id="link" name="link" value="{{ old('link') }}" required />
					@error('link')
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
				
				<button type="submit" class="btn btn-primary"><i class="fal fa-save"></i> Thêm vào CSDL</button>
			</form>
		</div>
	</div>
@endsection