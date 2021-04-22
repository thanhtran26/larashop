@extends('layouts.app')
@section('content')
	<div class="card">
		<div class="card-header">Sửa slide</div>
		<div class="card-body">
			<form action="{{ route('slide.sua', ['id' => $slide->id]) }}" method="post">
				@csrf
				<div class="mb-3">
					<label class="form-label" for="link">Link</label>
					<input type="text" class="form-control @error('link') is-invalid @enderror" id="link" name="link" value="{{ $slide->link }}" required />
					@error('link')
						<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
					@enderror
				</div>
								<div class="mb-3">
					@if(!empty($slide->hinhanh))
						<img class="d-block rounded" src="{{ env('APP_URL') . '/storage/app/' . $slide->hinhanh }}" width="100" />
						<span class="d-block small text-danger">Bỏ trống nếu muốn giữ nguyên ảnh cũ.</span>
					@endif
					<input type="file" class="form-control @error('hinhanh') is-invalid @enderror" id="hinhanh" name="hinhanh" value="{{ $slide->hinhanh }}"  />
					@error('hinhanh')
						<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
					@enderror
				</div>
				<button type="submit" class="btn btn-primary"><i class="fal fa-save"></i> Cập nhật</button>
			</form>
		</div>
	</div>
@endsection