<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    public function index() {
        $faculties = Faculty::all(["id", "faculty_name", "major_id", "major_name"])->sortBy('faculty_name');
        return view("faculty/index", ["faculties" => $faculties]);
    }

    public function add() {
        return view("faculty/form");
    }

    public function update(string $id) {
        $faculty = Faculty::find($id);
        return view("faculty/form", ["faculty" => $faculty]);
    }
    

    public function save(Request $request) {
        if (isset($request->id)) {
            $faculty = Faculty::find($request->id);
        } else {
            $faculty = new Faculty();
        }
        $faculty->faculty_name = $request->faculty_name;
        $faculty->major_id = $request->major_id;
        $faculty->major_name = $request->major_name;
        $faculty->save();
        return redirect("/faculty");
    }

    public function delete(Request $request) {
        if ($request->isMethod('post')) {
            $faculty = Faculty::find($request->id);
            if ($faculty) {
                $faculty->delete();
            }
            return redirect("/faculty");
        } else {
            $faculty = Faculty::find($request->id);
            return view("faculty/delete", ["faculty" => $faculty]);
        }
    }    

    public function search(Request $request) {
        $searchQuery = $request->input('search');
        if ($searchQuery) {
            $faculties = Faculty::where(function($query) use ($searchQuery) {
                $query->where('faculty_name', 'like', "%$searchQuery%")
                ->orWhere('major_id', 'like', "%$searchQuery%")
                ->orWhere('major_name', 'like', "%$searchQuery%");})->get();
        } else {
            $faculties = Faculty::all();
        }
        return view("faculty.index", ["faculties" => $faculties]);
    }
}
