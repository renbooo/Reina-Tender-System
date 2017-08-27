@extends('user.master')
@section('title', "Pesan")
@section('custom_css')
<style>
  .example-modal .modal {
    position: relative;
    top: auto;
    bottom: auto;
    right: auto;
    left: auto;
    display: block;
    z-index: 1;
  }

  .example-modal .modal {
    background: transparent !important;
  }
</style>
@stop
@section('side_bar')
<div class="user-panel">
  <div class="pull-left image">
    <img src="../img/avatar5.png" class="img-circle" alt="User Image">
  </div>
  <div class="pull-left info">
    <p>{{ Auth::user()->username }}</p>
    <!-- Status -->
    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
  </div>
</div>

<!-- Sidebar Menu -->
<ul class="sidebar-menu">
<li class="active"><a href="{{url('/beranda_lelang')}}"><img src="../img/auction.svg" width="20px" height="20px"> <span>Beranda Lelang</span></a></li>
  <li class="treeview">
    <a href="{{url('/profil_user')}}"><img src="../img/profil.svg" width="20px" height="20px"> <span>Profil Perusahaan</span>
      <!-- <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span> -->
    </a>
    
   <!--  <ul class="treeview-menu">
      <li><a href="{{url('/change_protected')}}"><img src="img/key.svg" width="20px" height="20px"> <span>Ganti Password dan E-mail</span></a></li>
    </ul> -->
  </li>
  {{-- <li class="treeview">
  <a href="{{url('/syarat')}}"><img src="../img/deal.svg" width="20px" height="20px"> <span>Syarat Lelang</span>
    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li><a href="#"><img src="../img/add-user-symbol-of-interface.svg" width="20px" height="20px"> <span>Rekening Bank</span></a></li>
    <li><a href="#"><img src="../img/tax.svg" width="20px" height="20px"> <span>NPWP</span></a></li>
  </ul>
</li> --}}
<li class="treeview">
  <a href="{{url('/list_auction')}}"><img src="../img/clipboard.svg" width="20px" height="20px"> <span>Lelang Saya</span>
    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li><a href="{{url('/auction_stats')}}"><img src="../img/check-mark.svg" width="20px" height="20px"> <span>Status Lelang</span></a></li>
  </ul>
</li>
<li class="treeview">
  <a href="{{url('/help')}}"><img src="../img/question-mark.svg" width="20px" height="20px"> <span>Bantuan</span>
    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li><a href="{{url('/step_auction')}}"><img src="../img/settings.svg" width="20px" height="20px"> <span>Prosedur Lelang</span></a></li>
    <li><a href="{{url('/requirement')}}"><img src="../img/license.svg" width="20px" height="20px"> <span>Syarat & Ketentuan</span></a></li>
  </ul>
</li>
<li><a href="{{url('/about')}}"><img src="../img/info.svg" width="20px" height="20px"> <span>Tentang</span></a></li>
</ul>
@stop
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
           <form role="form" method="post" enctype="multipart/form-data" action="{{route('pesan_user.store')}}">
            {{csrf_field()}}
            <div class="form-group{{ $errors->has('idlelang') ? ' has-error' : '' }}">
              <input name="idlelang" type="hidden" class="form-control" value="{{$crud->idlelang}}">
              {!! $errors->first('idlelang', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group{{ $errors->has('namalelang') ? ' has-error' : '' }}">
              <input name="namalelang" type="hidden" class="form-control" value="{{$crud->namalelang}}">
              {!! $errors->first('namalelang', '<p class="help-block">:message</p>') !!}
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
@stop