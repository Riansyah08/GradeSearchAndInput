@extends('layouts.app')

@section('title', 'Confirm Delete Grade')

@section('content')
<div class="row mt-4">
   <div class="col-4 offset-4">
       <form action="/grade/delete/{{ $grade->id }}" method="post">
           @csrf
           <div class="mb-3">
               <h4>Are you sure you want to delete:</h4>
               <h5>Major: {{ $grade->fmajor_name }} </h5>
               <h5>Author: {{ $grade->first_name }} {{ $grade->last_name }} </h5>
               <h5>Course: {{ $grade->course_name }} </h5>
               <h5>Grade: {{ $grade->std_grade }}</h5>
           </div>
           <div class="mb-3">
               <button type="submit" class="btn btn-success">Confirm</button>
               <a href="/grade" class="btn btn-warning">Cancel</a>
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
