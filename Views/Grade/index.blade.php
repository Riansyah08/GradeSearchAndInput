@extends('layouts.app')

@section('title', 'Grade Data')

@section('content')
<form action="/grade/search" class="form-inline" method="GET">
                <input type="search" name="search" class="form-control float-right" placeholder="Input Student NIM, First or Last Name, Course and Major Name and Grade to Search">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                    </button>
            </form>
<div class="container mt-3">
   <a href="/grade/add" class="btn btn-primary">Add Data</a>
   <table class="table table-sm table-bordered mt-4">
       <thead>
           <tr>
               <th>Major</th>
               <th>NIM</th>
               <th>Student Name</th>
               <th>Course Name</th>
               <th>Grade</th>
               <th colspan="2">Actions</th>
           </tr>
       </thead>
       <tbody>
           @foreach ($grades as $grade)
           <tr>
               <td>{{ $grade->major_name }}</td>
               <td>{{ $grade->NIM }}</td>
               <td>{{ $grade->first_name }} {{ $grade->last_name }}</td>
               <td>{{ $grade->course_name }}</td>
               <td>{{ $grade->std_grade }}</td>
               <td>
                   <a href="/grade/update/{{ $grade->id }}" class="btn btn-primary">Edit</a>
               </td>
               <td>
                   <a href="/grade/delete/{{ $grade->id }}" class="btn btn-danger">Delete</a>
               </td>
           </tr>
           @endforeach
       </tbody>
   </table>
</div>
@endsection
