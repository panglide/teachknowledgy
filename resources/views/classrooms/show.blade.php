@extends('layouts.app')
@section('content')

<div class="container">
    <div class="classroom">
    <div>{{ $user->name }}</div>
        <div class="classroom__title"><h1>{{ $classroom->title }}</h1></div>
        <div class="classroom__subject">{{ $classroom->subject }}</div>
    </div>
    <div class="classroom__lesson">
        <div class="lesson__links">
            @foreach( $lessons as $lesson )
            <ul>
                <li>
                    <div class="row">
                        <div class="col">
                            <a href="{{ route('lessons.show', $lesson) }}?classroom={{ $classroom->id }}">{{ $lesson->name }}</a>
                        </div>
                    </div>
                </li>
            </ul>
            @endforeach
        </div>
    </div>
</div>

@endsection