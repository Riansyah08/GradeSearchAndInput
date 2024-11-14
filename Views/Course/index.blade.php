@extends('layouts.app')

@section('title', 'Course Data')

@section('content')
<form action="/course/search" class="form-inline" method="GET">
                <input type="search" name="search" class="form-control float-right" placeholder="Input Course Id or Course Name to Search">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                    </button>
            </form>
<div class="container mt-3">
   <a href="/course/add" class="btn btn-primary">Add Data</a>
   <table class="table table-sm table-bordered mt-4">
       <thead>
           <tr>
               <th>Course Id</th>
               <th>Course Name</th>
               <th colspan="2">Actions</th>
           </tr>
       </thead>
       <tbody>
           @foreach ($courses as $course)
           <tr>
               <td>{{ $course->course_id }}</td>
               <td>{{ $course->course_name }}</td>
               <td>
                   <a href="/course/update/{{ $course->id }}" class="btn btn-primary">Edit</a>
               </td>
               <td>
                   <a href="/course/delete/{{ $course->id }}" class="btn btn-danger">Delete</a>
               </td>
           </tr>
           @endforeach
       </tbody>
   </table>
</div>
@endsection
