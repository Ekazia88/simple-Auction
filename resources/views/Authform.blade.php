<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  	<script language='JavaScript'>
var txt="LELO - LELANG ONLINE | LOGIN AND SIGN UP";
var speed=300;
var refresh=null;
function action() { document.title=txt;
txt=txt.substring(1,txt.length)+txt.charAt(0);
refresh=setTimeout("action()",speed);}action();
</script>
	<link rel="stylesheet" href="{{ asset('auth') }}/bootstrap.css">
  <link rel="stylesheet" href="{{ asset('auth') }}/style.css">
</head>
<body>
<!-- partial:index.partial.html -->
@include('layouts.partials.alert')
<div class="form-structor">
	<div class="signup">
		<h2 class="form-title" id="signup"><span>or</span>Sign up</h2>
		@if(session('error'))
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					{{session('error')}}
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				@endif
		<form method="post" action="{{route('postregister')}}">
			{{ csrf_field() }}
			<div class="form-holder">  
				<input id="name" name="name" type="text" class="input @error('name') is-invalid @enderror" name="name" value="{{old('name') }}" required autocomplete="name" placeholder="name" autofocus>
				@error('name')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
				@enderror
				<input id="username" name="username" type="text" class="input @error('username') is-invalid @enderror" placeholder="Username"  value="{{old('username') }}" required autocomplete="username" autofocus>
				@error('username')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
				@enderror
				<input  id="email" name="email" type="email" class="input @error('email') is-invalid @enderror" placeholder="Email"  value="{{old('email') }}" required autocomplete="email" autofocus>
				@error('email')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
				@enderror
				<input type="password"  name="password" class="input @error('password') is-invalid @enderror" placeholder="Password"  value="{{old('password') }}" required autocomplete="new-password"/>
				@error('password')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
				@enderror
				<input id="password-confirm" type="password" class="input" name="password_confirmation" placeholder="Retype Password" required autocomplete="new-password">
				<input id="telp" name="telp" type="phone" class="input @error('telp') is-invalid @enderror" placeholder="Telepon" value="{{old('telp') }}" required autocomplete="telp" autofocus>
				@error('telp')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
				@enderror
			</div>
			<button type="submit" class="submit-btn">{{ __('Sign Up') }}</button>
		</form>
	</div>
	<div class="login slide-up">
		<div class="center">
			<h2 class="form-title" id="login"><span>or</span>Log in</h2>
			<div class="card shadow-lg border-0 rounded-lg mt-5">
				{{-- Error Alert --}}
				@if(session('error'))
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					{{session('error')}}
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				@endif
				<form method="post" action="{{ route('proseslogin') }}">
					@csrf
					<div class="form-holder">
						<input id="email"  name="email" type="text" class="input @error('email') is-invalid @enderror" placeholder="email" value="{{old('email') }}" required autocomplete="email" autofocus>
						@error('email')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
						<input id="password"  name="password" type="password" class="input @error('password') is-invalid @enderror" placeholder="Password" required autocomplete="current-password">
						@error('password')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>
					<button type="submit" class="submit-btn">{{ __('Log In') }}</button>
				</form>
		</div>
	</div>
</div>
<!-- partial -->
<script src="{{asset('auth') }}/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="{{asset('auth') }}/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="{{asset('auth') }}/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script  src="{{ asset('auth') }}/script.js"></script>

</body>
</html>
