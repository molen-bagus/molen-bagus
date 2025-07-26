<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Review;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::where('is_active', true)->get();
        $reviews = Review::latest()->take(4)->get(); // ambil 4 review terbaru

        return view('home', compact('products', 'reviews'));
    }
}
