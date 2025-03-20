<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index() 
    {
        return response()->json(Inventory::with('product')->latest()->get());
    }

    public function store(Request $request) 
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer',
            'transaction_type' => 'required|in:add,remove,sale',
            'notes' => 'nullable|string',
        ]);

        $inventory = Inventory::create($request->all());
        return response()->json(['message' => 'Inventory updated.', 'data' => $inventory], 201);
    }
}
