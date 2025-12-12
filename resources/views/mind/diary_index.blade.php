<!DOCTYPE html>
<html>
<head>
    <title>Your Diary</title>
</head>
<body>

<h1>Your Diary Entries</h1>

<a href="/diary/create">➕ Write New Entry</a>

<hr>

{{-- If there are no diary entries --}}
@if($entries->count() == 0)
    <p>No diary entries yet. Start writing your first entry!</p>
@endif

{{-- Loop through all diary entries --}}
@foreach($entries as $entry)
    <div style="border:1px solid #ccc; padding:15px; margin:10px 0;">
        
        <p><strong>Mood:</strong> {{ $entry->mood }}</p>

        <p>{{ Str::limit($entry->entry, 120) }}</p>

        <a href="/diary/{{ $entry->id }}">View</a> |
        <a href="/diary/{{ $entry->id }}/edit">Edit</a>

        <form action="/diary/{{ $entry->id }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button onclick="return confirm('Delete this entry?')">Delete</button>
        </form>

    </div>
@endforeach

</body>
</html>
