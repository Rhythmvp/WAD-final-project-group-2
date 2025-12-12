<!DOCTYPE html>
<html>
<head>
    <title>Edit Quiz Question</title>
</head>
<body>

<h1>Edit Quiz Question</h1>

<form action="/quiz/{{ $question->id }}" method="POST">
    @csrf
    @method('PUT')

    <label>Question:</label><br>
    <input type="text" name="question" value="{{ $question->question }}" required><br><br>

    <label>Option A:</label><br>
    <input type="text" name="option_a" value="{{ $question->option_a }}"><br><br>

    <label>Option B:</label><br>
    <input type="text" name="option_b" value="{{ $question->option_b }}"><br><br>

    <label>Option C:</label><br>
    <input type="text" name="option_c" value="{{ $question->option_c }}"><br><br>

    <label>Option D:</label><br>
    <input type="text" name="option_d" value="{{ $question->option_d }}"><br><br>

    <label>Correct Answer:</label><br>
    <input type="text" name="correct_answer" value="{{ $question->correct_answer }}"><br><br>

    <button type="submit">Update Question</button>
</form>

<br>
<a href="/quiz">Back</a>

</body>
</html>
