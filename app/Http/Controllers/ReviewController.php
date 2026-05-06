<?php

namespace App\Http\Controllers;

use App\Models\Drop;
use App\Models\DropReview;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

final class ReviewController extends Controller
{
    public function store(Request $request, string $encodedId): RedirectResponse
    {
        $id = $this->decodeId($encodedId);

        if ($id === null) {
            return redirect()->route('home');
        }

        $drop = Drop::find($id);

        if ($drop === null) {
            return redirect()->route('home');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string|max:500',
        ]);

        DropReview::create([
            'drop_id' => $id,
            'name' => e($validated['name']),
            'email' => e($validated['email']),
            'rating' => $validated['rating'],
            'review' => e($validated['review']),
        ]);

        return redirect()->route('drops.show', ['id' => $encodedId])
            ->with('success', 'Thank you for your review!');
    }

    private function decodeId(?string $encoded): ?int
    {
        if ($encoded === null || $encoded === '' || $encoded === 'none') {
            return null;
        }

        $decoded = base64_decode($encoded, true);

        if ($decoded === false || ! ctype_digit($decoded)) {
            return null;
        }

        return (int) $decoded;
    }
}
