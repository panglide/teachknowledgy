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
      $teacher = User::find(1);
      $gradeLevel = 4;
      $subject = $teacher->subject;
      
      //Go get Subject and Grade Specific PDF from TN Gov
      $url = 'https://www.tn.gov/content/dam/tn/education/standards/math/Standards_Support_grade_'. $gradeLevel .'_Mathematics.pdf';

      $filename = basename($url);
      
      $result = file_put_contents($filename, file_get_contents($url));

      

    //Read PDF and extract text
      $data = Pdf::getText('../public/'.$filename, '/usr/local/bin/pdftotext');
    
      $standards_arrays = preg_split('/([1-8]\.[A-Z]{1,3}\.[A-Z]{1}\.\d)/', $data, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY );
    
      // dd($standards_arrays);

      $str = $standards_arrays[0];
      $needle = substr($str, 0, 1 );
      $start = strpos( $str, $needle );
      $end = strpos( $str, "\n" );  
      $length = $end - $start;
      $class = substr( $str, $start, $length); 

      $test = preg_replace('/\n/', '', $standards_arrays);

    // Get the Standard names
      foreach( $test as $key => $val ) {      
        if( preg_match('/([1-8]\.[A-Z]{1,3}\.[A-Z]{1}\.\d)/', $val ) ) {
          if( substr( $val, 0, 1 ) == $gradeLevel ) {
            $names[] = $val;
          }
        }
      }
     
      
      $names = array_unique($names, SORT_STRING);
      $names = array_values($names);
  
   
    // Get the Standard objectives 
      
      
      // foreach( $test as $k => $v) {
        
      //   if( preg_match( '/Major Work of the Grade || Supporting Content/', $v)  ) {
      //     $needles[] = $v;
      //   } 
      //   foreach( $needles as $needle ) {
      //   
      //   }
      // }

      foreach( $test as $data ) {
        if( preg_match( '/\bMajor Work of the Grade\b/', $data ) || preg_match( '/\bSupporting Content\b/', $data ))  {
          $objectives[] = $data;
        }
      }

    
      // dd($names);
      // dd($objectives);
    // Create associative array of Standards
    
    for($i = 0; $i < count($names); $i++) {
      $arr[$names[$i]] = [ $names[$i], $objectives[$i] ];
      // $standards_table[] = array_combine( $arr, $objectives );
      // echo '<pre>';
      // print_r($arr);
      // echo '</pre>';
      // $standards_table[$names[$i]] = $objectives[$i];
    }

    
    // $standards_table = array_merge( [], $names, $objectives );
    

    // for( $i = 0; $i < count( $names ); $i++ ) {
    //   $arr[] = $names[$i] [ $objectives[$i] ];
    //   $standards_table[] = array_combine( $arr, $objectives );
    // }
      // for( $i = 0; $i < count( $names ); $i++ ) {
      //   $arr[] = [ $names[$i], [$objectives] ];
      //   $standards_table[] = array_combine( $arr, $objectives);
      // }
    
  
    

      $lesson = Lesson::find(1);
      
      foreach( $arr as $standards ) {
        $standard = $standards;

      }

      

      return view('lessons.show', compact('standard', 'class', 'teacher', 'lesson'));

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
