<h1>Edit Challenge</h1>

<form action="/challenges/{{ $challenge->id }}" method="POST">
    @csrf
    @method('PUT')

    <label>Title:</label>
    <input type="text" name="title" value="{{ $challenge->title }}"><br><br>

    <label>Description:</label>
    <textarea name="description">{{ $challenge->description }}</textarea><br><br>

    <label>Points:</label>
    <input type="number" name="points" value="{{ $challenge->points }}"><br><br>

    <label>Duration:</label>
    <input type="number" name="duration" value="{{ $challenge->duration }}"><br><br>

    <button>Update</button>
</form>
