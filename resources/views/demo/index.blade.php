@extends('layouts.app')
@section('content')


<div class="container">
  <h1>Demo</h1>
  <hr/>
<p>You are a 1st grade math teacher for this demo.</p>
<hr/>
  @foreach($results as $title => $content )
  <h3><a href="{{url('lessons/demo')}}">{{ $title }} <i style="font-size: 12px;" class="fas fa-hand-pointer"> for lessons</i></a></h3>
  <p>{{ $content }} </p>
  @endforeach
</div>






@endsection
