@extends('layouts.app')

@section('content')
    <h1>Список групп</h1>
    <a href="{{ route('groups.create') }}">Создать новую группу</a>

    @foreach ($groups as $group)
        <div>
            <h2>{{ $group->title }}</h2>
            <p>Дата начала: {{ $group->start_from }}</p>
            <p>Статус: {{ $group->is_active ? 'Активна' : 'Неактивна' }}</p>
            <a href="{{ route('groups.show', $group->id) }}">Подробнее</a>

            <form action="{{ route('groups.destroy', $group->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Вы уверены, что хотите удалить эту группу?');">Удалить группу</button>
            </form>
        </div>
        <hr>
    @endforeach
@endsection
