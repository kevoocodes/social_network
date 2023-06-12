<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Social Networking</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">

  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Social</b>NETWORKING</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="input-group mb-3">
          <input type="text" name="fullname"  value="{{old('fullname')}}" class="form-control" placeholder="Full name">
            @if ($errors->has('fullname'))
            <div class="error text-danger">
                {{ $errors->first('fullname')}}
            </div>
            @endif
        </div>
        <div class="input-group mb-3">
          <input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Email">
          @if ($errors->has('email'))
          <div class="error text-danger">
            {{ $errors->first('email')}}
          </div>
          @endif
        </div>

        <div class="input-group mb-3">
            <input type="text" name="username" value="{{old('username')}}" class="form-control" placeholder="Username">
            @if ($errors->has('username'))
            <div class="error text-danger">
              {{ $errors->first('username')}}
            </div>
            @endif
          </div>

        <div class="input-group mb-3">
            <input type="text" name="phonenumber" value="{{old('phonenumber')}}" class="form-control" placeholder="phonenumber"> <br>
            <div class="input-group-append">
                @if ($errors->has('phonenumber'))
                <div class="error text-danger">
                  {{ $errors->first('phonenumber')}}
                </div>
                @endif
              </div>
        </div>

        <div class="input-group mb-3">
          <label for="">Your Image</label> <br>
          <input type="file" name="image"  class="form-control" placeholder="image"> <br>
          <div class="input-group-append">
              @if ($errors->has('image'))
              <div class="error text-danger">
                {{ $errors->first('image')}}
              </div>
              @endif
          </div>
      </div>

        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          @if ($errors->has('password'))
          <div class="error text-danger">
            {{ $errors->first('password')}}
          </div>
          @endif
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password_comfirmation" class="form-control" placeholder="Retype password">
          @if ($errors->has('password_comfirmation'))
                      <div class="error text-danger">
                        {{ $errors->first('password_comfirmation')}}
                      </div>
        @endif
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div>

      <a href="/welcome" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->


</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/dist/js/adminlte.min.js')}}"></script>
</body>
</html>
