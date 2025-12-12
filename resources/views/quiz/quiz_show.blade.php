@extends('layouts.app')

@section('content')
<h1>{{ $quiz->title }}</h1>
<p>{{ $quiz->description }}</p>

<a href="{{ route('quiz.edit', $quiz->id) }}">Edit</a>

<form action="{{ route('quiz.destroy', $quiz->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Delete</button>
</form>
@endsection
