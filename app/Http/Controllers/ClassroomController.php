<?php

namespace App\Http\Controllers;

use App\Classroom;
use App\Lesson;
use App\Standard;
use App\User;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Classroom $classroom)
    {
        $classrooms = Classroom::all();
        return(route('classrooms.index', compact( 'classrooms' ) ) );
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
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function show(Classroom $classroom, Lesson $lesson, User $user, Request $request, Standard $standard)
    {
        
        $lessons = Lesson::where('subject', '=', $classroom->subject)
        ->where('gradeLevel', '=', $classroom->gradeLevel)->get();
       
        $standards = Standard::where('subject', '=', $classroom->subject)
        ->where('gradeLevel', '=', $classroom->gradeLevel)->get();

        $teacher = User::find(3);

        return view('classrooms.show', compact('classroom', 'lessons', 'teacher', 'standards' ) );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function edit(Classroom $classroom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Classroom $classroom)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classroom $classroom)
    {
        //
    }
}
