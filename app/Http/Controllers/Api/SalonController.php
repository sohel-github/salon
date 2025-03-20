<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Salon;

class SalonController extends Controller
{
    public function index() {
        return response()->json(Salon::all());
    }

    public function show($id) {
        return response()->json(Salon::findOrFail($id));
    }
}
