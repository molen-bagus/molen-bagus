<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function store(Request $request)
{
    $validated = $request->validate([
        'content' => 'required|string|max:1000',
        'rating' => 'required|integer|min:1|max:5',
    ]);

    Review::create([
        'user_id' => auth()->id(),
        'content' => $validated['content'],
        'rating' => $validated['rating'],
    ]);

    return back()->with('success', 'Ulasan berhasil dikirim!');
}
}
