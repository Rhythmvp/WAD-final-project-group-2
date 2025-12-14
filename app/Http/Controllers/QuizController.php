<?php

namespace App\Http\Controllers;

use App\Models\QuizQuestion;
use App\Models\QuizResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class QuizController extends Controller
{
    public function index()
    {
        $questions = QuizQuestion::where('is_active', true)
            ->orderBy('order')
            ->get();
        return view('quiz.index', compact('questions'));
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'answers' => 'required|array',
            'answers.*' => 'integer|min:1|max:5'
        ]);

        $totalScore = array_sum($validated['answers']);
        
        // Get AI response from Gemini
        $aiResponse = $this->getGeminiResponse($totalScore, $validated['answers']);

        // Save result
        $result = QuizResult::create([
            'user_id' => auth()->id(),
            'total_score' => $totalScore,
            'ai_response' => $aiResponse,
            'answers' => json_encode($validated['answers'])
        ]);

        return view('quiz.result', [
            'score' => $totalScore,
            'aiResponse' => $aiResponse,
            'result' => $result
        ]);
    }

    private function getGeminiResponse($score, $answers)
    {
        try {
            $apiKey = env('GEMINI_API_KEY');
            
            $prompt = "Based on a mental health assessment with a total score of {$score} out of " . 
                     (count($answers) * 5) . ", provide supportive guidance and recommendations. " .
                     "Keep the response empathetic, helpful, and under 300 words.";

            $response = Http::timeout(30)->post(
                "https://generativelanguage.googleapis.com/v1beta/models/gemini-pro:generateContent?key={$apiKey}",
                [
                    'contents' => [
                        [
                            'parts' => [
                                ['text' => $prompt]
                            ]
                        ]
                    ]
                ]
            );

            if ($response->successful()) {
                $data = $response->json();
                return $data['candidates'][0]['content']['parts'][0]['text'] ?? 'Unable to generate response.';
            }

            return 'Thank you for completing the assessment. Please consider speaking with a mental health professional for personalized guidance.';
            
        } catch (\Exception $e) {
            \Log::error('Gemini API Error: ' . $e->getMessage());
            return 'Thank you for completing the assessment. Please consider speaking with a mental health professional for personalized guidance.';
        }
    }

    public function history()
    {
        $results = QuizResult::where('user_id', auth()->id())
            ->latest()
            ->paginate(10);
        return view('quiz.history', compact('results'));
    }
}