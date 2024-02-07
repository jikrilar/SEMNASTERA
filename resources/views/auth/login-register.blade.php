<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/login-register.css') }}">
    <title>Document</title>
</head>
<body>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="{{ route('register') }}" method="POST">
            @csrf
			<h1 class="mb-3">Create Account</h1>
			<input type="text" placeholder="Name" name="name" required/>
            <input type="text" placeholder="Username" name="username" required/>
			<input type="email" placeholder="Email" name="email" required/>
			<input type="password" placeholder="Password" name="password" required/>
            {{-- <input type="password" placeholder="Re-Enter Password" name="password_confirmation" required/> --}}
            <input type="text" placeholder="Mobile Number" name="mobile_number" required/>
            <input type="text" placeholder="Institution" name="institution" required/>
            <label for="cost_id">Kategori</label>
            <select name="cost_id" class="form-select" id="cost_id">
                @foreach ($costs as $cost)
                    <option class="dropdown-item" value="{{ $cost->id }}">{{ $cost->category }}</option>
                @endforeach
            </select>
			<button type="submit" style="margin-top: 10px">Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="{{ route('login') }}" method="POST">
            @csrf
			<h1 class="mb-3">Sign in</h1>
			<input type="email" placeholder="Email" name="email"/>
			<input type="password" placeholder="Password" name="password"/>
			<a href="#">Forgot your password?</a>
			<button type="submit">Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>

<script src="{{ asset('js/login-register.js') }}"></script>

</body>
</html>