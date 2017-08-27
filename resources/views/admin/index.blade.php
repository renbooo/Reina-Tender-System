@extends('admin.master')
@section('title', "Data User")
@section('custom_css')
	<style media="screen">
		th{
			text-align: center;
		}
	</style>
@endsection
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
			<li class="active"><a href="{{url('/admin/user_members')}}"><img src="../img/users.svg" width="20px" height="20px"> <span>Data User</span></a></li>
		</ul>
		<ul class="sidebar-menu">
			<!-- Optionally, you can add icons to the links -->
			<li><a href="{{url('/admin/auction')}}"><img src="../img/auction.svg" width="20px" height="20px"> <span>Daftar Lelang</span></a></li>
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
					<h3>Data Perusahaan</h3>
					<div class="panel panel-default">
						<div class="panel-body">
							@if(Session::has('alert-success'))
								<div class="alert alert-success">
									{{ Session::get('alert-success') }}
								</div>
							@endif
							<a href="{{route('user_members.create')}}"><button class='btn-info pull-right' title='Tambah User' type='button'><i class="fa fa-plus-square fa-2x" aria-hidden="true"></i></button></a><br><br>
							<table id="users" class="table table-striped">
								<thead>
									<tr>
										<th>Id</th>
										<th>Perusahaan</th>
										<th>Email</th>
										<th>Alamat</th>
										<th>Kota</th>
										<th>NPWP</th>
										<th>No Telepon</th>
										<th>Level</th>
										<th>Verified</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
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
			var table = $("#users").DataTable({
				processing: true,
				serverSide: true,
				ajax: "{{ url('/admin/users/data') }}",
				columns: [
					{ data: 'id' },
					{ data: 'username' },
					{ data: 'email' },
					{ data: 'alamatperusahaan' },
					{ data: 'kotaperusahaan' },
					{ data: 'npwp' },
					{ data: 'notelepon' },
					{ data: 'level' },
					{ data: 'verified' },
					{ data: 'action', 'searchable': false, 'orderable':false }
				]
			});
		});

		function reload_table() {
			table.ajax.reload(null, false);
		}

		function delete_user(id){
			var dec = confirm("Anda yakin ingin menghapus user ini ?");
			if(dec){
				$.ajaxSetup({
					data:{
						'_token':'{{csrf_token()}}'
					}
				})
				$.ajax({
					type: 'POST',
					url: '{{url('/')}}' + '/admin/users/destroy/'+id,
					success: function (response) {
						console.log(response)
					},
					error: function () {
						alert('something error guys!')
					}
				}).done(function () {
					reload_table()
				})
			}
		}
		</script>
	@endsection
