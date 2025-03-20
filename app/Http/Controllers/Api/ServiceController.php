<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index($salon_id) {
        return response()->json(Service::where('salon_id', $salon_id)->get());
    }
}
