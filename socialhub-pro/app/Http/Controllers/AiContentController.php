<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;

class AiContentController extends Controller
{
    public function generate(Request $request)
    {
        $request->validate(['topic' => 'required|string|max:100']);

        $topic = $request->input('topic');

        $result = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'system', 'content' => 'You are a social media marketing assistant.'],
                ['role' => 'user', 'content' => "Write a short, engaging social media post about the following topic: {$topic}"],
            ],
        ]);

        $postContent = $result->choices[0]->message->content;

        return response()->json(['content' => $postContent]);
    }
}
