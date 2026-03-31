@extends('layouts.app')

@section('content')

<h1>Clinics</h1>


<a href="{{ route('clinics.create') }}" class="btn">+ Add Clinic</a>

<br><br>

@foreach($clinics as $clinic)
    <div class="card" style="margin-bottom:15px;">
        <h3>{{ $clinic->name }}</h3>
        <p><strong>Location:</strong> {{ $clinic->location }}</p>
        <p><strong>Phone:</strong> {{ $clinic->phone ?? '-' }}</p>
        <p><strong>Hours:</strong> {{ $clinic->hours ?? '-' }}</p>

        <a href="{{ route('clinics.edit', $clinic->id) }}" class="btn">
            Edit
        </a>

        <form action="{{ route('clinics.destroy', $clinic->id) }}"
              method="POST"
              style="display:inline;"
              onsubmit="return confirm('Delete this clinic?')">
            @csrf
            @method('DELETE')
            <button class="btn" style="background:#e57373;">
                Delete
            </button>
        </form>
    </div>
@endforeach

@endsection
