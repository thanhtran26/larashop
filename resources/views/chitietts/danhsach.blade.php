@extends('layouts.app')
@section('content')
	<div class="card">
		<div class="card-header">Chi tiết thông số</div>
		<div class="card-body table-responsive">
		<a href="#nhap" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#importModal"><i class="fal fa-upload"></i> Nhập từ Excel</a>
			<table class="table table-bordered table-hover table-sm mb-0">
				<thead>
					<tr>
						<th >#</th>
						<th >Thông số kỹ thuật</th>
						<th >Tên thông số</th>
						<th>Tên sản phẩm<th>
					</tr>
				</thead>
				<tbody>
					@foreach($chitietts as $value)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td>{{ $value->ts }}</td>
							<td>{{ $value->ThongSo->tenthongso }}</td>
							<td>{{ $value->SanPham->tensanpham }}</td>

						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	<form action="{{ route('chitietts.nhap') }}" method="post" enctype="multipart/form-data">
		@csrf
		<div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="importModalLabel">Nhập từ Excel</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<div class="mb-0">
							<label for="file_excel" class="form-label">Chọn tập tin Excel</label>
							<input type="file" class="form-control" id="file_excel" name="file_excel" required />
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fal fa-times"></i> Hủy bỏ</button>
						<button type="submit" class="btn btn-danger"><i class="fal fa-upload"></i> Nhập dữ liệu</button>
					</div>
				</div>
			</div>
		</div>
	</form>
@endsection