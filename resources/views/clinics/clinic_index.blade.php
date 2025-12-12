<h1>Clinics & Counseling Centers</h1>

<a href="/clinics/create">➕ Add Clinic</a>
<hr>

@foreach($clinics as $clinic)
    <div style="border:1px solid #ccc; padding:10px; margin-bottom:10px;">
        <h3>{{ $clinic->name }}</h3>
        <p><strong>Location:</strong> {{ $clinic->location }}</p>

        <a href="/clinics/{{ $clinic->id }}">View</a> |
        <a href="/clinics/{{ $clinic->id }}/edit">Edit</a>

        <form action="/clinics/{{ $clinic->id }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button>Delete</button>
        </form>
    </div>
@endforeach
