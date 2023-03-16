<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<link rel="stylesheet" href="{{ asset('cssbyNamVu/login.css') }}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

	<style>
		body{
			background: url('storage/imgNV/bautroidaysao.png');
			background-size:auto;
		}
	</style>
</head>
<body>
	<div class="container">

		{{-- login form --}}
		<div class="leftside">

			<form action="" method="post">
				@csrf
				<div class="up">
					<a href="{{ route('user.home') }}"><img class="imghome" src="{{ asset('storage/imgNV/logo1.png') }}" alt="" height="50px" ></a>
					<h2>Welcome to OceanGate</h2>
					<div>
						<p>Email</p>
						<input class="typein" type="text" name="loginMail" placeholder="example@email.com" value="{{ old('loginMail') }}"><br>
					</div>
					<div>
						<p>Password</p>
						<input class="typein" type="password" name="loginPass" placeholder="password" value="{{ old('loginPass') }}">
					</div>
                    @if(session('msg'))
                    <span style="margin: 5px">{{ session('msg') }}</span>
                    <br>
                    @endif
					<input type="checkbox" name="remember"> Remember me
					<br>
					<button>Sign in</button>

				</div>

				<div class="down">

					<div>
						<a href=""><p><i class="fa-brands fa-facebook icon"></i> Sign in with facebook</p></a href="">
					</div>
					<br>
					<div>
						<a href=""><p><i class="fa-brands fa-google icon"></i> Sign in with google</p></a href="">

					</div><br>

					<p class="signup">Create an account <a href="{{ route('user.register') }}">Sign up</a></p>

				</div>
			</form>
		</div>
		<div class="rightside"></div>
	</div>

</body>
</html>
