@extends('admin.master')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3>CRUD Laravel 5.3</h3>
			<div class="panel panel-default">
				<div class="panel-body">
					<form action="{{route('crud.update', $cruds->id_perusahaan)}}" method="post">
						<input name="_method" type="hidden" value="PATCH">
						{{csrf_field()}}

						<div class="form-group{{ $errors->has('nama_perusahaan') ? ' has-error' : '' }}">
							<input type="text" name="nama_perusahaan" class="form-control" placeholder="Nama" value="{{$cruds->nama_perusahaan}}">
							{!! $errors->first('nama_perusahaan', '<p class="help-block">:message</p>') !!}
						</div>
						<div class="form-group{{ $errors->has('alamat_perusahaan') ? ' has-error' : '' }}">
							<input type="text" name="alamat_perusahaan" class="form-control" placeholder="Nomor Handphone" value="{{$cruds->alamat_perusahaan}}">
							{!! $errors->first('alamat_perusahaan', '<p class="help-block">:message</p>') !!}
						</div>

						<div class="form-group{{ $errors->has('nama_perusahaan') ? ' has-error' : '' }}">
							<input type="text" name="kota_perusahaan" class="form-control" placeholder="Nama" value="{{$cruds->kota_perusahaan}}">
							{!! $errors->first('kota_perusahaan', '<p class="help-block">:message</p>') !!}
						</div>
						<div class="form-group{{ $errors->has('npwp') ? ' has-error' : '' }}">
							<input type="text" name="npwp" class="form-control" placeholder="Nomor Handphone" value="{{$cruds->npwp}}">
							{!! $errors->first('npwp', '<p class="help-block">:message</p>') !!}
						</div>
						<div class="form-group{{ $errors->has('no_telepon') ? ' has-error' : '' }}">
							<input type="text" name="no_telepon" class="form-control" placeholder="Nama" value="{{$cruds->no_telepon}}">
							{!! $errors->first('no_telepon', '<p class="help-block">:message</p>') !!}
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
