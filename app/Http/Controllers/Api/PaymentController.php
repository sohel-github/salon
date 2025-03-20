<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function store(Request $request) {

        $request->validate([
            'appointment_id' => 'required|exists:appointment,id',
            'user_id' => 'required|exists:users,id',
            'amount' => 'required',
            'payment_method' => 'required|in:card,paypal,upi,cash,other',
            'status' => 'required|in:pending,successful,paid',
            'transaction_id' => 'required',
        ]);

        $payment = Payment::create([
            'user_id' => auth()->id(),
            'appointment_id' => $request->appointment_id,
            'amount' => $request->amount,
            'payment_method' => $request->payment_method,
            'status' => $request->status,
            'transaction_id' => $request->transaction_id,
        ]);

        return response()->json($payment, 201);
    }
}
