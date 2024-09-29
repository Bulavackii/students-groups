<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Группа: {{ $group->title }}</title>
</head>
<body>
    <h1>Группа: {{ $group->title }}</h1>
    <p>Дата начала: {{ $group->start_from }}</p>
    <p>Активна: {{ $group->is_active ? 'Да' : 'Нет' }}</p>

    <h2>Студенты:</h2>
    <ul>
        @foreach($students as $student)
            <li>
                {{ $student->name }} {{ $student->surname }}
                <form action="{{ route('groups.students.destroy', [$group->id, $student->id]) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Вы уверены, что хотите удалить этого студента?');">Удалить</button>
                </form>
            </li>
        @endforeach
    </ul>

    <a href="{{ route('groups.students.create', $group) }}">Добавить студента</a>
    <br><br>
    <a href="{{ route('groups.index') }}">Вернуться к списку всех групп</a>
</body>
</html>
