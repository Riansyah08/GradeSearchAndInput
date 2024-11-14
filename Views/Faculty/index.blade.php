@extends('layouts.app')

@section('title', 'Faculty Data')

@section('content')
<form action="/faculty/search" class="form-inline" method="GET">
                <input type="search" name="search" class="form-control float-right" placeholder="Input Faculty or Major name and Id to search">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                    </button>
            </form>
<div class="container mt-3">
   <a href="/faculty/add" class="btn btn-primary">Add Data</a>
   <table class="table table-sm table-bordered mt-4">
       <thead>
           <tr>
               <th>Faculty Name</th>
               <th>Major Id</th>
               <th>Major Name</th>
               <th colspan="2">Actions</th>
           </tr>
       </thead>
       <tbody>
           @foreach ($faculties as $faculti)
           <tr>
               <td>{{ $faculti->faculty_name }}</td>
               <td>{{ $faculti->major_id }}</td>
               <td>{{ $faculti->major_name }}</td>
               <td>
                   <a href="/faculty/update/{{ $faculti->id }}" class="btn btn-primary">Edit</a>
               </td>
               <td>
                   <a href="/faculty/delete/{{ $faculti->id }}" class="btn btn-danger">Delete</a>
               </td>
           </tr>
           @endforeach
       </tbody>
   </table>
</div>
@endsection