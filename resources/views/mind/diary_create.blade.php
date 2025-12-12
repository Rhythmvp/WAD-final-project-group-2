<!DOCTYPE html>
<html>
<head>
    <title>Add Quiz Question</title>
</head>
<body>

<h1>Add New Quiz Question</h1>

<form action="/quiz" method="POST">
    @csrf

    <label>Question:</label><br>
    <input type="text" name="question" required><br><br>

    <label>Option A:</label><br>
    <input type="text" name="option_a"><br><br>

    <label>Option B:</label><br>
    <input type="text" name="option_b"><br><br>

    <label>Option C:</label><br>
    <input type="text" name="option_c"><br><br>

    <label>Option D:</label><br>
    <input type="text" name="option_d"><br><br>

    <label>Correct Answer:</label><br>
    <input type="text" name="correct_answer"><br><br>

    <button type="submit">Add Question</button>
</form>

<br>
<a href="/quiz">Back</a>

</body>
</html>
