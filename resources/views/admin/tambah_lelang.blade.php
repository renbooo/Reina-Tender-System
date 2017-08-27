@extends('admin.master')
@section('title', "Tambah Lelang")
  @section('side_bar')
    <div class="user-panel">
      <div class="pull-left image">
        <img src="../../img/avatar5.png" class="../img-circle" alt="User Image">
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
  <li><a href="{{url('/admin/user_members')}}"><img src="../../img/users.svg" width="20px" height="20px"> <span>Data User</span></a></li>
</ul>
<ul class="sidebar-menu">
  <!-- Optionally, you can add icons to the links -->
  <li ><a href="{{url('/admin/auction')}}"><img src="../../img/auction.svg" width="20px" height="20px"> <span>Daftar Lelang</span></a></li>
</ul>
<ul class="sidebar-menu">
  <!-- Optionally, you can add icons to the links -->
  <li class="active"><a href="{{url('/admin/crud_lelang/create')}}"><img src="../../img/outbox.svg" width="20px" height="20px"> <span>File Upload</span></a></li>
</ul>
<ul class="sidebar-menu">
  <!-- Optionally, you can add icons to the links -->
  <li><a href="{{url('/admin/kelola_pesan')}}"><img src="../../img/chat.svg" width="20px" height="20px"> <span>Komentar User</span></a></li>
</ul>

  @stop
  @section('content-header')
    <section class="content-header">
      <h1>
        Form Tambah Lelang
      </h1>
    </section>
  @stop
  @section('content')

    <!-- /.box-header -->

    <div class="box-body pad">
      <div class="box box-primary">
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="post" enctype="multipart/form-data" action="{{route('crud_lelang.store')}}">
          {{ csrf_field() }}
          <div class="box-body">
            <label>Nama Lelang</label>
            <div class="form-group{{ $errors->has('namalelang') ? ' has-error' : '' }}">
              <input type="text" name="namalelang" class="form-control" placeholder="Nama Lelang">
              {!! $errors->first('namalelang', '<p class="help-block">:message</p>') !!}
            </div>
            <label>Deskripsi Lelang</label>
            <div class="form-group{{ $errors->has('deskripsi') ? ' has-error' : '' }}">
              <textarea name="deskripsi" class="form-control" placeholder="Input daftar barang yang akan dilelang " style="width: 100%; height: 200px; resize:none; font-size: 14px; line-height: 18px; padding: 10px;"></textarea>
              {!! $errors->first('deskripsi', '<p class="help-block">:message</p>') !!}
            </div>
            <label>Penawaran Ditutup</label>
            <div class="form-group{{ $errors->has('tanggaltutup') ? ' has-error' : '' }}">
              <input type="datetime-local" name="tanggaltutup" class="form-control">
              {!! $errors->first('tanggaltutup', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group">
              <label for="exampleInputFile">File input</label>
              <input type="file" name="uploadfile" id="exampleInputFile">
              <p class="text-muted">*Ekstensi file pdf, zip, rar</p>
            </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </form>
        </div>
      </div>

      <!-- CK Editor -->
      <script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
      <!-- Bootstrap WYSIHTML5 -->
      <script src="../js/bootstrap3-wysihtml5.all.min.js"></script>
      <script>
      $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
      });
      </script>
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
