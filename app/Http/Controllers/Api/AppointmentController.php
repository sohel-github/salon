<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function store(Request $request) {

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'salon_id' => 'required|exists:salons,id',
            'service_id' => 'required|exists:services,id',
            'appointment_time' => 'required|date',
            'status' => 'required|in:pending,confirmed,completed,canceled',
            'payment_status' => 'required|in:pending,paid,pay_later',
        ]);

        $appointment = Appointment::create([
            'user_id' => auth()->id(),
            'salon_id' => $request->salon_id,
            'service_id' => $request->service_id,
            'appointment_time' => $request->date,
            'status' => 'pending',
            'payment_status' => $request->time,
        ]);

        return response()->json($appointment, 201);
    }

    public function userAppointments() {
        return response()->json(Appointment::where('user_id', auth()->id())->get());
    }
}
