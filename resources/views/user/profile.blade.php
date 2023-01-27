<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <center>
        <nav>
            <a href="/qoutes">Home</a>
            <a href="/qoutes/create">Add </a>
            <a href="/user/{{ auth()->user()->username }}">Profile</a>
            <form action="/auth/logout" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Logout</button>
            </form>
            
        </nav>
        
        

        

            <div>
                Name : {{ $user->name }}
            </div>

            <div>
                Username : {{ $user->username }}
            </div>
        @if (auth()->user()->username == $user->username)
            <div>
                <a href="/user/{{ $user->username }}/edit">Edit Profile</a>
            </div>
        @endif

    </center>
</body>
</html>