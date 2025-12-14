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
        return view('quiz.quiz_index', compact('questions'));
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
            
            if (empty($apiKey)) {
                \Log::warning('GEMINI_API_KEY is not set in .env file');
                return 'Thank you for completing the assessment. Please consider speaking with a mental health professional for personalized guidance.';
            }
            
            $maxScore = count($answers) * 5;
            $percentage = ($score / $maxScore) * 100;
            
            $prompt = "You are a compassionate mental health counselor. A student has completed a mental health assessment and scored {$score} out of {$maxScore} ({$percentage}%). " .
                     "Provide supportive, empathetic guidance and practical recommendations. " .
                     "Keep the response warm, encouraging, and under 300 words. " .
                     "Focus on actionable steps they can take to improve their wellbeing. " .
                     "Do not provide medical diagnoses, but offer general wellness advice.";

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
                
                // Handle different response structures
                if (isset($data['candidates'][0]['content']['parts'][0]['text'])) {
                    return $data['candidates'][0]['content']['parts'][0]['text'];
                } elseif (isset($data['candidates'][0]['content']['parts'][0])) {
                    return $data['candidates'][0]['content']['parts'][0];
                }
                
                \Log::warning('Unexpected Gemini API response structure', ['response' => $data]);
                return 'Thank you for completing the assessment. Please consider speaking with a mental health professional for personalized guidance.';
            }

            \Log::error('Gemini API request failed', [
                'status' => $response->status(),
                'body' => $response->body()
            ]);
            
            return 'Thank you for completing the assessment. Please consider speaking with a mental health professional for personalized guidance.';
            
        } catch (\Exception $e) {
            \Log::error('Gemini API Error: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);
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