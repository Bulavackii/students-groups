@extends('layouts.app')

@section('content')
    <h1>Редактировать группу: {{ $group->title }}</h1>

    <form action="{{ route('groups.update', $group->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="title">Название группы:</label>
        <input type="text" name="title" id="title" value="{{ $group->title }}" required>

        <label for="start_from">Дата начала:</label>
        <input type="date" name="start_from" id="start_from" value="{{ $group->start_from }}" required>

        <label for="is_active">Активна:</label>
        <input type="checkbox" name="is_active" id="is_active" value="1" {{ $group->is_active ? 'checked' : '' }}>

        <button type="submit">Сохранить изменения</button>
    </form>
@endsection
