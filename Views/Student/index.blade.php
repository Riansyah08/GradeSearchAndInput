@extends('layouts.app')

@section('title', 'Students Data')

@section('content')
<div class="container mt-3">
    <form action="/student/search" class="form-inline" method="GET">
                <input type="search" name="search" class="form-control float-right" placeholder="Input Student NIM or First Name to Search">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                    </button>
            </form>
                </div>
   <a href="/student/add" class="btn btn-primary">Add Data</a>
   <table class="table table-sm table-bordered mt-4">
       <thead>
           <tr>
               <th>NIM</th>
               <th>First Name</th>
               <th>Last Name</th>
               <th>Date of Birth</th>
               <th>Address</th>
               <th colspan="2">Actions</th>
           </tr>
       </thead>
       <tbody>
          @foreach ($students as $studento)
          <tr>

              <td>{{ $studento->NIM }}</td>
              <td>{{ $studento->first_name }}</td>
              <td>{{ $studento->last_name }}</td>
              <td>{{ $studento->date_of_birth }}</td>
              <td>{{ $studento->address }}</td>
              <td>
                  <a href="/student/update/{{ $studento->id }}" class="btn btn-primary">Edit</a>
              </td>
              <td>
                  <a href="/student/delete/{{ $studento->id }}" class="btn btn-danger">Delete</a>
              </td>
          </tr>
          @endforeach
       </tbody>
   </table>
</div>
@endsection
