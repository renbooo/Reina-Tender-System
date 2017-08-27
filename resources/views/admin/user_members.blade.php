@extends('admin.master')

@section('title', "User")
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
@endsection

section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h3>DATA USER</h3>
      <div class="panel panel-default">
        <div class="panel-body">
          @if(Session::has('alert-success'))
          <div class="alert alert-success">
            {{ Session::get('alert-success') }}
          </div>
          @endif
          {{-- <a href="{{route('crud.create')}}" class="btn btn-info pull-right">Tambah Data</a><br><br> --}}
          <!-- Small modal -->
          <button type="button" class="btn btn-info pull-right btn-sm" data-toggle="modal" data-target=".bs-example-modal-sm1">Tambah Data</button><br><br>
          <div class="modal fade bs-example-modal-sm1" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
            <div class="modal-dialog modal-sm" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Tambah Data</h4>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    {{ csrf_field() }}
                    <input type="text" name="namaperusahaan" id="namaperusahaan" class="form-control" placeholder="Nama Perusahaan">
                  </div>
                  <div class="form-group">
                    <input type="text" name="alamatperusahaan" id="alamatperusahaan" class="form-control" placeholder="Alamat Perusahaan">
                  </div>
                  <div class="form-group">
                    <input type="text" name="kotaperusahaan" id="kotaperusahaan" class="form-control" placeholder="Kota Perusahaan">
                  </div>
                  <div class="form-group">
                    <input type="text" name="npwp" id="npwp" class="form-control" placeholder="Nomor Pokok Wajib Pajak">
                  </div>
                  <div class="form-group">
                    <input type="text" name="notelepon" id="notelepon" class="form-control" placeholder="Nomor Telepon">
                  </div>
                  <div class="form-group" align="right">
                    <button type="reset" class="btn btn-default">Reset</button>
                    <button type="button" id="add" class="btn btn-primary" data-dismiss="modal">Simpan</button>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <table class="table table-striped" id="table">
            <tr>
              <th>Id</th>
              <th>Nama Perusahaan</th>
              <th>Alamat</th>
              <th>Kota</th>
              <th>NPWP</th>
              <th>No Telepon</th>
              <th>Aksi</th>
            </tr>
            @foreach($cruds as $crud)
            <tr class="item{{$crud->idperusahaan}}">
              <td>{{$crud->idperusahaan}}</td>
              <td>{{$crud->namaperusahaan}}</td>
              <td>{{$crud->alamatperusahaan}}</td>
              <td>{{$crud->kotaperusahaan}}</td>
              <td>{{$crud->npwp}}</td>
              <td>{{$crud->notelepon}}</td>
              <td>
                <button class="edit-modal btn btn-info btn-sm" data-idperusahaan="{{$crud->idperusahaan}}" data-namaperusahaan="{{$crud->namaperusahaan}}" data-alamatperusahaan="{{$crud->alamatperusahaan}}" data-kotaperusahaan="{{$crud->kotaperusahaan}}" data-npwp="{{$crud->npwp}}" data-notelepon="{{$crud->notelepon}}">Edit</button>
                <button class="delete-modal btn btn-danger btn-sm" data-idperusahaan="{{$crud->idperusahaan}}" data-namaperusahaan="{{$crud->namaperusahaan}}" >Delete</button>
              </td>
            </tr>
            @endforeach
          </table>
          <!-- Edit modal -->
          <div class="modal fade bs-example-modal-sm2" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
            <div class="modal-dialog modal-sm" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Ubah Data</h4>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" id="id-edit">
                    <input type="text" name="nama-edit" id="nama-edit" class="form-control" placeholder="Nama Perusahaan">
                  </div>
                  <div class="form-group">
                    <input type="text" name="alamat-edit" id="alamat-edit" class="form-control" placeholder="Alamat Perusahaan">
                  </div>
                  <div class="form-group">
                    <input type="text" name="kota-edit" id="kota-edit" class="form-control" placeholder="Kota Perusahaan">
                  </div>
                  <div class="form-group">
                    <input type="text" name="npwp-edit" id="npwp-edit" class="form-control" placeholder="Nomor Pokok Wajib Pajak">
                  </div>
                  <div class="form-group">
                    <input type="text" name="telepon-edit" id="telepon-edit" class="form-control" placeholder="Nomor Telepon">
                  </div>
                  <div class="form-group" align="right">
                    <button type="button" id="edit" class="btn btn-primary" data-dismiss="modal">Ubah</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Delete modal -->
          <div class="modal fade bs-example-modal-sm3" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
            <div class="modal-dialog modal-sm" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Delete Data</h4>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    {{ csrf_field() }}
                    <input type="text" name="id-delete" id="id-delete">
                    <!-- <input type="text" name="nama-delete" id="nama-delete"> -->
                    <p>Yakin Ingin Menghapus Data? </p>
                  </div>
                  <div class="form-group" align="right">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" id="delete" class="btn btn-danger" data-dismiss="modal">Delete</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



@endsection
@section('javascript')
<script>
  $(document).on('click', '.edit-modal', function() {
    $('#id-edit').val($(this).data('idperusahaan'));
    $('#nama-edit').val($(this).data('namaperusahaan'));
    $('#alamat-edit').val($(this).data('alamatperusahaan'));
    $('#kota-edit').val($(this).data('kotaperusahaan'));
    $('#npwp-edit').val($(this).data('npwp'));
    $('#telepon-edit').val($(this).data('notelepon'));
    $('.bs-example-modal-sm2').modal('show');
  });
  $(document).on('click', '.delete-modal', function() {
    $('#id-delete').val($(this).data('idperusahaan'));
    //$('#nama-delete').val($(this).data('namaperusahaan'));
    $('.bs-example-modal-sm3').modal('show');
  });
  $("#add").click(function() {
    $.ajax({
      type: 'post',
      url: '/crud/store',
      data: {
        '_token': $('input[name=_token]').val(),
        //'idperusahaan': $('input[name=idperusahaan]').val(),
        'namaperusahaan': $('input[name=namaperusahaan]').val(),
        'alamatperusahaan': $('input[name=alamatperusahaan]').val(),
        'kotaperusahaan': $('input[name=kotaperusahaan]').val(),
        'npwp': $('input[name=npwp]').val(),
        'notelepon': $('input[name=notelepon]').val()
      },
      success: function(data) {
        if ((data.errors)){
          $('.error').removeClass('hidden');
          $('.error').text(data.errors.name);
        }
        else {
          $('.error').remove();
          $('#table').append("<tr class='item" + data.idperusahaan + "'><td>" + data.idperusahaan + "</td><td>"
            + data.namaperusahaan + "</td><td>" + data.alamatperusahaan + "</td><td>" + data.kotaperusahaan + "</td><td>" +
            data.npwp + "</td><td>" + data.notelepon + "</td><td><button class='edit-modal btn btn-info btn-sm' data-idperusahaan='" + data.idperusahaan + "' data-namaperusahaan='"
            + data.namaperusahaan + "' data-alamatperusahaan='" + data.alamatperusahaan + "' data-kotaperusahaan='" + data.kotaperusahaan
            + "' data-npwp='" + data.npwp + "' data-notelepon='" + data.notelepon + "'>Edit</button> <button class='delete-modal btn btn-danger btn-sm' data-idperusahaan='"
            + data.idperusahaan + "' data-namaperusahaan='" + data.namaperusahaan + "'>Delete</button></td></tr>");
          toastr.success("Data Berhasil Disimpan.");
        }
      },
    });
    //$('#idperusahaan').val('');
    $('#namaperusahaan').val('');
    $('#alamatperusahaan').val('');
    $('#kotaperusahaan').val('');
    $('#npwp').val('');
    $('#notelepon').val('');
  });

  $("#edit").click(function() {
    $.ajax({
      type: 'post',
      url: '/crud/update',
      data: {
        '_token': $('input[name=_token]').val(),
        'idperusahaan': $('input[name=id]').val(),
        'namaperusahaan': $('input[name=nama-edit]').val(),
        'alamatperusahaan': $('input[name=alamat-edit]').val(),
        'kotaperusahaan': $('input[name=kota-edit]').val(),
        'npwp': $('input[name=npwp-edit]').val(),
        'notelepon': $('input[name=telepon-edit]').val()
      },
      success: function(data) {
        $('.item' + data.idperusahaan).replaceWith("<tr class='item" + data.idperusahaan + "'><td>" + data.idperusahaan
          + "</td><td>" + data.namaperusahaan + "</td><td>" + data.alamatperusahaan + "</td><td>" + data.kotaperusahaan + "</td><td>" + data.npwp
          + "</td><td>" + data.notelepon + "</td><td><button class='edit-modal btn btn-info btn-sm' data-idperusahaan='" + data.idperusahaan + "' data-namaperusahaan='" + data.namaperusahaan
          + "' data-alamatperusahaan='" + data.alamatperusahaan + "' data-kotaperusahaan='" + data.kotaperusahaan + "' data-npwp'" + data.npwp
          + "' data-notelepon='" + data.notelepon + "'>Edit</button> <button class='delete-modal btn btn-danger btn-sm' data-idperusahaan='" + data.idperusahaan + "' data-namaperusahaan='" + data.namaperusahaan
          + "' data-alamatperusahaan='" + data.alamatperusahaan + "' data-kotaperusahaan='" + data.kotaperusahaan + "' data-npwp='" + data.npwp + "'data-notelepon='" + data.notelepon + "'>Delete</button></td></tr>");
        toastr.success("Data Berhasil Diubah.");
      },
    });
  });

  $("#delete").click(function() {
    $.ajax({
      type: 'post',
      url: '/crud/destroy',
      data: {
        '_token': $('input[name=_token]').val(),
        'idperusahaan' : $('input[name=id-delete]').val()
      },
      success: function(data) {
        $('.item' + data.idperusahaan).remove();
        toastr.success("Data Berhasil Dihapus.");
      }
    });
  });
</script>
@endsection
