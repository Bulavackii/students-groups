@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Редактировать студента в группе: {{ $group->title }}</h1> 
    
    <form action="{{ route('groups.students.update', [$group->id, $student->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Имя</label>
            <input type="text" name="name" id="name" value="{{ old('name', $student->name) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="surname" class="form-label">Фамилия</label>
            <input type="text" name="surname" id="surname" value="{{ old('surname', $student->surname) }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Сохранить изменения</button>
    </form>
</div>
@endsection
