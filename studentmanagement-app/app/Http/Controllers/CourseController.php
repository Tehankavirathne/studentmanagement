<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Course;
use Illuminate\View\View;

class CourseController extends Controller
{
    public function index(): View
    {
        $courses = Course::all();
        return view('courses.index')->with('courses', $courses);
    }

    public function create(): View

    {
        return view('courses.create');
    }

    public function store(Request $request): RedirectResponse

    {
        $input = $request->all();
        Course::create($input);
        return redirect('courses')->with('flash_message', 'Course Added!');
    }

    public function show(string $id): View

    {
        $course = Course::findOrFail($id);
        return view('courses.show')->with('course', $course);
    }

    public function edit(string $id): View

    {
        $course = Course::findOrFail($id);
        return view('courses.edit')->with('course', $course);
    }

    public function update(Request $request, string $id): RedirectResponse

    {
        $course = Course::findOrFail($id);
        $input = $request->all();
        $course->update($input);
        return redirect('courses')->with('flash_message', 'Course Updated!');
    }
    
    public function destroy(string $id): RedirectResponse

    {
        Course::destroy($id);
        return redirect('courses')->with('flash_message', 'Course deleted!');
    }
}
