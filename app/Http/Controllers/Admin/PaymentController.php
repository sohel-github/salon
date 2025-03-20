<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::latest()->paginate(10);
        return view('admin.payments.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $appointments = Appointment::all();
        $users = User::all();
        return view('admin.payments.create', compact('appointments', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'appointment_id' => 'required|exists:appointment,id',
            'user_id' => 'required|exists:users,id',
            'amount' => 'required',
            'payment_method' => 'required|in:card,paypal,upi,cash,other',
            'status' => 'required|in:pending,successful,paid',
            'transaction_id' => 'required',
        ]);

        Payment::create($request->all());
        return redirect()->route('admin.payments.index')->with('success', 'Payment created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        return view('admin.payments.show', compact('payment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        $appointments = Appointment::all();
        $users = User::all();
        return view('admin.payments.edit', compact('appointments', 'users', 'payment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        $request->validate([
            'appointment_id' => 'required|exists:appointment,id',
            'user_id' => 'required|exists:users,id',
            'amount' => 'required',
            'payment_method' => 'required|in:card,paypal,upi,cash,other',
            'status' => 'required|in:pending,successful,paid',
            'transaction_id' => 'required',
        ]);

        $payment->update($request->all());
        return redirect()->route('admin.payments.index')->with('success', 'Payment Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        $payment->delete();
        return redirect()->route('admin.payments.index')->with('success', 'Payment deleted successfully.');
    }
}
