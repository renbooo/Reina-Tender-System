@extends('admin.master')
@section('title', "Form Edit Data")
@section('side_bar')
<div class="user-panel">
  <div class="pull-left image">
    <img src="../../../img/avatar5.png" class="../img-circle" alt="User Image">
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
  <li class="active"><a href="{{url('/admin/user_members')}}"><img src="../../../img/users.svg" width="20px" height="20px"> <span>Data User</span></a></li>
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
			<h3>Edit Data Perusahaan</h3>
			<div class="panel panel-default">
				<div class="panel-body">
					<form action="{{route('members.update', $cruds->idadmin)}}" method="post">
           <input name="_method" type="hidden" value="PATCH">
           {{csrf_field()}}
           <div class="form-group{{ $errors->has('namaadmin') ? ' has-error' : '' }}">
            <input type="text" name="namaadmin" class="form-control" placeholder="Nama Admin" value="{{$cruds->namaadmin}}">
            {!! $errors->first('namaadmin', '<p class="help-block">:message</p>') !!}
          </div>
          <div class="form-group{{ $errors->has('alamatadmin') ? ' has-error' : '' }}">
            <input type="text" name="alamatadmin" class="form-control" placeholder="Alamat Admin" value="{{$cruds->alamatadmin}}" >
            {!! $errors->first('alamatadmin', '<p class="help-block">:message</p>') !!}
          </div>
          <div class="form-group{{ $errors->has('tanggallahir') ? ' has-error' : '' }}">
            <input type="text" name="tanggallahir" class="form-control" placeholder="Tanggal Lahir" value="{{$cruds->tanggallahir}}">
            {!! $errors->first('tanggallahir', '<p class="help-block">:message</p>') !!}
          </div>
          <div class="form-group{{ $errors->has('kotalahir') ? ' has-error' : '' }}">
            <input type="text" name="kotalahir" class="form-control" placeholder="Kota Admin" value="{{$cruds->kotalahir}}">
            {!! $errors->first('kotalahir', '<p class="help-block">:message</p>') !!}
          </div>
          <div class="form-group{{ $errors->has('jeniskelamin') ? ' has-error' : '' }}">
            <input type="text" name="jeniskelamin" class="form-control" placeholder="Jenis Kelamin" value="{{$cruds->jeniskelamin}}">
            {!! $errors->first('jeniskelamin', '<p class="help-block">:message</p>') !!}
          </div>
          <div class="form-group">
           <input type="submit" class="btn btn-primary" value="Simpan">
         </div>
       </form>
     </div>
   </div>
 </div>
</div>
</div>
@endsection
