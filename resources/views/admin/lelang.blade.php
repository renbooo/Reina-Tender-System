@extends('admin.master')
@section('side_bar')
<div class="user-panel">
	<div class="pull-left image">
		<img src="../img/avatar5.png" class="../img-circle" alt="User Image">
	</div>
	<div class="pull-left info">
		<p>{{ Auth::user()->username }}</p>
		<!-- Status -->
		<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
	</div>
</div>

<!-- Sidebar Menu -->
<ul class="sidebar-menu">
	<!-- Optionally, you can add icons to the links -->
	<li><a href="{{url('/admin/user_members')}}"><img src="../img/users.svg" width="20px" height="20px"> <span>Data User</span></a></li>
</ul>
<ul class="sidebar-menu">
	<!-- Optionally, you can add icons to the links -->
	<li class="active"><a href="{{url('/admin/auction')}}"><img src="../img/auction.svg" width="20px" height="20px"> <span>Daftar Lelang</span></a></li>
</ul>
<ul class="sidebar-menu">
	<!-- Optionally, you can add icons to the links -->
	<li><a href="{{url('/admin/crud_lelang/create')}}"><img src="../img/outbox.svg" width="20px" height="20px"> <span>File Upload</span></a></li>
</ul>
<ul class="sidebar-menu">
	<!-- Optionally, you can add icons to the links -->
	<li><a href="{{url('/admin/kelola_pesan')}}"><img src="../img/chat.svg" width="20px" height="20px"> <span>Komentar User</span></a></li>

</ul>
@endsection
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3>Daftar Lelang</h3>
			<div class="panel panel-default">
				<div class="panel-body">
					@if(Session::has('alert-success'))
					<div class="alert alert-success">
						{{ Session::get('alert-success') }}
					</div>
					@endif
					<a href="{{route('crud_lelang.create')}}"><button class='btn-info pull-right' title='Tambah Lelang' type='button'><i class="fa fa-plus-square fa-2x" aria-hidden="true"></i></button></a><br><br>
					<table id="auction" class="table table-striped">
						<thead>
						<tr>
							<th>Id</th>
							<th>Nama Lelang</th>
							<th>Deskripsi Lelang</th>
							<th>Batas Penawaran</th>
							<th>Upload File</th>
							<th>Pemenang</th>
							<th>Aksi</th>
						</thead>
						</tr>
						{{-- @foreach($cruds as $crud)
						<tr class="item{{$crud->idlelang}}">
							<td>{{$crud->idlelang}}</td>
							<td>{{$crud->namalelang}}</td>
							<td>{{$crud->deskripsi}}</td>
							<td>{{$crud->tanggaltutup}}</td>
							<td>{{$crud->kodelelang}}</td>
							<td>{{$crud->status}}</td>
							<td>{{$crud->uploadfile}}</td>
							<td><a href="{{route('penawaran.show', $crud->idlelang)}}" class="btn btn-primary fa fa-pencil"></a>
							<form method="POST" action="" accept-charset="UTF-8">
								<td colspan="2">
									<input name="_method" type="hidden" value="DELETE">
									<input name="_token" type="hidden" value="{{ csrf_token() }}">
									<a href="#" class="btn btn-primary fa fa-pencil"></a>
								</td>
								<td>
									<span type="submit" class="btn btn-danger fa fa-trash" onclick="return confirm('Anda yakin akan menghapus data ?');"> </span>
								</form>
							</td>
						</tr>
						@endforeach --}}
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('script')
	<script>
		var table;

    $(function() {
        table = $("#auction").DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('/admin/auction/data') }}",
            columns: [
              { data: 'idlelang' },
              { data: 'namalelang' },
              { data: 'deskripsi' },
              { data: 'tanggaltutup' },
							{ data: 'uploadfile', },
							{ data: 'pemenang', },
              { data: 'action', 'searchable': false, 'orderable':false }
           ]
        });
    });

		function reload_table() {
			table.ajax.reload(null, false);
		}

		function delete_lelang(id){
			var dec = confirm("Anda yakin ingin menghapus lelang ini ?");
			if(dec){
				$.ajaxSetup({
					data:{
						'_token':'{{csrf_token()}}'
					}
				})
				$.ajax({
					type: 'POST',
					url: '{{url('/')}}' + '/admin/auction/destroy/'+id,
					success: function (response) {
						console.log(response)
					},
				}).done(function () {
					reload_table()
				})
			}
		}
	</script>
@endsection
