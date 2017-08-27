<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Daily UI - Day 1 Sign In</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<!-- Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="../css/animate.css">
	<!-- Custom Stylesheet -->
	<link rel="stylesheet" href="../css/login-style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

	<title>Register</title>
	<!-- CORE CSS-->

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">

	<style type="text/css">
	html,
	body {
		height: 100%;
	}
	html {
		display: table;
		margin: auto;
	}
	body {
		display: table-cell;
		vertical-align: middle;
	}
	.margin {
		margin: 0 !important;
	}
	</style>

</head>

<body class="blue">
	<div id="login-page" class="row">
		<div class="col s12 z-depth-6 card-panel">
			<form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
				{{ csrf_field() }}
				<div class="row">
					<div class="input-field col s12 center">
						<img src="http://arionindonesia.co.id/pic/logo-logo-megatech-online-logo.png" alt="" class="responsive-img valign profile-image-login">
						<p class="center login-form-text">Lelang Online PT. Arion Indonesia</p>
					</div>
				</div>
				<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
					<div class="input-field col s12">
						<i class="mdi-action-account-box prefix"></i>
						<input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Nama Perusahaan" required autofocus>
						@if ($errors->has('username'))
							<span class="help-block">
								<strong>{{ $errors->first('username') }}</strong>
							</span>
						@endif
					</div>
				</div>
				<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
					<div class="input-field col s12">
						<i class="mdi-maps-local-post-office prefix"></i>
						<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-mail" required autofocus>
						@if ($errors->has('email'))
							<span class="help-block">
								<strong>{{ $errors->first('email') }}</strong>
							</span>
						@endif
					</div>
				</div>
				<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
					<div class="input-field col s12">
						<i class="mdi-action-lock-open prefix"></i>
						<input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" required autofocus>
						@if ($errors->has('password'))
							<span class="help-block">
								<strong>{{ $errors->first('password') }}</strong>
							</span>
						@endif
					</div>
				</div>
				<div class="form-group">
					<div class="input-field col s12">
						<i class="mdi-action-lock-outline prefix"></i>
						<input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Konfirmasi Password" required>
					</div>
				</div>
				<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
					<div class="input-field col s12">
						<i class="mdi-maps-my-location prefix"></i>
						<input id="alamatperusahaan" type="text" class="form-control" name="alamatperusahaan" value="{{ old('alamatperusahaan') }}" placeholder="Alamat Perusahaan" required autofocus>
						@if ($errors->has('alamatperusahaan'))
							<span class="help-block">
								<strong>{{ $errors->first('alamatperusahaan') }}</strong>
							</span>
						@endif
					</div>
				</div>
				<div class="form-group{{ $errors->has('kotaperusahaan') ? ' has-error' : '' }}">
					<div class="input-field col s12">
						<i class="mdi-maps-place prefix"></i>
						<input id="kotaperusahaan" type="text" class="form-control" name="kotaperusahaan" value="{{ old('kotaperusahaan') }}" placeholder="Kota Perusahaan" required autofocus>
						@if ($errors->has('kotaperusahaan'))
							<span class="help-block">
								<strong>{{ $errors->first('kotaperusahaan') }}</strong>
							</span>
						@endif
					</div>
				</div>
				<div class="form-group{{ $errors->has('npwp') ? ' has-error' : '' }}">
					<div class="input-field col s12">
						<i class="mdi-action-assignment prefix"></i>
						<input id="npwp" type="text" class="form-control" name="npwp" value="{{ old('npwp') }}" placeholder="Nomor Pokok Wajib Pajak" required autofocus>
						@if ($errors->has('npwp'))
							<span class="help-block">
								<strong>{{ $errors->first('npwp') }}</strong>
							</span>
						@endif
					</div>
				</div>
				<div class="form-group{{ $errors->has('notelepon') ? ' has-error' : '' }}">
					<div class="input-field col s12">
						<i class="mdi-communication-call prefix"></i>
						<input id="notelepon" type="text" class="form-control" name="notelepon" value="{{ old('notelepon') }}" placeholder="No Telepon" required autofocus>
						@if ($errors->has('notelepon'))
							<span class="help-block">
								<strong>{{ $errors->first('notelepon') }}</strong>
							</span>
						@endif
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<input type="submit" class="btn waves-effect waves-light col s12" value="Register">
					</div>
					<div class="input-field col s12">
						<p class="margin center medium-small sign-up">Sudah Punya Akun?<a href="{{ url('/login') }}">Login</a></p>
					</div>
				</div>
			</form>
		</div>
	</div>
</body>

</html>
