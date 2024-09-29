@extends('layouts.app')

@section('content')
    <h1>{{ $group->title }}</h1>
    <p>Дата начала: {{ \Carbon\Carbon::parse($group->start_from)->format('d.m.Y') }}</p>
    <p>Статус: {{ $group->is_active ? 'Активна' : 'Неактивна' }}</p>

    <h2>Студенты</h2>
    <a href="{{ route('groups.students.create', $group->id) }}">Добавить студента</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($group->students->isEmpty())
        <p>Нет студентов в этой группе.</p>
    @else
        <ul>
            @foreach ($group->students as $student)
                <li>
                    {{ $student->surname }} {{ $student->name }}
                    <a href="{{ route('groups.students.show', [$group->id, $student->id]) }}">Редактировать</a>
                    
                    <form action="{{ route('groups.students.destroy', [$group->id, $student->id]) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Вы уверены, что хотите удалить этого студента?');">Удалить</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif
@endsection

