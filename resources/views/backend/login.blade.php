<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('backend/docs/css/main.css') }}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login - Ponpes Nurul Iman Al Hasanah</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h4 class="text-center">PONPES <br> NURUL IMAN AL HASANAH</h4>
      </div>
      <div class="login-box">
        <form class="login-form" action="{{ route('admin.login.proses') }}" method="POST">
            @csrf
            <h4 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>MASUK</h4>
            @if(Session::has('msg'))
                <div class="alert alert-danger">{{ Session::get('msg') }}</div>
            @endif
            <div class="form-group">
                <label class="control-label">EMAIL</label>
                <input class="form-control" type="text" name="email" placeholder="Email" autofocus>
            </div>
            <div class="form-group">
                <label class="control-label">PASSWORD</label>
                <input class="form-control" type="password" name="password" placeholder="Password">
            </div>
            <div class="form-group btn-container">
                <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
            </div>
        </form>
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="{{ url('backend/docs/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ url('backend/docs/js/popper.min.js') }}"></script>
    <script src="{{ url('backend/docs/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('backend/docs/js/main.js') }}"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{ url('backend/docs/js/plugins/pace.min.js') }}"></script>
  </body>
</html>