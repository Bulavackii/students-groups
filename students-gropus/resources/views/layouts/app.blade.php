<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Учебные группы</title>
</head>
<body>
    <header>
        <nav>
            <a href="{{ route('groups.index') }}">Группы</a>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>Учебные группы © 2024</p>
    </footer>
</body>
</html>
