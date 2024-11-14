@extends('layouts.app')

@section('title', 'Confirm Delete Faculty')

@section('content')
<div class="row mt-4">
   <div class="col-4 offset-4">
       <form action="/faculty/delete/{{ $faculty->id }}" method="post">
           @csrf
           <div class="mb-3">
               <h4>Are you sure you want to delete:</h4>
               <h5>Faculty Name: {{ $faculty->faculty_name }} </h5>
               <h5>Major ID: {{ $faculty->major_id }} </h5>
               <h5>Major Name: {{ $faculty->major_name }} </h5>
           </div>
           <div class="mb-3">
               <button type="submit" class="btn btn-success">Confirm</button>
               <a href="/faculty" class="btn btn-warning">Cancel</a>
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
