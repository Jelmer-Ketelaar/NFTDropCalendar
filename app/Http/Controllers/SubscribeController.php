<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

final class SubscribeController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'email' => 'required|email|max:255',
            'name' => 'nullable|string|max:100',
        ]);

        // Check if email already exists
        $exists = DB::table('notify')->where('email', $validated['email'])->exists();

        if ($exists) {
            return back()->with('info', 'You are already subscribed to our newsletter!');
        }

        DB::table('notify')->insert([
            'email' => $validated['email'],
            'name' => $validated['name'] ?? null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return back()->with('success', 'Successfully subscribed! Check your email for updates.');
    }
}
