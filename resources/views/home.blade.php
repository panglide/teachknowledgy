@extends('layouts.app')

@section('content')

<div class="container">
  <div class="title">Welcome {{ Auth::user()->name }}</div>
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="row"> 
            <div class="col-6">Classrooms</div>
            <div class="col-4">Subject</div>
            <div class="col-2 text-right"><a href="{{ url('/classrooms.create') }}"><button class="btn btn-outline-secondary">Add Classroom</button></a></div>
          </div>
        </div>
          <div class="card-body">
            @foreach( $classrooms as $classroom )
            <div class="row">
              <a class="col-md-6" href="{{url('classrooms/'. $classroom->id )}}">
                <div>{{ $classroom->title }}</div>
              </a>
              <div class="col-md-4">{{ $classroom->subject }}</div>
              <div class="col-md-2">
                <form action="{{ '/classrooms/'. $classroom->id }}" method="POST">
                @method( 'DELETE' )
                @csrf
                  <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fas fa-times"></i></button>
                </form>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div> 
    </div>
  </div>
</div>
@endsection
