<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index() {
        $students = Student::all(['id', 'NIM', 'first_name', 'last_name', 'date_of_birth', 'address'])
            ->sortBy('id');
        return view("student/index", ["students" => $students]);
    }    

    public function add() {
        return view("student/form");
    }

    public function update(string $id) {
        $student = Student::find($id);
        return view("student/form", [
            "student" => $student
        ]);
    }

    public function save(Request $request) {
        if ($request->has('id')) {
            $students = Student::find($request->id);
            if (!$students) {
                return redirect("/student")->with('error', 'Student not found.');
            }
        } else {
            $students = new Student();
        }
        $students->NIM = $request->NIM;
        $students->first_name = $request->first_name;
        $students->last_name = $request->last_name;
        $students->date_of_birth = $request->date_of_birth;
        $students->address = $request->address;
        $students->save();
        return redirect("/student")->with('success', 'Student saved successfully.');
    }
    
    public function delete(Request $request) {
        if ($request->isMethod('post')) {
            $students = Student::find($request->id);
            if ($students) {
                $students->delete();
            }
            return redirect("/student");
        } else {
            $students = Student::find($request->id);
            return view("student/delete", ["students" => $students]);
        }
    }  

    public function search(Request $request) {
        $searchQuery = $request->input('search');
        if ($searchQuery) {
            $students = Student::where(function($query) use ($searchQuery) {
                $query->where('first_name', 'like', "%$searchQuery%")
                ->orWhere('NIM', 'like', "%$searchQuery%");})->get();
        } else {
            $students = Student::all();
        }
        return view("student.index", ["students" => $students]);
    }
}
