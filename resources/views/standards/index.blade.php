@extends('layouts.app')
@section('content')


@foreach($results as $title => $content )

<div class="container">
  <h3>{{ $title }}</h3> <p>{{ $content }} </p>
</div>



@endforeach


@endsection
