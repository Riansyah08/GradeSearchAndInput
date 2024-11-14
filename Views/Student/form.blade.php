@extends('layouts.app')

@section('title', 'Students')

@section('content')
<div class="row mt-4">
   <div class="col-6 offset-3">
       <form action="/student/save" method="post">
           @csrf
           @if (isset($student))
           <input type="hidden" name="id" value="{{ $student->id }}">
           @endif
          

           <div class="mb-3">
               <label for="NIM" class="form-label">NIM</label>
               <input type="number" name="NIM" class="form-control"
                   placeholder="Enter The NIM" 
                   value="{{ isset($student) ? $student->NIM : old('NIM') }}"
                   required>
           </div>
           <div class="mb-3">
               <label for="first_name" class="form-label">First Name</label>
               <input type="text" name="first_name" class="form-control"
                   placeholder="Enter First Name"
                   value="{{ isset($student) ? $student->first_name : old('first_name') }}"
                   required>
           </div>
           <div class="mb-3">
               <label for="last_name" class="form-label">Last Name</label>
               <input type="text" name="last_name" class="form-control"
                   placeholder="Enter Last Name"
                   value="{{ isset($student) ? $student->last_name : old('last_name') }}"
                   required>
           </div>
           <div class="mb-3">
               <label for="date_of_birth" class="form-label">Date of Birth</label>
               <input type="date" name="date_of_birth" class="form-control"
                   value="{{ isset($student) ? $student->date_of_birth : old('date_of_birth') }}"
                   required>
           </div>
           <div class="mb-3">
               <label for="address" class="form-label">Address</label>
               <input type="text" name="address" class="form-control"
                   placeholder="Enter Your Address"
                   value="{{ isset($student) ? $student->address : old('address') }}"
                   required>
           </div>
           <div class="mb-3">
               <button type="submit" class="btn btn-success">Save</button>
               <a href="/student" class="btn btn-warning">Cancel</a>
           </div>
       </form>
   </div>
</div>
<div class="row mt-4">
    <div class="col-6 offset-3">
        @if (session()->has('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
    </div>
</div>
@endsection
