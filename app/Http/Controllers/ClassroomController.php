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
    public function index(Classroom $classroom, User $user)
    {
        $classrooms = Classroom::where('user_id', '=', auth()->id() )->get();
        
            return view('classrooms', compact( 'classrooms' ) );
    }

    /**AHAH
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('classrooms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
    $request->validate([
        'title' => 'required',
        'subject' => 'required'
    ]);

   
    $classroom = new Classroom();

    $classroom->title = request('title');

        foreach( $request['subject'] as $subject) {
        $classroom->subject = $subject;
        }
        $classroom->user_id = auth()->id();

        foreach( $request['gradeLevel'] as $gradeLevel) {
            $classroom->gradeLevel = $gradeLevel;
            }
        
      
        $classroom->save();

        return redirect('/dashboard');
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

        $teacher = auth()->user();

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
