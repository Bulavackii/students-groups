@extends('layouts.app')

@section('content')
    <h1>Добавить студента в группу {{ $group->title }}</h1>

    <form action="{{ route('groups.students.store', $group->id) }}" method="POST">
        @csrf
        <label for="surname">Фамилия:</label>
        <input type="text" name="surname" id="surname" required>

        <label for="name">Имя:</label>
        <input type="text" name="name" id="name" required>

        <button type="submit">Добавить студента</button>
    </form>
@endsection
