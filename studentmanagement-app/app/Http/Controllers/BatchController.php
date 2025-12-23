<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Models\Batch;
use App\Models\Course;

class BatchController extends Controller
{
    public function index() :view
    {
        $batches = Batch::all();
        return view('batches.index')->with('batches', $batches);
    }
    public function create():view
    {
        $courses = Course::pluck('name', 'id');
        return view('batches.create', compact('courses'));
        
        
       
    }
    public function store(Request $request):RedirectResponse
    {
        $batch = new Batch();
        $batch->name = $request->name;
        $batch->course_id = $request->course_id;
        $batch->start_date = $request->start_date;
        $batch->save();
        return redirect()->route('batches.index');
    }
    public function show($id):view
    {
        $batch = Batch::findOrFail($id);
        return view('batches.show')->with('batch', $batch);
    }
    public function edit($id):view
    {
        $batch = Batch::findOrFail($id);
        $courses = Course::pluck('name', 'id');
        return view('batches.edit', compact('batch', 'courses'));
    }
    public function update(Request $request, $id):RedirectResponse
    {
        $batch = Batch::findOrFail($id);
        $batch->name = $request->name;
        $batch->course_id = $request->course_id;
        $batch->start_date = $request->start_date;
        $batch->save();
        return redirect('batches')->with('flash_message', 'Batch updated successfully');
    }
    public function destroy($id):RedirectResponse
    {
        $batch = Batch::findOrFail($id);
        $batch->delete();
        return redirect('batches')->with('flash_message', 'Batch deleted successfully');
    }
}
