<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Material Login Form</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

  <link rel="stylesheet" href="css/style.css">


</head>

<body>
  <!-- Mixins-->
  <!-- Pen Title-->
  <div class="pen-title">
    <h1>Sistem Lelang</h1><span> by <a href='http://arionindonesia.com'>PT. Arion Indonesia</a></span>
  </div>
  <div class="container">
    <div class="card"></div>
    <div class="card">
      <h1 class="title">Login</h1>
      <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/login') }}">
        {{ csrf_field() }}

        <div class="input-container{{ $errors->has('email') ? ' has-error' : '' }}">
          <label for="email"></label>

          <div>
            <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="E-Mail Addres" required autofocus>

            @if ($errors->has('email'))
              <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
              </span>
            @endif
          </div>
          <div class="bar"></div>
        </div>

        <div class="input-container{{ $errors->has('password') ? ' has-error' : '' }}">
          <label for="password"></label>

          <div>
            <input id="password" type="password" name="password" placeholder="Password" required>

            @if ($errors->has('password'))
              <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
              </span>
            @endif
          </div>
          <div class="bar"></div>
        </div>
        <div class="button-container">
          <button><span>Go</span></button>
        </div>
        <div class="footer"><a href="#">Forgot your password?</a></div>
      </form>
    </div>
    @if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
  </div>
  {{-- <!-- Portfolio--><a id="portfolio" href="http://andytran.me/" title="View my portfolio!"><i class="fa fa-link"></i></a>
  <!-- CodePen--><a id="codepen" href="http://codepen.io/andytran/" title="Follow me!"><i class="fa fa-codepen"></i></a> --}}
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  <script src="js/index.js"></script>

</body>
</html>
