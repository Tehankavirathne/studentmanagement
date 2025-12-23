<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Enrollment;

class PaymetController extends Controller
{
    public function index()
    {
        $payments = Payment::all();
        return view('payments.index')->with('payments', $payments);
    }
    public function create()
    {
        $enrollments = Enrollment::pluck('enroll_no', 'id');
        return view('payments.create', compact('enrollments'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'enrollment_id' => 'required',
            'paid_date' => 'required|date',
            'amount' => 'required|numeric'
        ]);
        $input = $request->all();
        Payment::create($input);
        return redirect('payments')->with('flash_message', 'Payment Added!');
    }
    
    public function show($id)
    {
        $payment = Payment::findOrFail($id);
        return view('payments.show')->with('payment', $payment);
    }
    public function edit(string $id)
    {
        $payment = Payment::find($id);
        $enrollments = Enrollment::pluck('enroll_no', 'id');
        return view('payments.edit', compact('payment','enrollments'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'enrollment_id' => 'required',
            'paid_date' => 'required|date',
            'amount' => 'required|numeric'
        ]);
        $input = $request->all();
        Payment::find($id)->update($input);
        return redirect('payments')->with('flash_message', 'Payment Updated!');
    }
    public function destroy($id)
    {
        Payment::destroy($id);
        return redirect('payments')->with('flash_message', 'Payment deleted!');
    }

}
