<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Classroom;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Classroom $classroom, User $user)
    {
        $classrooms = Classroom::where('user_id', '=', auth()->id() )->get();
       
        // dd($classrooms);

        if( count( $classrooms ) < 1 ) {
            return view('classrooms.create', compact( 'user') );
        }

        return view('home', compact( 'classrooms') );
    }
}
