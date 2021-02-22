@extends('layouts.app')
@section('content')

<div class="container">
    <div class="classroom">
        <div class="classroom__title"><h1>{{ $classroom->title }}</h1></div>
        <div class="classroom__subject">{{ $classroom->subject }}</div>
    </div>
    <div class="classroom__lesson">
        <div class="lesson__links">
            @foreach( $lessons as $lesson )
            <a href="{{ route('lessons.show', $lesson) }}">{{ $lesson->name }}</a>
            @endforeach
        </div>
    </div>
</div>

@endsection