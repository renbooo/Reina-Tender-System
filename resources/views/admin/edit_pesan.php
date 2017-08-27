@extends('admin.master')
@section('title', "Jawab Pesan")

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

<!-- Main content -->
<section class="content">

  <div class="example-modal">
    <div class="modal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h2><i><b>Kolom Pesan</b></i></h2>
          </div>
          <div class="modal-body">
            <form action="{{route('kelola_pesan.store')}}" method="post">
              {{csrf_field()}}
              <div class="form-group">
                <label class="form-control">{{Auth::user()->id}}</label>
              </div>
              <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                <input name="username" type="hidden" class="form-control" value="{{ Auth::user()->username }}">
                {!! $errors->first('username', '<p class="help-block">:message</p>') !!}
              </div>
              <div class="form-group{{ $errors->has('pertanyaan') ? ' has-error' : '' }}">
                <textarea name="pertanyaan" class="form-control" placeholder="Tanya Sesuatu . . . ." style="resize: none; width: 570px; height: 50px"></textarea>
                {!! $errors->first('pertanyaan', '<p class="help-block">:message</p>') !!}
              </div>
            </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-primary" value="Kirim">
            </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
  </div>

  <div class="example-modal">
    <div class="modal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h3><i><b>Kolom Pesan</b></i></h3>
          </div>
          <div class="modal-body">

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
    </div>

  </section>
@endsection
