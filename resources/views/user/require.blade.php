@extends('user.master')
@section('title', "Syarat & Ketentuan")
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
    <li><a href="{{url('/users/beranda_lelang')}}"><img src="../img/auction.svg" width="20px" height="20px"> <span>Beranda Lelang</span></a></li>

    <li><a href="{{url('/users/profil_user')}}"><img src="../img/profil.svg" width="20px" height="20px"> <span>Profil Perusahaan</span></a></li>
   <li><a href="{{url('/users/auction_stats')}}"><img src="../img/auction.svg" width="20px" height="20px"> <span>Lelang Saya</span></a></li>
   <li class="treeview">
    <a href="{{url('/users/help')}}"><img src="../img/question-mark.svg" width="20px" height="20px"> <span>Bantuan</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="{{url('/users/step_auction')}}"><img src="../img/settings.svg" width="20px" height="20px"> <span>Prosedur Lelang</span></a></li>
      <li class="active"><a href="{{url('/users/requirement')}}"><img src="../img/license.svg" width="20px" height="20px"> <span>Syarat & Ketentuan</span></a></li>
    </ul>
  </li>
  <li><a href="{{url('/users/about')}}"><img src="../img/info.svg" width="20px" height="20px"> <span>Tentang</span></a></li>
  </ul>
@stop

@section('content')
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Syarat & Ketentuan</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
        <i class="fa fa-minus"></i></button>
      </div>
    </div>
    <div class="box-body" style="text-align: justify; line-height: 20pt;">


   </div>
   <!-- /.box-body -->

 </div>
@stop
