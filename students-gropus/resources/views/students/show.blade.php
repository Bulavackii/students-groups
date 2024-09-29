@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $student->name }} {{ $student->surname }}</h1>
    
    <p>Группа: {{ $group->name }}</p>
    
    <a href="{{ route('groups.students.edit', [$group->id, $student->id]) }}" class="btn btn-warning">Редактировать</a>
    
    <form action="{{ route('groups.students.destroy', [$group->id, $student->id]) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Удалить</button>
    </form>
</div>
@endsection
