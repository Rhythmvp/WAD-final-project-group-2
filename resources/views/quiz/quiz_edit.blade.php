@extends('layouts.app')

@section('content')
<h1>Edit Quiz</h1>

<form action="{{ route('quiz.update', $quiz->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Title:</label>
    <input type="text" name="title" value="{{ $quiz->title }}">

    <label>Description:</label>
    <textarea name="description">{{ $quiz->description }}</textarea>

    <button type="submit">Update</button>
</form>
@endsection
