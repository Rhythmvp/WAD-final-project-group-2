@extends('layouts.app')

@section('content')

<div class="card">
    <h1>Edit Clinic</h1>

    @if ($errors->any())
        <div class="alert alert-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('clinics.update', $clinic->id) }}">
        @csrf
        @method('PUT')

        <div style="margin-bottom:15px;">
            <label>Clinic Name</label>
            <input type="text" name="name" value="{{ $clinic->name }}" required>
        </div>

        <div style="margin-bottom:15px;">
            <label>Location</label>
            <input type="text" name="location" value="{{ $clinic->location }}" required>
        </div>

        <div style="margin-bottom:15px;">
            <label>Phone</label>
            <input type="text" name="phone" value="{{ $clinic->phone }}">
        </div>

        <div style="margin-bottom:15px;">
            <label>Hours</label>
            <input type="text" name="hours" value="{{ $clinic->hours }}">
        </div>

        <button class="btn" type="submit">Update</button>
        <a href="{{ route('clinics.index') }}" style="margin-left:10px;">Cancel</a>
    </form>
</div>

@endsection
