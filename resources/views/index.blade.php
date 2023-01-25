<!DOCTYPE html>
<html>
<head>
    <title>Read</title>
</head>
<body>
<center>
    
    @if (session()->has('success'))
        <h1>{{ session('success') }}</h1>
    @endif

    @foreach ($qoutes as $qoute)
    <div>
        <p>{{ $qoute->content }}</p>
        <a style="color: green;" href="/qoutes/{{ $qoute->id }}/edit">Edit</a> | 
        <form action="/qoutes/{{ $qoute->id }}" method="POST">
            @csrf
            @method('DELETE');
            <button style="color: red;" type="submit">Edit</button>
        </form>
        <hr>
    </div>
        
    @endforeach

</center>
</body>
</html>