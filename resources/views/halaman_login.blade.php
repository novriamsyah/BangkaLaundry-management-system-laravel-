
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Bangka Londry</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('icons/icon/icon.png') }}">
    <link href="{{ asset('plugins/sweetalert/css/sweetalert.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/fontawesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/plugins/fontawesome/css/all.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/feathericon.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/plugins/morris/morris.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    {{-- <link href="{{ asset('css/style.css') }}" rel="stylesheet"> --}}
</head>
<body>
    {{-- <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div> --}}
    @if($penggunas->count() == 0)
    <div class="main-wrapper login-body">
		<div class="login-wrapper">
			<div class="container">
				<div class="loginbox">
					<div class="login-left"> <img class="img-fluid" src="{{asset('icons/icon/2.png')}}" alt="Logo"> </div>
					<div class="login-right">
						<div class="login-right-wrap">
							<h1 class="mb-3">Registrasi Akun Awal</h1>
                            <form method="POST" action="{{ url('/registrasi_awal') }}" class="mt-5 mb-5" name="form_register" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="nama" class="form-control" placeholder="Nama">
                                </div>
                                <div class="form-group">
                                    <div class="custom-file">
                                      <input type="file" class="custom-file-input avatar-input" name="avatar" id="customFile">
                                      <label class="custom-file-label" for="customFile">Pilih Foto</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                </div>
                                <button class="btn btn-primary btn-block login-form__btn submit ">Buat Akun</button>
                            </form>
							<div class="login-or"> <span class="or-line"></span> <span class="span-or">or</span> </div>
							<div class="social-login"> <span>Register with</span> <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a><a href="#" class="google"><i class="fab fa-google"></i></a> </div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    @else
    <div class="main-wrapper login-body">
		<div class="login-wrapper">
			<div class="container">
				<div class="loginbox">
					<div class="login-left"> <img class="img-fluid" src="{{asset('icons/icon/2.png')}}" alt="Logo"> </div>
					<div class="login-right">
						<div class="login-right-wrap">
							<h1>Login</h1>
							<p class="account-subtitle">Access to our dashboard</p>
                            @if($message = Session::get('gagal_login'))
                                    <div class="alert alert-danger alert-dismissible fade show" style="margin-top: 15px; margin-bottom: -20px;">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                                    </button> <strong>Peringatan!</strong> {{ $message }}</div>
                            @endif
							<form method="POST" action="{{ url('/login_verifikasi') }}" class="mt-5 mb-5 login-input" name="form_login">
                                @csrf
								<div class="form-group">
                                    <input type="text" name="username" class="form-control" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                </div>
								<div class="form-group">
									<button class="btn btn-primary btn-block login-form__btn submit" type="submit">Login</button>
								</div>
							</form>
							<div class="text-center forgotpass"><a href="forgot-password.html">Forgot Password?</a> </div>
							<div class="login-or"> <span class="or-line"></span> <span class="span-or">or</span> </div>
							<div class="social-login"> <span>Login with</span> <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a><a href="#" class="google"><i class="fab fa-google"></i></a> </div>
							<div class="text-center dont-have">Don’t have an account? <a href="register.html">Register</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    @endif
    <script src="{{asset('assets/js/jquery-3.5.1.min.js')}}"></script>
	<script src="{{asset('assets/js/popper.min.js')}}"></script>
	<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
	<script src="{{asset('assets/js/script.js')}}"></script>
    {{-- <script src="{{ asset('plugins/common/common.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('js/custom.min.js') }}"></script> --}}
    <script src="{{ asset('js/settings.js') }}"></script>
    <script src="{{ asset('js/gleek.js') }}"></script>
    <script src="{{ asset('js/styleSwitcher.js') }}"></script>
    <script src="{{ asset('js/jquery.form-validator.min.js') }}"></script>
    <script src="{{ asset('plugins/sweetalert/js/sweetalert.min.js') }}"></script>
    
    <script type="text/javascript">
        $(document).ready(function(){
            $( document ).on( 'focus', ':input', function(){
                $( this ).attr( 'autocomplete', 'off' );
            });
        });
        
        $(function() {
          $("form[name='form_register']").validate({
            rules: {
              nama: "required",
              username: {
                required: true,
                minlength: 3
              },
              password: {
                required: true,
                minlength: 5
              }
            },
            messages: {
              nama: "<span style='color: red;'>Nama tidak boleh kosong</span>",
              username: "<span style='color: red;'>Username tidak boleh kosong</span>",
              password: "<span style='color: red;'>Password tidak boleh kosong</span>"
            },
            submitHandler: function(form) {
              form.submit();
            }
          });
        });

        $(function() {
          $("form[name='form_login']").validate({
            rules: {
              username: {
                required: true,
                minlength: 3
              },
              password: {
                required: true,
                minlength: 5
              }
            },
            messages: {
              username: "<span style='color: red;'>Username tidak boleh kosong</span>",
              password: "<span style='color: red;'>Password tidak boleh kosong</span>"
            },
            submitHandler: function(form) {
              form.submit();
            }
          });
        });

        $('.avatar-input').change(function() {
          $(this).next('label').text($(this).val());
        });

        @if ($message = Session::get('tersimpan'))
        swal(
            "Berhasil!",
            "{{ $message }}",
            "success"
        )
        @endif
    </script>
</body>
</html>