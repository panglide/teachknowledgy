@extends('layouts.app')
@section('content')

<div class="container">
    <div class="classroom">
        <div>{{ $classroom->user->name }}</div>
        <div class="row">
            <div class="col-8">
                <div class="classroom__title"><h1>{{ $classroom->title }}</h1></div>
            </div>
            <div class="col-4">
                <div class="classroom__subject"><h1>{{ $classroom->subject }}</h1></div>
            </div>
        </div>
    </div>

    <div class="classroom__lesson">
        <div class="lesson__links">
       
        @foreach( $lessons as $lesson )
            <div class="row mt-4">
                <div class="col-4">
                    <div class="classroom__lesson--schedule">{{ $classroom->subject }} Lesson Week {{ $week+=1 }}</div>
                </div>
                <div class="col-8">
                    <a href="{{ route('lessons.show', $lesson) }}?classroom={{ $classroom->id }}">{{ $lesson->name }}</a>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</div>

@endsection