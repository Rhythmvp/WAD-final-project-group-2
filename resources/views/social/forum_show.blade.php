<!DOCTYPE html>
<html>
<head>
    <title>{{ $post->title }}</title>
</head>
<body>

<h1>{{ $post->title }}</h1>
<p><strong>Category:</strong> {{ $post->category }}</p>
<p>{{ $post->message }}</p>

<hr>

<a href="/forum/{{ $post->id }}/edit">Edit</a> |
<a href="/forum">Back to Forum</a>

<form action="/forum/{{ $post->id }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" onclick="return confirm('Delete this post?')">
        Delete Post
    </button>
</form>

</body>
</html>
