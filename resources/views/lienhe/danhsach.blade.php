@extends('layouts.app')
@section('content')
	<div class="card">
		<div class="card-header">Liên hệ</div>
		<div class="card-body table-responsive">
			<p><a href="{{ route('lienhe.them') }}" class="btn btn-info"><i class="fal fa-plus"></i> Thêm mới</a></p>
			<table class="table table-bordered table-hover table-sm mb-0">
				<thead>
					<tr>
						<th width="5%">#</th>
						<th width="15%">Họ và tên</th>
						<th width="10%">Mail</th>
						<th width="10%">Tiêu đề</th>
						<th width="10%">Nội dung</th>
						
						<th width="5%">Xóa</th>
					</tr>
				</thead>
				<tbody>
					@foreach($lienhe as $value)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td>{{ $value->hovaten }}</td>
							<td>{{ $value->mail }}</td>
							<td>{{ $value->vande }}</td>
							<td>{{ $value->tinnhan }}</td>
							
							
							<td class="text-center"><a href="{{ route('lienhe.xoa', ['id' => $value->id]) }}"><i class="fal fa-trash-alt text-danger"></i></a></td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	
@endsection