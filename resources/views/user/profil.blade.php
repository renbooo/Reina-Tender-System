@extends('user.master')
@section('title', "Profil")
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

      <li class="active"><a href="{{url('/users/profil_user')}}"><img src="../img/profil.svg" width="20px" height="20px"> <span>Profil Perusahaan</span></a></li>
     <li><a href="{{url('/users/auction_stats')}}"><img src="../img/auction.svg" width="20px" height="20px"> <span>Lelang Saya</span></a></li>
     <li class="treeview">
      <a href="{{url('/users/help')}}"><img src="../img/question-mark.svg" width="20px" height="20px"> <span>Bantuan</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{url('/users/step_auction')}}"><img src="../img/settings.svg" width="20px" height="20px"> <span>Prosedur Lelang</span></a></li>
        <li><a href="{{url('/users/requirement')}}"><img src="../img/license.svg" width="20px" height="20px"> <span>Syarat & Ketentuan</span></a></li>
      </ul>
    </li>
    <li><a href="{{url('/users/about')}}"><img src="../img/info.svg" width="20px" height="20px"> <span>Tentang</span></a></li>
    </ul>
    @stop

    @section('content')
    <!-- Main content -->
    <section class="content">

      <div class="row">

        <div class="col-md-3">
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="../../img/avatar5.png" alt="User profile picture">
              <form role="form" method="post" enctype="multipart/form-data" action="{{route('beranda_lelang.store')}}">
                {{csrf_field()}}
                <h3 class="profile-username text-center">{{ Auth::user()->username }}</h3>
                <p class="text-muted text-center">Software Engineer</p>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              {{-- <h3 class="box-title" href="{{route('beranda_lelang.show', $cruds->idlelang)}}">{{$cruds->namalelang}}</h3> --}}
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Alamat Perusahaan (Pusat)</strong>

              <h4 class="text-muted">
                {{ Auth::user()->alamatperusahaan }}
              </h4>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Kota Perusahaan (Pusat)</strong>

              <h4 class="text-muted">{{ Auth::user()->kotaperusahaan }}</h4>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i>Nomor Pokok Wajib Pajak (NPWP)</strong>

              <h4 class="text-muted">{{ Auth::user()->npwp }}</h4>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> No. Telepon</strong>

              <h4 class="text-muted">{{ Auth::user()->notelepon }}</h4>
            </div>
            <!-- /.box-body -->

          </div>

          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <div class="tab-content">
              <!-- Post -->
              <div class="post">
                <h2><strong>Deskripsi Perusahaan</strong></h2>
                <textarea name="textarea" readonly="readonly" style="resize:none; width:100%; height:835px; font-size:20px"></textarea>
              </div>

              <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->

        </div>
        <!-- /.row -->

      </section>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
  @endsection
