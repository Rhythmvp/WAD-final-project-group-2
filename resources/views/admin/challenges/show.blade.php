@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="mb-4">
        <a href="{{ route('admin.challenges.index') }}" class="btn btn-light border shadow-sm rounded-pill px-4">
            <i class="bi bi-arrow-left me-2"></i> <- Back to Challenge Dashboard
        </a>
    </div>

    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
        <div class="row g-0">
            <div class="col-md-5 position-relative">
                @if ($challenge->image_path)
                    <img src="{{ asset('storage/' . $challenge->image_path) }}" 
                        alt="{{ $challenge->name }}" 
                        class="img-fluid w-100 h-100 object-fit-cover">
                @else
                    <div class="bg-light d-flex align-items-center justify-content-center h-100" style="min-height: 450px;">
                        <i class="bi bi-image text-muted" style="font-size: 5rem;"></i>
                    </div>
                @endif
            </div>

            <div class="col-md-7 p-5">
                <div class="d-flex flex-column h-100">
                    <div class="mb-4">
                        <h6 class="text-primary fw-bold text-uppercase mb-1" style="letter-spacing: 1px; font-size: 20px; margin-bottom: -1rem;">Challenge Details</h6>
                        <h1 class="display-5 fw-bold text-dark mb-0">{{ $challenge->name }}</h1>
                    </div>

                    <div class="info-grid mb-4">
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label class="text-muted small d-block">Program Duration:</label>
                                <span class="fw-bold fs-5 text-dark"><i class="bi bi-calendar-check me-2"></i>{{ $challenge->duration_days }} Days</span>
                            </div>
                            <div class="col-6 mb-3">
                                <label class="text-muted small d-block">Target Total:</label>
                                <span class="fw-bold fs-5 text-dark"><i class="bi bi-target me-2 text-danger"></i>{{ $challenge->goal }}</span>
                            </div>
                             <div class="col-6 mb-3">
                                <label class="text-muted small d-block">Difficulty:</label>
                                <span class="fw-bold fs-5 text-dark"><i class="bi bi-star me-2 text-warning"></i>{{ ($challenge->difficulty) }}</span>
                            </div>
                            <div class="col-6 mb-3">
                                <label class="text-muted small d-block">Description:</label>
                                <span class="fw-bold fs-5 text-dark"><i class="bi bi-star me-2 text-warning"></i>{{ ($challenge->description) }}</span>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    body { 
        background-color: #f8fafc; 
        font-family: 'Poppins', sans-serif; 
    }
    .card { 
        background: white; 
        display: block;
        border-radius: 20px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
    .text-primary { 
        margin-top: 1rem;
        color: #6A5AE0 !important; 
    }
    label { 
        font-weight: 700; 
        letter-spacing: 0.5px; 
        }
    @media (min-width: 768px) {
        .object-fit-cover {
            margin: 10px;
            width: 100%;
            height: 20%;
            object-fit: cover;
            border-radius: 20px;
            align-content: center;
        }
    }
</style>
@endsection