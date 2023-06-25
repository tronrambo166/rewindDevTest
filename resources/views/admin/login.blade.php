<!DOCTYPE html>
<html lang="en">
  <head>
    @include('layout.partials.head_admin')
  </head>

  <body>
  @if(!Route::is(['login','register','forgot-password','lock-screen','error-404','error-500']))
  
  @if(Session::has('admin'))
  @include('layout.partials.header_admin')
 <@include('layout.partials.nav_admin')
 @endif
 
 @endif
 
 <!-- Main Wrapper -->
<div class="main-wrapper login-body">
            <div class="login-wrapper">
            	<div class="container">
                	<div class="loginbox">
                    	<div class="login-left">
							<img class="img-fluid" src="../assets_admin/img/logo-white.png" alt="Logo">
                        </div>
                        <div class="login-right">
							<div class="login-right-wrap">

								<p class="text-danger"> @if(Session::has('log_err')) {{Session::get('log_err')}} </p>
								@endif
								<p class="text-success"> @if(Session::has('reset')) {{Session::get('reset')}} </p>
								@endif

								<h1>Login</h1>
								<p class="account-subtitle">Access to our dashboard</p>
								
								<!-- Form -->
								<form action="{{route('adminLogin')}}"  method="post"> @csrf
									<div class="form-group">
										<input name="email" class="form-control" type="text" placeholder="Email">
									</div>
									<div class="form-group">
										<input name="password"class="form-control" type="password" placeholder="Password">
									</div>
									<div class="form-group">
										<button class="btn btn-primary btn-block" type="submit">Login</button>
									</div>
								</form>
								<!-- /Form -->
								
								<div class="text-center forgotpass"><a href="{{route('forgot','email')}}">Forgot Password?</a></div>
								<div class="login-or">
									<span class="or-line"></span>
									
								</div>
								  
								
								{{--  
								<div class="text-center dont-have">Don’t have an account? <a href="register">Register</a></div>
								--}}
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- /Main Wrapper -->

 @include('layout.partials.footer_admin-scripts')


  </body>
</html>


