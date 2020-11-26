<html>
    <head>
        <title>Shin-team @yield('title')</title>
        <link rel="stylesheet" href="{{ asset('assets/css/public_css_bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/public_css_font-awesome.min.css') }}">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
<body>
    <div class="row mt-5">
        <div class="col-md-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                <h4 class="card-title text-center">LOGIN</h4>
                @include('admin.components.alert') 
                <form class="form-signin" method="POST" action="">
                @csrf
                    <div class="form-label-group">
                        <label for="inputEmail">Email:</label>
                        <input type="email" id="inputEmail" name="email" class="form-control" value="admin@gmail.com" placeholder="Email address" autofocus>
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group mt-3 mb-4">
                        <label for="inputPassword">Password:</label>
                        <input type="password" id="inputPassword" name="password" value="12345" class="form-control" placeholder="Password" data-toggle="password">
                        @error('password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="custom-control custom-checkbox mb-3 mt-2">
                        <input type="checkbox" class="custom-control-input" name="remember" id="customCheck1">
                        <label class="custom-control-label" for="customCheck1">Remember password</label>
                    </div>
                    <button class="btn btn-small btn-primary btn-block text-uppercase" type="submit">SUBMIT</button>
                    <hr class="my-2">
                    <a class="btn btn-small btn-info btn-block text-uppercase mb-1" href="/user/register" type="button">REGISTER</a>
                    <a  href="/user/forgot-password">*Forgot password</a>
                </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/public_js_bootstrap-show-password.min.js') }}"></script>
    <script src="{{ asset('assets/js/public_js_jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('assets/js/public_js_bootstrap.min.js') }}"></script>
    </body>
</html>
