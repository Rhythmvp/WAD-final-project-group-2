<!DOCTYPE html>
<html>
<head>
    <title>{{ $question->question }}</title>
</head>
<body>

<h1>{{ $question->question }}</h1>

<p><strong>A:</strong> {{ $question->option_a }}</p>
<p><strong>B:</strong> {{ $question->option_b }}</p>
<p><strong>C:</strong> {{ $question->option_c }}</p>
<p><strong>D:</strong> {{ $question->option_d }}</p>

<p><strong>Correct Answer:</strong> {{ $question->correct_answer }}</p>

<hr>

<a href="/quiz/{{ $question->id }}/edit">Edit</a> |
<a href="/quiz">Back</a>

<form action="/quiz/{{ $question->id }}" method="POST" style="margin-top:10px;">
    @csrf
    @method('DELETE')
    <button type="submit" onclick="return confirm('Delete this question?')">Delete</button>
</form>

</body>
</html>
