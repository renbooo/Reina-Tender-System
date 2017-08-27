@extends('admin.master')
@section('title', "Daftar Lelang")

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
@stop

@section('content')
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Data Table With Full Features</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table style="text-align:center" id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Id</th>
          <th>Nama Lengkap</th>
          <th>Alamat</th>
          <th>Tanggal Lahir</th>
          <th>Kota Lahir</th>
          <th>Jenis Kelamin</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($data as $index)
        <tr>
          <td>{{ $index->idadmin }}</td>
          <td>{{ $index->namaadmin }}</td>
          <td>{{ $index->alamatadmin }}</td>
          <td>{{ $index->tanggallahir }}</td>
          <td>{{ $index->kotalahir }}</td>
          <td>{{ $index->jeniskelamin }}</td>
          <td><a href="{{url('/update')}}"><img title="Edit Data" src="img/pencil.svg" width="40px" height="20px"></a>
          <a href="{{url('/delete')}}"><img title="Hapus Data" src="img/trash.svg" width="40px" height="20px"></a></td>
        </tr>
         @endforeach
      </tbody>
    </table>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->

</div>
<!-- /.col -->
</div>
@stop
