@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                          <label for="gradeLevel" class="col-md-4 col-form-label text-md-right">Grade Level</label>

                            <div class="form-check form-check-inline col-md-6">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="0" name="gradeLevel">
                                <label class="form-check-label" for="kindergarten">K</label>&nbsp;
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1" name="gradeLevel">
                                <label class="form-check-label" for="first grade">1</label>&nbsp;
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="2" name="gradeLevel">
                                <label class="form-check-label" for="second grade">2</label>&nbsp;
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="3" name="gradeLevel">
                                <label class="form-check-label" for="third grade">3</label>&nbsp;
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="4" name="gradeLevel">
                                <label class="form-check-label" for="fourth grade">4</label>&nbsp;
                                <!-- <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="5" name="gradeLevel">
                                <label class="form-check-label" for="fifth grade">5</label>&nbsp;
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="6" name="gradeLevel">
                                <label class="form-check-label" for="sixth grade">6</label>&nbsp;
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="7" name="gradeLevel">
                                <label class="form-check-label" for="seventh grade">7</label>&nbsp;
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="8" name="gradeLevel">
                                <label class="form-check-label" for="eighth grade">8</label>&nbsp; -->
                                <!-- <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="9" name="gradeLevel">
                                <label class="form-check-label" for="ninth grade">9</label>&nbsp;
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="10" name="gradeLevel">
                                <label class="form-check-label" for="tenth grade">10</label>&nbsp;
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="11" name="gradeLevel">
                                <label class="form-check-label" for="eleventh grade">11</label>&nbsp;
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="12" name="gradeLevel">
                                <label class="form-check-label" for="twelth grade">12</label> -->
                              </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
