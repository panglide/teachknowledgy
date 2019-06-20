@extends('layouts.app')
@section('content')


<div class="container">
  <h1>Demo Assessment</h1>
  <hr/>
<p>You will print this for students.</p>
<hr/>
  @foreach($students as $student )
<h1 style="break-before: page; text-align: right;">Student ID: [ {{ $student }} ]</h1>
    <table class="table table-border">
      <tr>
        <td>Choose the best answer to the question and circle it.</td>
      </tr>
      <tr>
        <td>1. Which digit completes this algorithm?</td>
      </tr>
      <tr>
        <td>
          <ul style="list-style: none; text-align: center;">
            <li style="text-align: right; padding: 5px;">8</li>
            <li style="text-align: right; padding: 5px;"><i class="fas fa-plus"></i>&nbsp;  n</li>
            <hr/>
            <li style="text-align: right; padding: 5px;">10</li>
          </ul>
        </td>
      </tr>
      <tr>
        <td><h5>n = &nbsp;<span>&nbsp;10&nbsp;</span><span>&nbsp;4&nbsp;</span><span>&nbsp;2&nbsp;</span></h5>

        </td>
      </tr>
    </table>
  @endforeach
</div>






@endsection
