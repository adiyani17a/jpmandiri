<!DOCTYPE html>
<html lang="en">
@include('layouts._loginHead')
<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="{{ asset('assets/Login_v1/images/img-01.png') }}" alt="IMG">
                </div>
                <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <span class="login100-form-title">
                        JPMANDIRI
                    </span>
                    @if ($errors->has('username'))
                        <div class="alert alert-danger" role="alert">
                          Username atau password yang anda masukan salah
                        </div>
                    @endif

                    <div class="wrap-input100 validate-input"  data-validate = "Username harus diisi">
                        <input class="input100" type="text" name="username" placeholder="Username">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input"  data-validate = "Password harus diisi">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>
{{-- 
                    <div class="text-center p-t-12">
                        <span class="txt1">
                            Forgot
                        </span>
                        <a class="txt2" href="#">
                            Username / Password?
                        </a>
                    </div>
 --}}
                    <div class="text-center p-t-136">
                        <a class="txt2" href="#">
                            Mengajukan Akun
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@include('layouts._loginScript')
</body>
</html>
