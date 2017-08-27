@extends('admin.master')
@section('title', "Members")

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
  <li><a href="{{url('/admin/kelola_pesan')}}"><img src="../img/chat.svg" width="20px" height="20px"> <span>Komentar User</span></a></li>
</ul>
@stop

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h3>Data Admin</h3>
      <div class="panel panel-default">
        <div class="panel-body">
          @if(Session::has('alert-success'))
          <div class="alert alert-success">
            {{ Session::get('alert-success') }}
          </div>
          @endif
          <a href="{{route('members.create')}}" class="btn btn-info pull-right">Tambah Data</a><br><br>
          <table class="table table-striped">
            <tr>
              <th>Id</th>
              <th>Nama Lengkap</th>
              <th>Alamat</th>
              <th>Tanggal Lahir</th>
              <th>Kota Lahir</th>
              <th>Jenis Kelamin</th>
              <th>Aksi</th>
            </tr>
            @foreach($cruds as $crud)
            <tr class="item{{$crud->idperusahaan}}">
              <td>{{ $crud->idadmin }}</td>
              <td>{{ $crud->namaadmin }}</td>
              <td>{{ $crud->alamatadmin }}</td>
              <td>{{ $crud->tanggallahir }}</td>
              <td>{{ $crud->kotalahir }}</td>
              <td>{{ $crud->jeniskelamin }}</td>
              <td>
                <form method="POST" action="{{ route('members.destroy', $crud->idadmin) }}" accept-charset="UTF-8">
                  <input name="_method" type="hidden" value="DELETE">
                  <input name="_token" type="hidden" value="{{ csrf_token() }}">
                  <a href="{{route('members.edit', $crud->idadmin)}}" class="btn btn-primary">Edit</a>
                  <input type="submit" class="btn btn-danger" onclick="return confirm('Anda yakin akan menghapus data ?');" value="Delete">


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
