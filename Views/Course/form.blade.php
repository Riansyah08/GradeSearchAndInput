@extends('layouts.app')

@section('title', 'Course')

@section('content')
<div class="row mt-4">
   <div class="col-4 offset-4">
       <form action="/course/save" method="post">
           @csrf
           @if (!empty($course?->id))
           <input type="hidden" name="id" value="{{ $course->id }}"/>
           @endif
           <div class="mb-3">
               <label for="name" class="form-label">Course ID</label>
               <input type="number" name="course_id" class="form-control"
                   placeholder="Enter Id"
                   value="{{ isset($course) ? $course?->course_id : old('course_id') }}"/>
           </div>
           <div class="mb-3">
               <label for="name" class="form-label">Course Name</label>
               <input type="text" name="course_name" class="form-control"
                   placeholder="Enter Name"
                   value="{{ isset($course) ? $course?->course_name : old('course_name') }}"/>
           </div>
           <div class="mb-3">
               <button type="submit" class="btn btn-success">Save</button>
               <a href="/course" class="btn btn-warning">Cancel</a>
           </div>
           <div class="mt-4">
               @if ($errors->any())
               <div class="alert alert-danger">
                   <ul>
                       @foreach ($errors->all() as $error)
                       <li>{{ $error }}</li>
                       @endforeach
                   </ul>
               </div>
               @endif
           </div>
       </form>
   </div>
</div>
@endsection
