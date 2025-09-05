<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display the main dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();
        $stats = [
            'posts_scheduled' => $user->posts()->count(),
            'connected_accounts' => $user->socialAccounts()->count(),
            'pending_approval' => 0, // Placeholder
        ];

        if (in_array($user->role, ['admin', 'manager'])) {
            // A real implementation would query posts with 'pending_approval' status
            $stats['pending_approval'] = \App\Models\Post::where('status', 'pending_approval')->count();
        }

        return view('dashboard', compact('stats'));
    }
}
