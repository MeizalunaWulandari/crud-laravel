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
            <form action="/auth/logout" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Logout</button>
            </form>
            
        </nav>
        <h1>Welcome, {{ auth()->user()->name }}</h1>

            <table border="1">
                <tr>
                    <th>Author</th>
                    <th>Content</th>
                    <th>Action</th>
                </tr>
        @foreach ($qoutes as $qoute)
                <tr>
                    <td>{{ $qoute->author->name }}</td>
                    <td>{{ $qoute->content }}</td>
                    <td ><a href="/qoutes/{{ $qoute->id }}/edit">Edit</a> | 
                        <form action="/qoutes/{{ $qoute->id }}" method="POST">
                            @csrf
                            @method('DELETE');
                            <button onclick="confirm('Are you sure')" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
        @endforeach
            </table>

    </center>
</body>
</html>