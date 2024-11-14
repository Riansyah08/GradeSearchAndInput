@extends('layouts.app')

@section('title', 'Faculty')

@section('content')
<div class="row mt-4">
   <div class="col-4 offset-4">
       <form action="/faculty/save" method="post">
           @csrf
           @if (!empty($faculty?->id))
           <input type="hidden" name="id" value="{{ $faculty->id }}"/>
           @endif
           <div class="mb-3">
               <label for="faculty_name" class="form-label">Faculty Name</label>
               <input type="text" name="faculty_name" class="form-control"
                   placeholder="Enter Name"
                   value="{{ isset($faculty) ? $faculty?->faculty_name : old('faculty_name') }}"/>
           </div>
           <div class="mb-3">
               <label for="major_id" class="form-label">Major ID</label>
               <input type="number" name="major_id" class="form-control"
                   placeholder="Enter Id"
                   value="{{ isset($faculty) ? $faculty?->major_id : old('major_id') }}"/>
           </div>
           <div class="mb-3">
               <label for="major_name" class="form-label">Major Name</label>
               <input type="text" name="major_name" class="form-control"
                   placeholder="Enter Name"
                   value="{{ isset($faculty) ? $faculty?->major_name : old('major_name') }}"/>
           </div>
           <div class="mb-3">
               <button type="submit" class="btn btn-success">Save</button>
               <a href="/faculty" class="btn btn-warning">Cancel</a>
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