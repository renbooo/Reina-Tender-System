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
      <li><a href="{{url('/admin/auction')}}"><img src="../img/auction.svg" width="20px" height="20px"> <span>Daftar Penawaran</span></a></li>
    </ul>
    <ul class="sidebar-menu">
      <!-- Optionally, you can add icons to the links -->
      <li><a href="{{url('/admin/kelola_pesan')}}"><img src="../../../img/chat.svg" width="20px" height="20px"> <span>Komentar User</span></a></li>

    </ul>
  @endsection
  @section('content')
    {{-- <pre>{{json_encode($errors->all())}}</pre> --}}
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3>Edit Data Perusahaan</h3>
          <div class="panel panel-default">
            <div class="panel-body">
              <form role="form" action="{{route('user_members.update', $cruds->id)}}" method="post">
                {{csrf_field()}}
                <input name="_method" type="hidden" value="put">
                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                  <input type="text" name="username" class="form-control" placeholder="Nama Perusahaan" value="{{$cruds->username}}">
                  {!! $errors->first('username', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  <input type="text" name="email" class="form-control" placeholder="Email Perusahaan" value="{{$cruds->email}}">
                  {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                  <input type="text" name="username" class="form-control" placeholder="Nama Perusahaan" value="{{$cruds->username}}">
                  {!! $errors->first('username', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group{{ $errors->has('alamatperusahaan') ? ' has-error' : '' }}">
                  <input type="text" name="alamatperusahaan" class="form-control" placeholder="Alamat Perusahaan" value="{{$cruds->alamatperusahaan}}" >
                  {!! $errors->first('alamatperusahaan', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group{{ $errors->has('kotaperusahaan') ? ' has-error' : '' }}">
                  <input type="text" name="kotaperusahaan" class="form-control" placeholder="Kota Perusahaan" value="{{$cruds->kotaperusahaan}}">
                  {!! $errors->first('kotaperusahaan', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group{{ $errors->has('npwp') ? ' has-error' : '' }}">
                  <input type="text" name="npwp" class="form-control" placeholder="NPWP" value="{{$cruds->npwp}}">
                  {!! $errors->first('npwp', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group{{ $errors->has('notelepon') ? ' has-error' : '' }}">
                  <input type="text" name="notelepon" class="form-control" placeholder="No Telepon" value="{{$cruds->notelepon}}">
                  {!! $errors->first('notelepon', '<p class="help-block">:message</p>') !!}
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
