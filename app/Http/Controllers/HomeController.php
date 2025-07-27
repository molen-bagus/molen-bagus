<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Review;

class HomeController extends Controller

{
    public function index()
    {
    $products = Product::active()->get();   // ambil semua produk
    $reviews = Review::with('user')->latest()->get(); // ambil semua review + user-nya

    return view('home', compact('products', 'reviews'));
    
}

}