@extends('layouts.app')

@section('content')

<div class="container">
  <div class="title">Welcome {{ Auth::user()->name }}</div>
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">Classrooms</div>
          <div class="card-body">
            @foreach( $classrooms as $classroom )
            <div class="row">
              <a class="col-md-6" href="{{url('classrooms/'. $classroom->id )}}">
                <div>{{ $classroom->title }}</div>
              </a>
              <div class="col-md-6">{{ $classroom->subject }}</div>
            </div>
            @endforeach
          </div>
        </div>
      </div> 
    </div>
  </div>
</div>
@endsection
