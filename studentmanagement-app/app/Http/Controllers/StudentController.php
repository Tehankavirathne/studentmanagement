<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use App\Models\Student;
use Illuminate\View\View;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
         $student = Student::all();
        return view('students.index')->with('students', $student);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
         return view('students.create');
    }

   
    public function store(Request $request): RedirectResponse
    {
        
        $input = $request->all();
        Student::create($input);
        return redirect('students')->with('flash_message', 'Student Added!');
    }

    
    public function show(string $id): View
    {
        $student = Student::find($id);
        return view('students.show')->with('student', $student);
    }

    
    public function edit(string $id): View
    {
        $student = Student::find($id);
        return view('students.edit')->with('student', $student);
    }

  
    public function update(Request $request, string $id): RedirectResponse
    {
         $student = Student::find($id);
        $input = $request->all();
        $student->update($input);
        return redirect('students')->with('flash_message', 'Student Added!');  
    }

   
    public function destroy(string $id): RedirectResponse
    {
       Student::destroy($id);
        return redirect('students')->with('flash_message', 'Student deleted!'); 
    }
}
