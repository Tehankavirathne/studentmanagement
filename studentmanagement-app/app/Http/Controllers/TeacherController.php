<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use App\Models\Teacher;
use Illuminate\View\View;
class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
         $teachers = Teacher::all();
        return view('teachers.index')->with('teachers', $teachers);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
         return view('teachers.create');
    }

   
    public function store(Request $request): RedirectResponse
    {
        
        $input = $request->all();
        Teacher::create($input);
        return redirect('teachers')->with('flash_message', 'Teacher Added!');
    }

    
    public function show(string $id): View
    {
        $teacher = Teacher::findOrFail($id);
        return view('teachers.show')->with('teacher', $teacher);
    }

    
    public function edit(string $id): View
    {
        $teacher = Teacher::findOrFail($id);
        return view('teachers.edit')->with('teacher', $teacher);
    }

  
    public function update(Request $request, string $id): RedirectResponse
    {
         $teacher = Teacher::findOrFail($id);
        $input = $request->all();
        $teacher->update($input);
        return redirect('teachers')->with('flash_message', 'Teacher Updated!');  
    }

   
    public function destroy(string $id): RedirectResponse
    {
       Teacher::destroy($id);
        return redirect('teachers')->with('flash_message', 'Teacher deleted!'); 
    }
}
