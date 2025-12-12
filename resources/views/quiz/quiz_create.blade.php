<form action="{{ route('quiz.store') }}" method="POST">
    @csrf

    <label>Question:</label>
    <input type="text" name="question" class="form-control">

    <label>Option A:</label>
    <input type="text" name="option_a" class="form-control">

    <label>Option B:</label>
    <input type="text" name="option_b" class="form-control">

    <label>Option C:</label>
    <input type="text" name="option_c" class="form-control">

    <label>Option D:</label>
    <input type="text" name="option_d" class="form-control">

    <label>Correct Answer:</label>
    <input type="text" name="correct_answer" class="form-control">

    <button type="submit" class="btn btn-primary mt-3">Save Quiz</button>
</form>
