<!DOCTYPE html>
<html>
<head>
    <title>Create Post</title>
</head>
<body>

<h1>Create a New Discussion</h1>

<form action="/forum" method="POST">
    @csrf

    <label>Title:</label><br>
    <input type="text" name="title" required><br><br>

    <label>Category:</label><br>
    <select name="category">
        <option value="Stress & Academics">Stress & Academics</option>
        <option value="Mental & Emotional Support">Mental & Emotional Support</option>
        <option value="Social & Friendship Issues">Social & Friendship Issues</option>
        <option value="Lifestyle & Healthy Habits">Lifestyle & Healthy Habits</option>
    </select><br><br>

    <label>Message:</label><br>
    <textarea name="message" rows="5" required></textarea><br><br>

    <button type="submit">Create Post</button>
</form>

<br>
<a href="/forum">Back</a>

</body>
</html>
