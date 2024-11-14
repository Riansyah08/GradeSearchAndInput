@extends('layouts.app')

@section('title', 'Grade')

@section('content')
<div class="row mt-4">
   <div class="col-4 offset-4">
       <form action="/grade/save" method="post">
           @csrf
           @if (!empty($grade))
           <input type="hidden" name="id" value="{{ $grade->id }}">
           @endif
           <div class="mb-3">
               <label for="major_name" class="form-label">Major</label>
               <select name="major_name" class="form-select">
                   @foreach ($faculties as $faculty)
                   <option value="{{ $faculty->major_name }}"
                       {{ isset($grade) && $grade->faculty && $grade->faculty->id == $faculty->id ? 'selected' : '' }}>
                       {{ $faculty->major_name }}
                   </option>
                   @endforeach
               </select>
           </div>
           <div class="mb-3">
               <label for="NIM" class="form-label">NIM</label>
               <select name="NIM" class="form-select">
                   @foreach ($students as $student)
                   <option value="{{ $student->NIM }}"
                       {{ isset($grade) && $grade->student && $grade->student->id == $student->id ? 'selected' : '' }}>
                       {{ $student->NIM }}
                   </option>
                   @endforeach
               </select>
           </div>
           <div class="mb-3">
               <label for="first_name" class="form-label">Student First Name</label>
               <select name="first_name" class="form-select">
                   @foreach ($students as $student)
                   <option value="{{ $student->first_name }}"
                       {{ isset($grade) && $grade->student && $grade->student->id == $student->id ? 'selected' : '' }}>
                       {{ $student->first_name }}
                   </option>
                   @endforeach
               </select>
           </div>
           <div class="mb-3">
               <label for="last_name" class="form-label">Student Last Name</label>
               <select name="last_name" class="form-select">
                   @foreach ($students as $student)
                   <option value="{{ $student->last_name }}"
                       {{ isset($grade) && $grade->student && $grade->student->id == $student->id ? 'selected' : '' }}>
                       {{ $student->last_name }}
                   </option>
                   @endforeach
               </select>
           </div>
           <div class="mb-3">
               <label for="course_name" class="form-label">Course</label>
               <select name="course_name" class="form-select">
                   @foreach ($courses as $course)
                   <option value="{{ $course->course_name }}"
                       {{ isset($grade) && $grade->course && $grade->course->id == $course->id ? 'selected' : '' }}>
                       {{ $course->course_name }}
                   </option>
                   @endforeach
               </select>
           </div>
           <div class="mb-3">
               <label for="std_grade" class="form-label">Grade</label>
               <input type="text" name="std_grade" class="form-control"
                   placeholder="Enter Grade"
                   value="{{ isset($grade) ? $grade->std_grade : old('std_grade') }}"/>
           </div>
           <div class="mb-3">
               <button type="submit" class="btn btn-success">Save</button>
               <a href="/grade" class="btn btn-warning">Cancel</a>
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
