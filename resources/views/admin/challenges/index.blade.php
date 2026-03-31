@extends('layouts.app')

@section('content')
<div class="container py-5" style="max-width: 1400px;">
    <div class="header-wrapper d-flex flex-column align-items-center">
        <h1 class="display-5 fw-bold mb-3 text-center" style="color: #2C3E50; letter-spacing: -1px; text-align: center;">Healthy Lifestyle Challenges</h1>
        
         <div class="search-bar">
        <span class="search-icon">🔍</span>
        <input type="text" id="searchInput" placeholder="Search" onkeyup="searchChallenges()">
        </div>

        <div style="d-flex justify-content-end">            
            @if(auth()->user()->role === 'admin')
                <a href="{{ route('admin.challenges.create') }}" class="btn btn-add-challenge shadow-sm px-4 py-2">
                    <i class="bi bi-plus-lg me-2"></i>Add New Challenge
                </a>
            @endif
        </div>
    </div>

    <div style="margin-top: 3vh;">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4" id="challengeGrid">
            @foreach($challenges as $challenge)
                <div class="col challenge-card-item" data-name="{{ strtolower($challenge->name) }}">
                    <div class="card h-100 border-0 shadow-sm bg-white rounded-4 overflow-hidden">
                        
                        <div class="p-3">
                            <div class="img-container">
                                @if ($challenge->image_path && file_exists(public_path('storage/' . $challenge->image_path)))
                                    <img src="{{ asset('storage/' . $challenge->image_path) }}" alt="{{ $challenge->name }}">
                                @else
                                    <div class="placeholder-icon">
                                        <i class="bi bi-image text-muted"></i>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="card-body p-4 pt-0 text-center d-flex flex-column">
                            <h4 class="fw-bold text-dark mb-1" style="letter-spacing: -0.5px;">
                                {{ $challenge->name }}
                            </h4>
                            
                            <p class="text-muted mb-1" style="font-size: 0.95rem; line-height: 1.5;">
                                {{ Str::limit($challenge->description, 75) }}
                            </p>
                            
                            <div class="meta-data mb-3">
                                <span class="text-secondary fw-bold" style="font-size: 0.85rem;">
                                    {{ $challenge->duration_days }} Days | {{ $challenge->difficulty }}
                                </span>
                            </div>

                            <div class="action-section mt-auto pt-2">
                                <div class="mb-2">
                                    <a href="{{ route('admin.challenges.show', $challenge) }}" 
                                       class="view-detail-link text-uppercase">
                                        View Details
                                    </a>
                                </div>

                                @if(auth()->user()->role === 'admin')
                                    <div class="admin-actions-row mt-4">
                                        <a href="{{ route('admin.challenges.edit', $challenge) }}" 
                                           class="btn btn-edit-custom flex-grow-1 text-uppercase">
                                            Edit
                                        </a>
                                        
                                        <form action="{{ route('admin.challenges.destroy', $challenge) }}" method="POST" class="flex-grow-1">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-delete-custom w-100 text-uppercase" 
                                                    onclick="return confirm('Delete this challenge?')">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<style>
    body { 
        font-family: 'Poppins', sans-serif; 
    }

    .search-bar {
        max-width: 1000px;
        margin: 0 auto 1rem;
        position: relative;
    }

    .search-bar input {
        width: 100%;
        padding: 1.1rem 1.5rem 1.1rem 3.5rem;
        border: 1px solid #d1d5db;
        border-radius: 50px;
        font-size: 1rem;
        font-family: 'poppins', sans-serif;
    }

    .search-bar input:focus {
        outline: none;
        border-color: #9ca3af;
    }

    .search-icon {
        position: absolute;
        left: 1.3rem;
        top: 50%;
        transform: translateY(-50%);
        font-size: 1.3rem;
    }

    .btn-add-challenge {
        background-color: #6B9BD1;
        color: white;
        border-radius: 10px;
        align-items: right;
        font-weight: 600;
        transition: 0.3s;
        border: none;
        font-size: 1rem;   
        padding: 10px 20px;   
        line-height: 1;
        margin: 2vh;
    }
    .btn-add-challenge:hover { background-color: #5684b5; color: white; }

    .view-detail-link {
        color: #6A5AE0;
        text-decoration: underline;
        font-weight: 700;
        font-size: 0.85rem;
        letter-spacing: 0.5px;
        padding-bottom: 1rem;
        margin-top: 2vh;
    }

    .admin-actions-row {
        display: flex;
        gap: 10px;
    }

    .btn-edit-custom, .btn-delete-custom {
        font-size: 1rem;
        font-weight: 700;
        padding: 5px 15px;
        border-radius: 10px;
        border: none;
        transition: 0.2s;
        margin-top: 0;

    }

    .btn-edit-custom { 
        margin-top: 3vh;
        background-color: #f1f3f5; 
        color: #495057; 
    }
    .btn-edit-custom:hover { 
        background-color: #e2e6ea; 
    }

    .btn-delete-custom { 
        margin-top: 3vh;
        background-color: #FFF5F5; 
        color: #DC3545; border: 1px solid #FFC9C9; }
    .btn-delete-custom:hover { 
        background-color: #DC3545; 
        color: white; }

    .img-container {
        width: 100%;
        height: 180px;
        border-radius: 16px;
        overflow: hidden;
        background: #f8f9fa;
    }
    .img-container img { width: 100%; height: 100%; object-fit: cover; }

    .card { transition: transform 0.3s ease; border: 1px solid #f0f0f0 !important; }
    .card:hover { transform: translateY(-8px); box-shadow: 0 15px 30px rgba(0,0,0,0.06) !important; }

    .row-cols-md-3 > * { width: 33.3333%; }
</style>

<script>
function searchChallenges() {
    let input = document.getElementById('searchInput').value.toLowerCase();
    let cards = document.querySelectorAll('.challenge-card-item');
    cards.forEach(card => {
        let name = card.getAttribute('data-name');
        card.style.display = name.includes(input) ? '' : 'none';
    });
}
</script>
@endsection