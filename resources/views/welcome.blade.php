<!DOCTYPE html>
<html>
<head>
    <title>Create</title>
</head>
<body>
<center>

    @if (session()->has('success'))
        <h1>{{ session('success') }}</h1>
    @endif

<form action="/qoutes" method="POST">
    @csrf
    <label for="content">Content</label>
    <input type="text" name="content" value="{{ old('content') }}" autofocus>
    @error('content')
        <p>{{ $message }}</p>
    @enderror
    <button type="submit">Submit</button>

</form>
</center>
</body>
</html>