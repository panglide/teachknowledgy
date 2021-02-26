<?php

namespace App\Http\Controllers;
use App\User;
use App\Demo;
use App\Standard;
use Spatie\PdfToText\Pdf;
use App\Lesson;
use Illuminate\Http\Request;

class DemoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Standard $standard, User $user, Lesson $lesson)
    {
      
<<<<<<< HEAD

    return view('lessons.show', compact('standard', 'class', 'teacher', 'lesson'));
=======
>>>>>>> staging

  }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\r  $r
     * @return \Illuminate\Http\Response
     */
    public function show(Standard $standard, Request $request, User $user)
    {
      
      $classroom->subject = request($subject);
      $classroom->gradeLevel = request($gradeLevel);
      
      $lessons = Lesson::where('subject', '=', $classroom->subject)
      ->where('gradeLevel', '=', $classroom->gradeLevel)->get();
     
      $standards = Standard::where('subject', '=', $classroom->subject)
      ->where('gradeLevel', '=', $classroom->gradeLevel)->get();

      $teacher = $user->id;
      

      return view('classrooms.show', compact('classroom', 'lessons', 'teacher', 'standards' ) );;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\r  $r
     * @return \Illuminate\Http\Response
     */
    public function edit(r $r)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\r  $r
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, r $r)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\r  $r
     * @return \Illuminate\Http\Response
     */
    public function destroy(r $r)
    {
        //
    }
}
