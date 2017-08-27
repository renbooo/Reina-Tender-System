@extends('admin.master')
@section('title', "Komentar")
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
	<li class="active"><a href="{{url('/admin/kelola_pesan')}}"><img src="../img/chat.svg" width="20px" height="20px"> <span>Komentar User</span></a></li>
</ul>
@endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">

			<h3>Daftar Komentar</h3>

			<div class="panel panel-default">
				<div class="panel-body">
					@if(Session::has('alert-success'))
					<div class="alert alert-success">
						{{ Session::get('alert-success') }}
					</div>
					@endif
					<!-- <a href="{{route('crud_lelang.create')}}" class="btn btn-info pull-right">Tambah Data</a><br><br> -->
					<table class="table table-striped">
						<tr>
							<th>Id Pesan</th>
							<th>Id Lelang</th>
							<th>Nama Lelang</th>
							<th>Id Penanya</th>
							<th>Nama Penanya</th>
							<th>Detail Pesan</th>
							<th>Aksi</th>
						</tr>
						@foreach($cruds as $crud)
						<tr class="item{{$crud->idpertanyaan}}">
							<td>{{$crud->idpertanyaan}}</td>
							<td>{{$crud->idlelang}}</td>
							<td>{{$crud->namalelang}}</td>
							<td>{{$crud->id}}</td>
							<td>{{$crud->username}}</td>
							<td>{{$crud->pertanyaan}}</td>

							<form method="POST" action="{{route('kelola_pesan.destroy', $crud->idpertanyaan)}}" accept-charset="UTF-8">
								<td>
									<input name="_method" type="hidden" value="DELETE">
									<input name="_token" type="hidden" value="{{ csrf_token() }}">
									<a href="{{route('kelola_pesan.edit', $crud->idpertanyaan)}}" class="btn btn-primary fa fa-pencil"></a>

									<span type="submit" class="btn btn-danger fa fa-trash" onclick="return confirm('Anda yakin akan menghapus data ?');"> </span>
								</form>
							</td>
						</tr>
						@endforeach
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
