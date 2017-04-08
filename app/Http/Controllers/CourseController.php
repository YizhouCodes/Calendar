<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourse;

use App\Course;

use Auth;

use Illuminate\Support\Facades\Input;

class CourseController extends Controller
{

	public function index() {
		$courses = Course::all();
		return view('course.index')->with(compact('courses'));
	}

    public function create() {
    	return view('course.create');
    }

    public function save_course(StoreCourse $request) {
    	$course = new Course();
    	$course->user_id = Auth::user()->id;
    	$course->name = Input::get('name');
    	$course->description = Input::get('description');
    	$course->credit = Input::get('credit');
    	$course->teacher_name = Input::get('teacher_name');
    	$course->start_date = Input::get('start_date');
    	$course->end_date = Input::get('end_date');
    	$course->save();

    	return redirect()->action('CourseController@index')->with('status', 'Course saved!');
    }

    public function show(Course $course) {
    	return view('course.show')->with(compact('course'));
    }

    public function destroy(Course $course) {
    	$deletedCourse = Course::where('id', '=', $course->id)->first()->delete();
    	return redirect()->action('CourseController@index')->with('status', 'Course deleted!');
    }

    public function edit(Course $course) {
    	return view('course.edit')->with(compact('course'));
    }

    public function save_update(StoreCourse $request) {
    	$id = Input::get('id');
    	$course = Course::where('id', '=', $id)->first();
    	$course->update($request->all());

    	return redirect()->action('CourseController@index')->with('status', 'Course edited!');
    }
}
