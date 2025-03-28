<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index() {
        return response()->json(Product::all());
    }

    public function show($id) {
        return response()->json(Product::findOrFail($id));
    }
}
