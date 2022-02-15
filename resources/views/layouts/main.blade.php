<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <nav>
            <ul>
                <li>
                    <a href="{{ route('main.index') }}">Main</a>
                    <a href="{{ route('post.index') }}">Posts</a>
                    <a href="{{ route('about.index') }}">About</a>
                    <a href="{{ route('contact.index') }}">Contacts</a>
                </li>
            </ul>
        </nav>
    </div>
    @yield('content')
</body>

</html>
