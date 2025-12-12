<!DOCTYPE html>
<html>
<head>
    <title>Edit Post</title>
</head>
<body>

<h1>Edit Discussion</h1>

<form action="/forum/{{ $post->id }}" method="POST">
    @csrf
    @method('PUT')

    <label>Title:</label><br>
    <input type="text" name="title" value="{{ $post->title }}" required><br><br>

    <label>Category:</label><br>
    <select name="category">
        <option value="Stress & Academics" {{ $post->category == 'Stress & Academics' ? 'selected' : '' }}>Stress & Academics</option>
        <option value="Mental & Emotional Support" {{ $post->category == 'Mental & Emotional Support' ? 'selected' : '' }}>Mental & Emotional Support</option>
        <option value="Social & Friendship Issues" {{ $post->category == 'Social & Friendship Issues' ? 'selected' : '' }}>Social & Friendship Issues</option>
        <option value="Lifestyle & Healthy Habits" {{ $post->category == 'Lifestyle & Healthy Habits' ? 'selected' : '' }}>Lifestyle & Healthy Habits</option>
    </select><br><br>

    <label>Message:</label><br>
    <textarea name="message" rows="5" required>{{ $post->message }}</textarea><br><br>

    <button type="submit">Update Post</button>
</form>

<br>
<a href="/forum">Back</a>

</body>
</html>
