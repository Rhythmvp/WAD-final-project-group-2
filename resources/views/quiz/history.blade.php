@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-serif">Assessment History</h1>
        <a href="{{ route('quiz.index') }}" 
           class="px-6 py-2 bg-[#c4d5b8] hover:bg-[#b0c5a4] rounded-full transition">
            New Assessment
        </a>
    </div>

    @if($results->isEmpty())
    <div class="bg-white rounded-lg shadow p-12 text-center">
        <p class="text-gray-500 text-lg mb-4">You haven't taken any assessments yet.</p>
        <a href="{{ route('quiz.index') }}" 
           class="inline-block px-6 py-3 bg-[#5a6c4f] text-white rounded-full hover:bg-[#4a5c3f] transition">
            Take Your First Assessment
        </a>
    </div>
    @else
    <div class="space-y-4">
        @foreach($results as $result)
        <div class="bg-white rounded-lg shadow hover:shadow-lg transition p-6">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <p class="text-sm text-gray-500">{{ $result->created_at->format('F d, Y \a\t g:i A') }}</p>
                    <p class="text-xs text-gray-400">{{ $result->created_at->diffForHumans() }}</p>
                </div>
                <div class="text-center">
                    <div class="inline-block px-6 py-2 bg-[#c4d5b8] rounded-full">
                        <span class="text-2xl font-bold text-[#5a6c4f]">{{ $result->total_score }}</span>
                    </div>
                    <p class="text-xs text-gray-500 mt-1">Score</p>
                </div>
            </div>

            <div class="border-t pt-4">
                <p class="text-sm text-gray-700 mb-3 font-medium">AI Insights:</p>
                <div class="bg-[#f0f4ed] rounded p-4">
                    <p class="text-sm text-gray-700 line-clamp-3">
                        {{ Str::limit($result->ai_response, 200) }}
                    </p>
                </div>
            </div>

            <div class="mt-4 flex gap-2">
                <button onclick="toggleDetails({{ $result->id }})" 
                        class="text-sm text-[#5a6c4f] hover:underline">
                    View Full Response
                </button>
            </div>

            <div id="details-{{ $result->id }}" class="hidden mt-4 border-t pt-4">
                <p class="text-sm text-gray-700 leading-relaxed whitespace-pre-line">
                    {{ $result->ai_response }}
                </p>
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-6">
        {{ $results->links() }}
    </div>
    @endif
</div>

<script>
function toggleDetails(id) {
    const details = document.getElementById('details-' + id);
    details.classList.toggle('hidden');
}
</script>
@endsection