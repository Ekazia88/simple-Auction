<!doctype html>
<html lang="en">
  <head>
  	<title>Admin/Officer Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="{{asset('admin')}}/css/font-googleapis.css" rel="stylesheet">

	<link rel="stylesheet" href="{{ asset('lte') }}/plugins/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="{{asset('admin')}}/css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Admin/Officer Login</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<div class="d-flex">
		      		<div class="w-100">
		      			<h3 class="mb-4">Sign In</h3>
		      		</div>
						
		      	</div>
						<form method="post" action="{{route('adminlogin')}}" class="login-form">
                           @csrf
		      		<div class="form-group">
		      			<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-user"></span></div>
		      			<input type="text" name="email" class="form-control rounded-left" placeholder="Email" required>
		      		</div>

	            <div class="form-group">
	            	<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-lock"></span></div>
	              <input type="password"  name="password" class="form-control rounded-left" placeholder="Password" required>
	            </div>
	            <div class="form-group d-flex align-items-center">
	            
								<div class="w-100 d-flex justify-content-end">
		            	<button type="submit" class="btn btn-primary rounded submit">Login</button>
	            	</div>
	            </div>
	          
	          </form>
	        </div>
				</div>
			</div>
		</div>
	</section>

	<script src="{{asset('admin')}}/js/jquery.min.js"></script>
  <script src="{{asset('admin')}}/js/popper.js"></script>
  <script src="{{asset('admin')}}/js/bootstrap.min.js"></script>
  <script src="{{asset('admin')}}/js/main.js"></script>

	</body>
</html>

