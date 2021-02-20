@extends('layouts.app')
@section('content')

<h1>Demo Lesson Page</h1>

<table class="table">
      <tr>
        <td>Teacher Name:</td>
        <td>{{ $teacher->name }}</td>
      </tr>
      <tr>
        <td>Class:</td>
        <td>{{ $teacher->gradeLevel }} {{ $teacher->subject }}</td>
      </tr>
      <tr>
        <td>Course Unit:</td>
        <td>Solving Addition and Subtraction Situations to 10</td>
      </tr>
      <tr>
        <td>Lesson Title</td>
        <td>{{ $lesson->name }}</td>
      </tr>
      <tr>
        <td>Lesson Overview</td>
        <td>
          <p>Students will be given math mats.  They will have varying containers marked with single digits
            that hold the corresponding number of ones cubes.  They will match the various containers
            to teacher provided algorithms, pour the ones cubes onto the math mat and line them up
            to produce the sum of 10 and check their work by
            comparing that to a provided 10s rod.  Students will then be asked to write their own
            algorithms and test them with the ones cubes and tens rods.
            </p>
          </td>
      </tr>
      <tr>
        <td>Standards:</td>
        <td></td>
      </tr>
      <tr>
        <td>Lesson Objective</td>
        <td>
          <p>Move students from concrete mathematical operations of addition and subtraction within 10
            to more abstract written mathematical operations.
          </p>
        </td>
      </tr>
      <tr>
        <td>Assessment/Evaluation</td>
        <td><a href="{{url('assessments/1')}}">Assessment 1</a>, <a href="#">Assessment 2</a>, <a href="#">Assessment 3</a></td>
      </tr>
      <tr>
        <td>Materials</td>
        <td>treasure chest, riddle, logic puzzle, condiment cups, ones cubes, tens Rods, math mats, dry erase markers</td>
      </tr>
      <tr>
        <td>Lesson Hook</td>
        <td>
          <p>Students will be given a riddle to unlock a "treasure chest."  The answer to the riddle is
          locked in a logic puzzle that requires the correct combination of digits to add up to 10. The treasure
          chest will be opened at the end of the lesson to reveal a special surprise.
          </p>
        </td>
      </tr>
      <tr>
        <td>Instructions</td>
        <td>
          <p>Step one: read the to students</p>
          <p>Step two: Introduce logic puzzle</p>
          <p>Step three: Model the exercise using ones cubes, tens rods, math mats, and algorithms.</p>
          <p>Step four: Allow students to try.</p>
          <p>Step five: Regroup and model again.</p>
          <p>Step six: Monitor students as they try again.</p>
          <p>Step seven: Regroup and model writing algorithms.</p>
          <p>Step eight: Allow students to try.</p>
          <p>Step nine: Regroup and model again.</p>
          <p>Step ten: Monitor as students try again</p>
          <p>Step eleven: Ask students to demonstrate for you on paper using ones cubes and tens rods boxes.</p>
          <p>Step twelve: Ask students to write all possible algorithms on paper.</p>
          <p>Step thirteen: Ask students to complete small assessment solving algorithms.</p>
          <p>Step fourteen: Review riddle and challenge students to use what they just learned to solve logic puzzle.</p>
        </td>
      </tr>
      <tr>
        <td>Resources</td>
        <td><a href="{{url('/resources')}}">Resources</a></td>
      </tr>
      <tr>
        <td>Guided Practice</td>
        <td><a href="{{ url('guided_exercise')}}">Exercise 1</a></td>
      </tr>
      <tr>
        <td>Independent Practice</td>
        <td><a href="{{ url('independent_exercise')}}">Exercise 1</a></td>
      </tr>
      <tr>
        <td>Closure</td>
        <td>
          <p>What did we learn today?  We learned that we can add two digits together to equal ten.
          We learned to check our work against a known solution, the tens rod, to make sure our Addition
          was correct.  We also learned how to write our own addition algorithms on paper.  Where do you think
          you will use this new knowledge you have gained today? How did you use your knowledge of Addition
          to unlock the treasure chest?  Look for ways you can use this at home tonight and be ready to share
          tomorrow.</p>
        </td>
      </tr>
      <tr>
        <td>Cross Curricular Connections</td><td>Grouping, adding, algorithms, checking work</td>
      </tr>
      <tr>
        <td>Remediation Lesson</td><td><a href="{{url('/remediation_lesson')}}">Counting by ones</a></td>
      </tr>
      <tr>
        <td>Extension Lesson</td><td><a href="{{url('/extension_lesson')}}">Addition to 20</a>, <a href="#">Logic puzzles</a></td>
      </tr>
      <tr>
        <td>Small Groups</td>
        <td>
          <h6>Remediation Group</h6>
          <ul>
            <li>Keshawn</li>
            <li>Suzy</li>
            <li>Larry</li>
          </ul>
          <h6>Extension Group</h6>
          <ul>
            <li>Charlotte</li>
            <li>Jose</li>
            <li>D'mond</li>
          </ul>
         </td>
      </tr>
      <tr>
        <td>Math Center Activities</td>
        <td><a href="{{url('/centers')}}">Station 1</a>, <a href="#">Station 2</a>, <a href="#">Station 3</a>, <a href="#">Station 4</a>, <a href="#">Station 5</a></td>
      </tr>



</table>
@endsection
