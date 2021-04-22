@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Người dùng</div>
		<div class="card-body table-responsive">
			<p><a href="{{ route('nguoidung.them') }}" class="btn btn-info"><i class="fal fa-plus"></i> Thêm mới</a></p>
			<table class="table table-bordered table-hover table-sm mb-0">
				<thead>
					<tr>
						<th width="5%">#</th>
						<th width="20%">Họ và tên</th>
						<th width="20%">Tên đăng nhập</th>
						<th width="35%">Email</th>
						<th width="10%">Quyền hạn</th>
						<th width="5%">Sửa</th>
						<th width="5%">Xóa</th>
					</tr>
				</thead>
				<tbody>
					@foreach($rl as $value)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td>{{ $value->name }}</td>
							<td>{{ $value->username }}</td>
							<td>{{ $value->email }}</td>
							<td>{{ $value->description }}</td>
							<td class="text-center"><a href="{{ route('nguoidung.sua', ['id' => $value->id]) }}"><i class="fal fa-edit"></i></a></td>
							<td class="text-center"><a href="{{ route('nguoidung.xoa', ['id' => $value->id]) }}"><i class="fal fa-trash-alt text-danger"></i></a></td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection