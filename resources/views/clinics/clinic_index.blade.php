@extends('layouts.app')

@section('content')

<div class="page-header">
    <h1>Clinics & Counseling Centers</h1>
    <p class="subtitle">
        Find professional mental health services and counseling centers you can reach out to.
    </p>

    @auth
        <a href="{{ route('clinics.create') }}" class="btn-primary">
            ➕ Add Clinic
        </a>
    @endauth
</div>

@if($clinics->count())
    <div class="grid">
        @foreach($clinics as $clinic)
            <div class="card">
                <h3>{{ $clinic->name }}</h3>

                <p class="meta">
                    📍 {{ $clinic->address }} <br>
                    📞 {{ $clinic->phone }}
                </p>

                <p class="description">
                    {{ $clinic->description }}
                </p>

                <div class="actions">
                    <a href="{{ route('clinics.show', $clinic->id) }}" class="btn-secondary">
                        View Details
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="empty-state">
        <p>No clinics available yet.</p>
        @auth
            <a href="{{ route('clinics.create') }}" class="btn-primary">
                Add the first clinic
            </a>
        @endauth
    </div>
@endif

@endsection
