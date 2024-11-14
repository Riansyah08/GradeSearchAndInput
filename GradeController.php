<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Grade;
use App\Models\Faculty;
use App\Models\Student;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function index() {
        $grades = Grade::all(["id", "std_grade", "major_name", "NIM" , "first_name", "last_name", "course_name"]);
        return view("grade.index", ["grades" => $grades]);
    }

    public function add() {
        $faculties = Faculty::all(["id", "major_name"]);
        $students = Student::all(["id", "NIM" , "first_name", "last_name"]);
        $courses = Course::all(["id", "course_name"]);
        return view("grade.form", [
            "faculties" => $faculties,
            "students" => $students,
            "courses" => $courses,
        ]);
    }

    public function update(string $id) {
        $grade = Grade::find($id);
        $faculties = Faculty::all(["id", "major_name"]);
        $students = Student::all(["id", "NIM", "first_name", "last_name"]);
        $courses = Course::all(["id", "course_name"]);
        $course_grade = $grade->courses()->pluck('course_name')->all();
        return view("grade.form", [
            "grade" => $grade,
            "faculties" => $faculties,
            "students" => $students,
            "courses" => $courses,
            "course_grade" => $course_grade,
        ]);
    }

    public function save(Request $request) {
        if ($request->has('id')) {
            $grades = Grade::find($request->id);
            if (!$grades) {
                return redirect("/grade")->with('error', 'Grade not found.');
            }
        } else {
            $grades = new Grade();
        }
        $grades->std_grade = $request->std_grade;
        $grades->major_name = $request->major_name;
        $grades->NIM = $request->NIM;
        $grades->first_name = $request->first_name;
        $grades->last_name = $request->last_name;
        $grades->course_name = $request->course_name;
        $grades->save();
        return redirect("/grade")->with('success', 'Grade saved successfully.');
    }

    public function delete(Request $request) {
        $grade = Grade::find($request->id);
        if (!$grade) {
            return redirect("/grade")->with('error', 'Grade not found.');
        }
    
        if ($request->method() == "POST") {
            $grade->delete();
            return redirect("/grade")->with('success', 'Grade deleted successfully.');
        } else {
            return view("grade.delete", ["grade" => $grade]);
        }
    }

    public function search(Request $request) {
        $searchQuery = $request->input('search');
        if ($searchQuery) {
            $grades = Grade::where(function($query) use ($searchQuery) {
                $query->where('first_name', 'like', "%$searchQuery%")
                ->orWhere('last_name', 'like', "%$searchQuery%")
                ->orWhere('std_grade', 'like', "%$searchQuery%")
                ->orWhere('major_name', 'like', "%$searchQuery%")
                ->orWhere('course_name', 'like', "%$searchQuery%")
                ->orWhere('NIM', 'like', "%$searchQuery%");})->get();
        } else {
            $grades = Grade::all();
        }
        return view("grade.index", ["grades" => $grades]);
    }
    
}



