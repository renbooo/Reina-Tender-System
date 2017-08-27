@extends('admin.master')
@section('title', "Tambah Lelang")
  @section('side_bar')
    <div class="user-panel">
      <div class="pull-left image">
        <img src="../../../img/avatar5.png" class="../../../img-circle" alt="User Image">
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
  <li><a href="{{url('/admin/user_members')}}"><img src="../../../img/users.svg" width="20px" height="20px"> <span>Data User</span></a></li>
</ul>
<ul class="sidebar-menu">
  <!-- Optionally, you can add icons to the links -->
  <li class="active"><a href="{{url('/admin/auction')}}"><img src="../../../img/auction.svg" width="20px" height="20px"> <span>Daftar Lelang</span></a></li>
</ul>
<ul class="sidebar-menu">
  <!-- Optionally, you can add icons to the links -->
  <li><a href="{{url('/admin/crud_lelang/create')}}"><img src="../../../img/outbox.svg" width="20px" height="20px"> <span>File Upload</span></a></li>
</ul>
<ul class="sidebar-menu">
  <!-- Optionally, you can add icons to the links -->
  <li><a href="{{url('/admin/kelola_pesan')}}"><img src="../../../img/chat.svg" width="20px" height="20px"> <span>Komentar User</span></a></li>
</ul>

  @stop
  @section('content-header')
    <section class="content-header">
      <h1>
        Form Edit Lelang
      </h1>
    </section>
  @stop
  @section('content')

    {{-- <pre>{{json_encode($errors->all())}}</pre> --}}
    <div class="box-body pad">
      <div class="box box-primary">
        <form role="form" method="post" enctype="multipart/form-data" action="{{route('crud_lelang.update', $cruds->idlelang)}}">
          {{ csrf_field() }}
          <input type="hidden" name="_method" value="put">
          <div class="box-body">
            <label>Nama Lelang</label>
            <div class="form-group{{ $errors->has('namalelang') ? ' has-error' : '' }}">
              <input type="text" name="namalelang" class="form-control" value="{{$cruds->namalelang}}">
              {!! $errors->first('namalelang', '<p class="help-block">:message</p>') !!}
            </div>
            <label>Deskripsi Lelang</label>
            <div class="form-group{{ $errors->has('deskripsi') ? ' has-error' : '' }}">
              <textarea name="deskripsi" class="form-control" style="width: 100%; height: 200px; resize:none; font-size: 14px; line-height: 18px; padding: 10px;">{{$cruds->deskripsi}}</textarea>
              {!! $errors->first('deskripsi', '<p class="help-block">:message</p>') !!}
            </div>
            <label>Penawaran Ditutup</label>
            <p class="text-muted">Input kembali batas waktu penutupan lelang. Tanggal Sebelumnya {{$cruds->tanggaltutup}}</p>
            <div class="form-group{{ $errors->has('tanggaltutup') ? ' has-error' : '' }}">
              <input type="datetime-local" name="tanggaltutup" class="form-control" value="{{$cruds->tanggaltutup}}">
              {!! $errors->first('tanggaltutup', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group">
              <label for="exampleInputFile">File input</label>
              <p class="text-muted">Input kembali dokumen lelang</p>
              <input type="file" name="uploadfile" id="exampleInputFile">
              <p class="text-muted">*Ekstensi file pdf, zip, rar</p>
            </div>
            <label>Pemenang Lelang *(Diisikan saat selesai menentukan pemenang)</label>
           <div class="form-group{{ $errors->has('pemenang') ? ' has-error' : '' }}">
             <input type="text" name="pemenang" class="form-control" value="{{$cruds->pemenang}}">
             {!! $errors->first('pemenang', '<p class="help-block">:message</p>') !!}
           </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </form>
        </div>
      </div>


    @stop
    @section('script')
      <script>
      $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
      });
      </script>
    @endsection
