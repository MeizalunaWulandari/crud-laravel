<!DOCTYPE html>
<html>
<head>
    <title>Edit | {{ $user->name }}</title>
</head>
<body>
<center>
<pre>
    @if (session()->has('success'))
        <h1>{{ session('success') }}</h1>
    @endif

<form action="/user/{{ $user->username }}" method="POST">
    @csrf
    @method('PUT')
    <label for="name">Name</label>
    <input type="text" name="name" value="{{ $user->name }}" autofocus>
    @error('content')
        <p>{{ $message }}</p>
    @enderror

    <label for="username">username</label>
    <input type="text" name="username" value="{{ $user->username }}" >
    @error('username')
        <p>{{ $message }}</p>
    @enderror

    <label for="email">email</label>
    <input type="text" name="email" value="{{ $user->email }}" >
    @error('email')
        <p>{{ $message }}</p>
    @enderror

    <label for="password">password</label>
    <input type="password" name="password" placeholder="Current password">
    @error('password')
        <p>{{ $message }}</p>
    @enderror

    <button type="submit">Submit</button>

    <a href="/user/{{ $user->username }}/edit/password">Change password</a> | <a href="/user/{{ $user->username }}">Cancel</a>
</form>
</pre>
</center>
</body>
</html>