@extends('user.master')
@section('title', "Detail Lelang")
  @section('side_bar')
    <div class="user-panel">
      <div class="pull-left image">
        <img src="../../img/avatar5.png" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{ Auth::user()->username }}</p>
        <!-- Status -->
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <li class="active"><a href="{{url('/users/beranda_lelang')}}"><img src="../../img/auction.svg" width="20px" height="20px"> <span>Beranda Lelang</span></a></li>

      <li><a href="{{url('/users/profil_user')}}"><img src="../../img/profil.svg" width="20px" height="20px"> <span>Profil Perusahaan</span></a></li>
     {{-- <li><a href="{{url('/users/auction_stats')}}"><img src="../img/auction.svg" width="20px" height="20px"> <span>Lelang Saya</span></a></li> --}}
     <li class="treeview">
      <a href="{{url('/users/help')}}"><img src="../../img/question-mark.svg" width="20px" height="20px"> <span>Bantuan</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{url('/users/step_auction')}}"><img src="../../img/settings.svg" width="20px" height="20px"> <span>Prosedur Lelang</span></a></li>
        <li><a href="{{url('/users/requirement')}}"><img src="../../img/license.svg" width="20px" height="20px"> <span>Syarat & Ketentuan</span></a></li>
      </ul>
    </li>
    <li><a href="{{url('/users/about')}}"><img src="../../img/info.svg" width="20px" height="20px"> <span>Tentang</span></a></li>
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
            <h3 class="profile-username text-center">PT. Arion Indonesia</h3>
            <p class="text-muted text-center">Software Engineer</p>
            <div class="form-group{{ $errors->has('idlelang') ? ' has-error' : '' }}">
              <input type="hidden" name="idlelang" class="form-control" value="{{$cruds->idlelang}}">
              {!! $errors->first('idlelang', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group{{ $errors->has('namalelang') ? ' has-error' : '' }}">
              <input type="hidden" name="namalelang" class="form-control" value="{{$cruds->namalelang}}">
              {!! $errors->first('namalelang', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group{{ $errors->has('id') ? ' has-error' : '' }}">
              <input type="hidden" name="id" class="form-control" value="{{ Auth::user()->id }}">
              {!! $errors->first('id', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
              <input type="hidden" name="username" class="form-control" value="{{ Auth::user()->username }}">
              {!! $errors->first('username', '<p class="help-block">:message</p>') !!}
            </div>
            <hr>
            <div class="form-row">
              <b>Inputkan Nilai Penawaran</b><br><br>
                <input type="text" name="nilaitawar" id="dengan-rupiah" class="form-control currency">
            </div>
            <hr>
            <b>Upload File Foto</b><br><br>
            <input type="file" name="uploadtawaran">
            <p class="text-muted">*Upload file dengan ekstensi .zip/.rar</p><br>
            <input type="submit" class="btn btn-primary btn-block" value="Beri Penawaran">
          </form>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- About Me Box -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title" href="{{route('beranda_lelang.show', $cruds->idlelang)}}"><h3>{{$cruds->namalelang}}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <strong><i class="fa fa-book margin-r-5"></i> Harga Maksimal</strong>

          <p class="text-muted">
            B.S. in Computer Science from the University of Tennessee at Knoxville
          </p>

          <hr>

          <strong><i class="fa fa-map-marker margin-r-5"></i> Penawaran Ditutup</strong>

          <p class="text-muted">Malibu, California</p>

          <hr>

          <strong><i class="fa fa-pencil margin-r-5"></i>Kode Lelang</strong>

          <p class="text-muted">Kode Lelang</p>

          <hr>

          <strong><i class="fa fa-file-text-o margin-r-5"></i> Download Dokumen</strong>

          <p>Link</p>
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
            <h2><strong>Deskripsi Lelang</strong></h2>
            <textarea name="textarea" readonly="readonly" style="resize:none; width:100%; height:835px; font-size:20px">{{$cruds->deskripsi}}</textarea>
            {{-- <a href="{{route('pesan_user.show', $cruds->idlelang)}}"><button class="btn btn-primary btn-block">Tanyakan Sesuatu</button></a> --}}
          </div>

          <!-- /.tab-content -->
        </div>
        <!-- /.nav-tabs-custom -->
      </div>
      <!-- /.col -->

    </div>
    <!-- /.row -->

  </section>
  <script type="text/javascript">

    /* Dengan Rupiah */
    var dengan_rupiah = document.getElementById('dengan-rupiah');
    dengan_rupiah.addEventListener('keyup', function(e)
    {
      dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
    });

    dengan_rupiah.addEventListener('keydown', function(event)
    {
      limitCharacter(event);
    });

    /* Fungsi */
    function formatRupiah(bilangan, prefix)
    {
      var number_string = bilangan.replace(/[^,\d]/g, '').toString(),
        split	= number_string.split(','),
        sisa 	= split[0].length % 3,
        rupiah 	= split[0].substr(0, sisa),
        ribuan 	= split[0].substr(sisa).match(/\d{1,3}/gi);

      if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
      }

      rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
      return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }

    function limitCharacter(event)
    {
      key = event.which || event.keyCode;
      if ( key != 188 // Comma
         && key != 8 // Backspace
         && key != 17 && key != 86 & key != 67 // Ctrl c, ctrl v
         && (key < 48 || key > 57) // Non digit
         // Dan masih banyak lagi seperti tombol del, panah kiri dan kanan, tombol tab, dll
        )
      {
        event.preventDefault();
        return false;
      }
    }
  </script>
  @stop
