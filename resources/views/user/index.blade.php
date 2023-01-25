<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <center>
        <nav>
            <a href="tes">Home</a>
            <form action="/auth/logout" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Logout</button>
            </form>
            
        </nav>
        <h1>Welcome, {{ auth()->user()->name }}</h1>
    </center>
</body>
</html>