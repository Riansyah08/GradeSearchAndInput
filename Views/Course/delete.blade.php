@extends('layouts.app')

@section('title', 'Confirm Delete Course')

@section('content')
<div class="row mt-4">
   <div class="col-4 offset-4">
       <form action="/course/delete/{{ $course->id }}" method="post">
           @csrf
           <div class="mb-3">
               <h4>Are you sure you want to delete:</h4>
               <h5>Course Id: {{ $course->course_id }} </h5>
               <h5>Course Name: {{ $course->course_name }} </h5>
           </div>
           <div class="mb-3">
               <button type="submit" class="btn btn-success">Confirm</button>
               <a href="/course" class="btn btn-warning">Cancel</a>
           </div>
           <div class="mt-4">
               @if (!empty(session("error")))
                   {{ session("error", "") }}
               @endif
           </div>
       </form>
   </div>
</div>
@endsection
