@extends('layouts.app')
@section('title', 'Add New Challenge - Admin Panel')

@push('styles')
<style>
 
    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 80vh; 
    }

    .card {
        width: 100%;
        max-width: 600px;
        border: none;
        border-radius: 20px;
        box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        background: #fff;
        overflow: hidden;
    }

    .card-header {
        background-color: #6B9BD1;
        color: white;
        padding: 30px;
        text-align: center;
    }

    .card-body {
        padding: 40px;
    }

    .form-group-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        margin-bottom: 20px;
    }

    .form-label {
        font-weight: 600;
        margin-bottom: 10px;
        color: #4A5568;
    }

    .form-control, .form-select {
        width: 100%;
        max-width: 450px;
        border-radius: 12px;
        border: 1.5px solid #E2E8F0;
        padding: 12px;
        text-align: center; 
    }

    .button-section {
        margin-top: 3rem; 
        text-align: center;
    }

    .btn-submit {
        background-color: #6B9BD1;
        color: white;
        padding:8px 10px !important;
        border-radius: 12px;
        font-weight: 0.70rem;
        cursor: pointer;
        transition: 0.3s;
        border: none;
        width: auto !important;
        margin-top: 2rem;
        display: inline-block;
        box-shadow: 0 4px 12px rgba(107, 155, 209, 0.3);
    }

    .btn-submit:hover {
        background-color: #4A7BA7;
        transform: translateY(-2px);
    }
</style>
@endpush

@section('content')
<a href="{{ route(name: 'admin.challenges.index') }}" class="btn btn-light border shadow-sm rounded-pill px-4">
            <i class="bi bi-arrow-left me-2"></i> <- Back to Challenge Dashboard
        </a>
<div class="card">
    <div class="card-header">
        <h4 class="mb-0" style="margin:0;">Add New Challenge</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.challenges.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group-container">
                <label for="name" class="form-label">Challenge Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required placeholder="Enter Challenge name">
            </div>

            <div class="form-group-container">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" rows="2" class="form-control" required placeholder="Describe the challenge">{{ old('description') }}</textarea>
            </div>

            <div class="form-group-container">
                <label for="duration_days" class="form-label">Duration (Days)</label>
                <input type="number" name="duration_days" id="duration_days" class="form-control" value="{{ old('duration_days') }}" required>
            </div>

            <div class="form-group-container">
                <label for="difficulty" class="form-label">Difficulty</label>
                <select name="difficulty" id="difficulty" class="form-select" required>
                    <option value="" selected disabled>Select Difficulty</option>
                    <option value="Easy">Easy</option>
                    <option value="Medium">Medium</option>
                    <option value="Hard">Hard</option>
                </select>
            </div>

            <div class="form-group-container">
                <label for="goal" class="form-label">Challenge Goal</label>
                <textarea name="goal" id="goal" rows="3" class="form-control" required placeholder="What is the goal?">{{ old('goal') }}</textarea>
            </div>

            <div class="form-group-container">
                <label for="image_path" class="form-label">Challenge Image (Optional)</label>
                <input type="file" name="image_path" id="image_path" class="form-control">
            </div>

            <div class="button-section">
                <button type="submit" class="btn btn-submit">Save Challenge</button>
            </div>
        </form>
    </div>
</div>
@endsection