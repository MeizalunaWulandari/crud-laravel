<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
<center>

    @if (session()->has('success'))
        <h1>{{ session('success') }}</h1>
    @endif
<pre>
    <form action="/auth/login" method="POST">
        @csrf
        <label for="username">Username</label>
        <input type="text" name="username" value="{{ old('username') }}" autofocus>
        @error('username')
            <p>{{ $message }}</p>
        @enderror

        <label for="password">Password</label>
        <input type="password" name="password" value="{{ old('password') }}" autofocus>
        @error('password')
            <p>{{ $message }}</p>
        @enderror
        
        <button type="submit">Login</button>
    <a href="/qoutes">Cancel</a>
    </form>
</pre>
</center>
</body>
</html>