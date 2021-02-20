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
    public function index(Standard $standard, User $user)
    {
      $teacher = User::find(1);
      $gradeLevel = $user->gradeLevel;
      $subject = $teacher->subject;
      
      //Go get Subject and Grade Specific PDF from TN Gov
      $url = 'https://www.tn.gov/content/dam/tn/education/standards/math/Standards_Support_grade_'. $gradeLevel .'_Mathematics.pdf';

      $filename = basename($url);
      
      $result = file_put_contents($filename, file_get_contents($url));

      

      //Read PDF and extract text
      $data = Pdf::getText('../public/'.$filename, '/usr/local/bin/pdftotext');
      $stand = preg_split('/\n|\n/', $data);
      


      $standard_names;
      
      foreach($stand as $key => $val) {
        if( preg_match('/([1-8]\.[A-Z]{1,3}\.[A-Z]{1}\.\d)/', $val ) ) {
          $standard_names[] = $val;
        }
      }


      
      $standard_domains;

      foreach( $standard_names as $k => $v) {
        if( strpos( $v, "Standard" ) ) {
          $standard_domains[] = substr( $v, 9, 9 );
        }
      }

      dd($standard_domains);

        // send filtered array to view
        return view('demo.index', compact('result', 'lesson'));

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
     * @param  \App\r  $r
     * @return \Illuminate\Http\Response
     */
    public function show(r $r)
    {
        //
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
