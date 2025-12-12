<h1>Lifestyle Challenges</h1>

<a href="/challenges/create">➕ Add Challenge</a><hr>

@foreach($challenges as $challenge)
    <div style="border:1px solid #aaa; padding:10px; margin-bottom:10px;">
        <h3>{{ $challenge->title }}</h3>
        <p>{{ Str::limit($challenge->description, 120) }}</p>

        <a href="/challenges/{{ $challenge->id }}">View</a> |
        <a href="/challenges/{{ $challenge->id }}/edit">Edit</a>

        <form action="/challenges/{{ $challenge->id }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button>Delete</button>
        </form>
    </div>
@endforeach
