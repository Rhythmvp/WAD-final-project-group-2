@extends('layouts.app')

@section('content')
<h1>Quiz List</h1>

<a href="{{ route('quiz.create') }}">Create Quiz</a>

<ul>
    @foreach($quizzes as $quiz)
        <li>
            <a href="{{ route('quiz.show', $quiz->id) }}">{{ $quiz->title }}</a>
        </li>
    @endforeach
</ul>
@endsection
