<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'parlor_id' => 'nullable|exists:parlors,parlor_id',
            'service_id' => 'required|exists:services,service_id',
            'appointment_datetime' => 'required|date',
            'note' => 'nullable|string',
        ]);

        $validated['status'] = 'pending';

        Appointment::create($validated);

        return redirect()
            ->route('book.now')
            ->with('success', 'Your appointment has been booked successfully!');
    }
}
