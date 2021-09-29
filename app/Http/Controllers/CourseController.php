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

    public function create()
    {
        return Inertia::render('Course/Create');
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name'      => ['required'],
            'location'  => ['required'],
            'holes'     => ['required'],
        ])->validate();

        Course::create($request->all());

        return Redirect::route('course.index')->with('success', 'Organization created.');
    }

    public function edit(Course $course)
    {
        return Inertia::render('Course/Edit', [
            'course' => [
                'id'        => $course->id,
                'name'      => $course->name,
                'location'  => $course->location,
                'holes'     => $course->holes
            ]
        ]);
    }

    public function update(Course $course, Request $request)
    {

        $course->update(
            Validator::make($request->all(), [
                'name'      => ['required'],
                'location'  => ['required'],
                'holes'     => ['required'],
            ])->validate()
        );

        return Redirect::back()->with('success', 'Course updated.');
    }
}
