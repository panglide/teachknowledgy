@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                  <a href="{{url('lessons/demo')}}">
                    <button type="button" name="button" class="btn btn-primary">Standards</button>
                  </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
