<?php

namespace App\Http\Controllers;

use App\Lesson;
use App\Standard;
use App\Classroom;
use Illuminate\Http\Request;
use App\User;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Lesson $lesson, Standard $standard)
    {
        $classroom = $request['classroom'];
        
        $classroom = Classroom::findOrFail($classroom);

        $gradeLevel = $classroom->gradeLevel;

        $subject = $classroom->subject;
        
        $teacher = $classroom->user;
       
        // $standards = $lesson->standard;

        $standards = Standard::where( 'gradeLevel', '=', $gradeLevel )
        ->where( 'subject', '=', $subject )->limit(3)->get();
       
    
        return view('lessons.show2', compact('lesson', 'teacher', 'standards', 'classroom'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lesson $lesson)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)
    {
        //
    }
}
