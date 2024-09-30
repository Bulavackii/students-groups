<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Учебные группы</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Подключение стилей -->
</head>
<body>
    <header>
        <nav>
            <a href="{{ route('groups.index') }}">Группы</a>
            <!-- Можно добавить дополнительные ссылки здесь -->
        </nav>
    </header>

    <main>
        @yield('content')

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </main>

    <footer>
        <p>Учебные группы © 2024</p>
    </footer>
</body>
</html>
