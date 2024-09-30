@extends('layouts.app')

@section('content')
    <h1>Создать новую группу</h1>

    <form action="{{ route('groups.store') }}" method="POST">
        @csrf
        
        <label for="title">Название группы:</label>
        <input type="text" name="title" id="title" required>

        <label for="start_from">Дата начала:</label>
        <input type="date" name="start_from" id="start_from" required>

        <label for="is_active">Активна:</label>
        <input type="checkbox" name="is_active" id="is_active" value="1">

        <button type="submit">Создать</button>
    </form>
@endsection