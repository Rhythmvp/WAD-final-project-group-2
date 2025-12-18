@extends('layouts.app')

@section('content')
<div class="card">
    <h1>Add Clinic</h1>
    
    @if ($errors->any())
    <div class="alert alert-error">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


    <form method="POST" action="{{ route('clinics.store') }}">
        @csrf

        <div style="margin-bottom: 15px;">
            <label>Clinic Name</label>
            <input type="text" name="name" required style="width:100%; padding:10px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label>Location</label>
            <input type="text" name="location" required style="width:100%; padding:10px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label>Phone</label>
            <input type="text" name="phone" style="width:100%; padding:10px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label>Operating Hours</label>
            <input type="text" name="hours" style="width:100%; padding:10px;">
        </div>

        <button class="btn" type="submit">Save</button>
        <a href="{{ route('clinics.index') }}" style="margin-left:10px;">Cancel</a>
    </form>
</div>
@endsection
