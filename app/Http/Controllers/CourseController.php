<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return Inertia::render('Course/Index', ['courses' => $courses]);
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => ['required'],
            'location' => ['required'],
            'holes' => ['required'],
        ])->validate();

        Course::create($request->all());

        return Redirect::route('course.index')->with('success', 'Organization created.');
    }
}
