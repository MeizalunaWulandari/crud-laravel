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

<form action="/user/{{ $user->username }}/edit/password" method="POST">
    @csrf
    @method('PUT')

    <label for="password">Current password</label>
    <input type="password" name="password" placeholder="Current password" autofocus>
    @error('password')
        <p>{{ $message }}</p>
    @enderror

    <label for="password">New password</label>
    <input type="password" name="newPassword" placeholder="New password">
    @error('newPassword')
        <p>{{ $message }}</p>
    @enderror

    <label for="password">Confirm new password</label>
    <input type="password" name="newPassword_confirmation" placeholder="Confirm new password">
    

    <button type="submit">Submit</button>

    <a href="/user/{{ $user->username }}">Cancel</a>
</form>
</pre>
</center>
</body>
</html>