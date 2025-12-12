<h1>Add Challenge</h1>

<form action="/challenges" method="POST">
    @csrf

    <label>Title:</label>
    <input type="text" name="title"><br><br>

    <label>Description:</label>
    <textarea name="description"></textarea><br><br>

    <label>Points:</label>
    <input type="number" name="points"><br><br>

    <label>Duration (days):</label>
    <input type="number" name="duration"><br><br>

    <button>Create Challenge</button>
</form>
