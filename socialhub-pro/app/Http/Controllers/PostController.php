<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'content' => 'required|string|max:280',
            'social_account_id' => 'required|exists:social_accounts,id',
            'scheduled_at' => 'required|date|after:now',
        ]);

        $status = 'pending_approval';
        if (in_array($request->user()->role, ['admin', 'manager'])) {
            $status = 'scheduled';
        }

        $request->user()->posts()->create([
            'social_account_id' => $validated['social_account_id'],
            'content' => $validated['content'],
            'scheduled_at' => $validated['scheduled_at'],
            'status' => $status,
        ]);

        return back()->with('status', 'Post submitted successfully! It will be reviewed shortly.');
    }
}
