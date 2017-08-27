@extends('admin.master')
@section('side_bar')
@inject('admin', 'App\Http\Controllers\AdminShowNego')
<div class="user-panel">
	<div class="pull-left image">
		<img src="../../../img/avatar5.png" class="../../../img-circle" alt="User Image">
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
	<li><a href="{{url('/admin/user_members')}}"><img src="../../../img/users.svg" width="20px" height="20px"> <span>Data User</span></a></li>
</ul>
<ul class="sidebar-menu">
	<!-- Optionally, you can add icons to the links -->
	<li><a href="{{url('/admin/auction')}}"><img src="../../../img/auction.svg" width="20px" height="20px"> <span>Daftar Lelang</span></a></li>
</ul>
<ul class="sidebar-menu">
	<!-- Optionally, you can add icons to the links -->
	<li><a href="{{url('/admin/crud_lelang/create')}}"><img src="../../../img/outbox.svg" width="20px" height="20px"> <span>File Upload</span></a></li>
</ul>
<ul class="sidebar-menu">
	<!-- Optionally, you can add icons to the links -->
	<li><a href="{{url('/admin/kelola_pesan')}}"><img src="../../../img/chat.svg" width="20px" height="20px"> <span>Komentar User</span></a></li>

</ul>
@endsection
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">

			<h3>Daftar Penawaaran Lelang</h3>
			<div class="panel panel-default">
				<div class="panel-body">
					<a href="{{url('/admin/crud_lelang/')}}"><button class='btn-warning pull-right' title='Tentukan Pemenang' type='button'><i class="fa fa-trophy fa-2x" aria-hidden="true"></i></button></a><br><br>
					@if(Session::has('alert-success'))
					<div class="alert alert-success">
						{{ Session::get('alert-success') }}
					</div>
					@endif
					<table class="table table-striped">
						<tr>
							<th>Id Penawaran</th>
							<th>Id Lelang</th>
							<th>Nama Lelang</th>
							<th>Id Penawar</th>
							<th>Nama Penawar</th>
							<th>Nilai Tawar</th>
							<th>Upload Tawaran</th>
						</tr>
						@foreach($cruds as $crud)
						<tr>
							<td>{{$crud->idpenawaran}}</td>
							<td>{{$crud->idlelang}}</td>
							<td>{{$crud->namalelang}}</td>
							<td>{{$crud->id}}</td>
							<td>{{$crud->username}}</td>
							<td>{{$crud->nilaitawar}}</td>
							<td>{{$crud->uploadtawaran}}</td>
						</tr>
					@endforeach
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('script')
	{{-- <script type="text/javascript">
		function sendMessage(id) {
			console.log("Id: "+id)
			$.ajaxSetup({
				data:{
					'_token':'{{csrf_token()}}'
				}
			})
			$.ajax({
				type: 'POST',
				url: '{{url('/')}}' + '/admin/auctioneers/kirim-pesan/'+id,
				success: function (response) {
					console.log(response)
				},
				error: function () {
					alert('something error guys!')
				}
			})
		}
	</script> --}}
	{{--<script type="text/javascript">
	$('.btn').click(function () {
		if ($(this).hasClass('tombol-aktif')) {
			$('.btn:not(.tombol-aktif)').removeClass('disabled')
			$(this).removeClass('tombol-aktif')
			return
		}
		$(this).addClass('tombol-aktif')
		$('.btn:not(.tombol-aktif)').addClass('disabled')
	})
	</script>
@endsection --}}
