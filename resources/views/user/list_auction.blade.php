@extends('user.master')
@section('title', "Beranda Lelang")

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
    <li class="active"><a href="{{url('/users/beranda_lelang')}}"><img src="../img/auction.svg" width="20px" height="20px"> <span>Beranda Lelang</span></a></li>

    <li><a href="{{url('/users/profil_user')}}"><img src="../img/profil.svg" width="20px" height="20px"> <span>Profil Perusahaan</span></a></li>
   <li><a href="{{url('/users/auction_stats')}}"><img src="../img/auction.svg" width="20px" height="20px"> <span>Lelang Saya</span></a></li>
   <li class="treeview">
    <a href="{{url('/users/help')}}"><img src="../img/question-mark.svg" width="20px" height="20px"> <span>Bantuan</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="{{url('/users/step_auction')}}"><img src="../img/settings.svg" width="20px" height="20px"> <span>Prosedur Lelang</span></a></li>
      <li><a href="{{url('/users/requirement')}}"><img src="../img/license.svg" width="20px" height="20px"> <span>Syarat & Ketentuan</span></a></li>
    </ul>
  </li>
  <li><a href="{{url('/users/about')}}"><img src="../img/info.svg" width="20px" height="20px"> <span>Tentang</span></a></li>
  </ul>
      @stop

      @section('content-wrapper')
      Daftar Lelang
      @stop
      @section('content')
      <div class="row">
        @foreach($cruds as $crud)
        <div class="col-md-6">
          <!-- Box Comment -->
          <div class="box box-widget">
            <div class="box-header with-border">
              <div class="user-block">
                <img class="img-circle" src="/img/avatar5.png" alt="User Image">
                <span class="username"><a href="{{route('beranda_lelang.show', $crud->idlelang)}}">{{$crud->namalelang}}</a></span>
                <span class="description">Shared publicly  {{$crud->created_at}}</span>
              </div>

              <!-- /.user-block -->
              <div class="box-tools">
                {{-- <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Mark as read">
                <i class="fa fa-circle-o"></i></button> --}}
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                {{-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> --}}
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="text-align:center">
              <table class="table">
                <tr>
                  <th>Penawaran Ditutup</th>
                  <td>{{$crud->tanggaltutup}}</td>
                </tr>
                <tr>
                  <th>Document Lelang Offline</th>
                  <td>{{$crud->uploadfile}}</td>
                </tr>
                <tr>
                  <th>Pemenang</th>
                  <td>{{$crud->pemenang}}</td>
                </tr>
              </table>
              <br>

              <div id="clockdiv-{{$crud->idlelang}}" class="countdown-lelang">
                <div>
                  <span class="days"></span>
                  <span class="hours"></span>
                  <span class="minutes"></span>
                  <span class="seconds"></span>
                </div>
                <div>
                  <span class="smalltext">Hari</span>
                  <span class="smalltext">Jam</span>
                  <span class="smalltext">Menit</span>
                  <span class="smalltext">Detik</span>
                </div>
                  {{-- <div class="smalltext">Jam</div>
                <div>

                  <div class="smalltext">Menit</div>
                </div>
                <div>
                  <div class="smalltext">Detik</div>
                </div> --}}
                <a href="{{route('beranda_lelang.show', $crud->idlelang)}}" class="btn btn-primary btn-lihat-rincian">Lihat Rincian</a>
              </div><br><br>

          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      @endforeach
  @endsection

  @section('script')
    <script type="text/javascript">
    @foreach ($cruds as $key => $crud)
      // 60 * 24 * 1000 (milisecond)
      initializeClock('clockdiv-{{$crud->idlelang}}', new Date(Date.parse('{{$crud->tanggaltutup}}')));
    @endforeach
    </script>
  @endsection
