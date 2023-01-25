<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
<center>

    @if (session()->has('success'))
        <h1>{{ session('success') }}</h1>
    @endif

<pre>
<form action="/auth/register" method="POST">
    @csrf
    <label for="name">Name</label>
    <input type="text" name="name" value="{{ old('name') }}" autofocus>
    @error('name')
        <p>{{ $message }}</p>
    @enderror

    <label for="username">Username</label>
    <input type="text" name="username" value="{{ old('username') }}">
    @error('username')
        <p>{{ $message }}</p>
    @enderror

    <label for="email">Email</label>
    <input type="email" name="email" value="{{ old('email') }}">
    @error('email')
        <p>{{ $message }}</p>
    @enderror

    <label for="password">password</label>
    <input type="password" name="password" >
    @error('password')
        <p>{{ $message }}</p>
    @enderror

    <label for="password_confirmation">Confirm password</label>
    <input type="password" name="password_confirmation">
    @error('password_confirmation')
        <p>{{ $message }}</p>
    @enderror

    
    <button type="submit">Submit</button>
</pre>
</form>
<a href="/auth/login">Login</a>
</center>
</body>
</html>