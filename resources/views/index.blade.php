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
        <hr>
        @auth
            <a style="color: green;" href="/qoutes/{{ $qoute->id }}/edit">Edit</a>
            <form action="/auth/logout" method="POST">
                @csrf
                @method("DELETE")
                <button type="submit">Logout</button>
            </form>
        @endauth
    </div>
        
    @endforeach

</center>
</body>
</html>