<!DOCTYPE html>
<html>
<head>
    <title>Edit | {{ $qoute->content }}</title>
</head>
<body>
<center>

    @if (session()->has('success'))
        <h1>{{ session('success') }}</h1>
    @endif

<form action="/qoutes/{{ $qoute->id }}" method="POST">
    @csrf
    @method('PUT')
    <label for="content">Content</label>
    <input type="text" name="content" value="{{ $qoute->content }}" autofocus>
    @error('content')
        <p>{{ $message }}</p>
    @enderror
    <button type="submit">Submit</button>
<a href="/qoutes">Cancel</a>
</form>
</center>
</body>
</html>