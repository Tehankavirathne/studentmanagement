<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response; // Keep existing import if needed, but not strictly used here
use App\Models\Enrollment;
use App\Models\Batch;
use App\Models\Student;
use Illuminate\View\View;


class EnrollmentController extends Controller
{
    public function index()
    {
        $enrollments = Enrollment::all();
        return view('enrollments.index', compact('enrollments'));
    }
    
    public function create():View
    {
        $batches = Batch::pluck('name', 'id');
        $students = Student::pluck('name', 'id');
        return view('enrollments.create', compact('batches', 'students'));
    }

    public function store(Request $request):RedirectResponse
    {
        $request->validate([
            'enroll_no' => 'required',
            'batch_id' => 'required|exists:batches,id',
            'student_id' => 'required|exists:students,id',
            'join_date' => 'required|date',
            'fee' => 'required|numeric'
        ]);

        $input = $request->all();
        Enrollment::create($input);
        return redirect('enrollments')->with('flash_message', 'Enrollment Added!');
    }

    public function show(string $id):View
    {
        $enrollment = Enrollment::findOrFail($id);
        return view('enrollments.show')->with('enrollment', $enrollment);
    }

    public function edit(string $id):View
    {
        $enrollment = Enrollment::findOrFail($id);
        $batches = Batch::pluck('name', 'id');
        $students = Student::pluck('name', 'id');
        return view('enrollments.edit', compact('enrollment', 'batches', 'students'));
    }

    public function update(Request $request, string $id):RedirectResponse
    {
        $request->validate([
            'enroll_no' => 'required',
            'batch_id' => 'required|exists:batches,id',
            'student_id' => 'required|exists:students,id',
            'join_date' => 'required|date',
            'fee' => 'required|numeric'
        ]);

        $enrollment = Enrollment::findOrFail($id);
        $input = $request->all();
        $enrollment->update($input);
        return redirect('enrollments')->with('flash_message', 'Enrollment Updated!');
    }

    public function destroy(string $id):RedirectResponse
    {
        Enrollment::destroy($id);
        return redirect('enrollments')->with('flash_message', 'Enrollment deleted!');
    }
}
