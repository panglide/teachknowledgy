@extends('layouts.app')
@section('content')

<h1>Create Your Classroom</h1>

<form action='/classrooms' method="POST">
@csrf
  <div class="form-group">
    <label for="classroom_name">Classroom Title</label>
    <input type="text" class="form-control" id="title" name="title" aria-describedby="classroomTitleHelp" value="{{ old('title') }}" required>
  </div>
@error( 'title' )
<span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
</span>
@enderror

<div class="form-group row">
    <label for="gradeLevel" class="col-md-4 col-form-label text-md-right mr-3">Grade Level</label>

    <div class="form-check form-check-inline col-md-6">
    @for($i = 1; $i < 9; $i++)
        <input class="form-check-input gradeLevel-check" onclick="checkGrade()" type="checkbox" id="gradeLevel {{ $i }}" value="{{ $i }}" name="gradeLevel[]" required>
        <label class="form-check-label mr-2" for="gradeLevel">{{ $i }}</label>
    @endfor
    </div>

    @error( 'gradeLevel' )
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>



<div class="form-group row">
    <label for="subject" class="col-md-4 col-form-label text-md-right mr-3">Subject(s)</label>

    <div class="form-check form-check-inline col-md-6">
    <?php $subjects = ['ELA', 'Math', 'Science', 'Social Studies' ]; ?>
    @foreach( $subjects as $subject )
        <input class="form-check-input subject-check" onclick="checkSubject()" type="checkbox" id="{{ $subject }}" value="{{ $subject }} " name="subject[]" required>
        <label class="form-check-label mr-2" for="subject">{{ $subject }}</label>
    @endforeach
    </div>

    @error( 'subject' )
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<button type="submit" class="btn btn-outline-sedondary">Submit</button>

</form>

@endsection