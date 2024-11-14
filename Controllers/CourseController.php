<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index() {
        $courses = Course::all(["id", "course_id", "course_name"])->sortBy(["course_id"]);
        return view("course/index", ["courses" => $courses]);
    }

    public function add() {
        return view("course/form");
    }

    public function update(string $id) {
        $course = Course::find($id);
        if (!$course) {
            return redirect()->back()->with('error', 'Course not found.');
        }
        return view("course/form", ["course" => $course]);
    }
    

    public function save(Request $request) {
        if(isset($request->id)) {
            $course = Course::find($request->id);
        } else {
            $course = new Course();
        }
        $course->course_id = $request->course_id;
        $course->course_name = $request->course_name;
        $course->save();
        return redirect("/course");
    }

    public function delete(Request $request) {
        if ($request->isMethod('post')) {
            $course = Course::find($request->id);
            if ($course) {
                $course->delete();
            }
            return redirect("/course");
        } else {
            $course = Course::find($request->id);
            return view("course/delete", ["course" => $course]);
        }
    }   

    public function search(Request $request) {
        $searchQuery = $request->input('search');
    
        if ($searchQuery) {
            $courses = Course::where(function($query) use ($searchQuery) {
                $query->where('course_id', 'like', "%$searchQuery%")
                ->orWhere('course_name', 'like', "%$searchQuery%");})->get();
        } else {
            $courses = Course::all();
        }
        return view("course.index", ["courses" => $courses]);
    }
}
