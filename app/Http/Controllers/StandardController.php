<?php

namespace App\Http\Controllers;

use App\Standard;
use App\Lesson;
use Illuminate\Http\Request;
use Spatie\PdfToText\Pdf;
use Illuminate\Support\Arr;
use App\User;

class StandardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Standard $standard, User $user, Lesson $lesson)
    {
      //this is a comment to force change for commit 
      $teacher = auth()->user();
      $gradeLevel = $teacher->gradeLevel;
      $subject = $teacher->subject;
      
      
    //Go get Subject and Grade Specific PDF from TN Gov
    $url = 'https://www.tn.gov/content/dam/tn/education/standards/math/Standards_Support_grade_'. $gradeLevel .'_Mathematics.pdf';
    
    $filename = basename($url); 

    if( ! '../public/'.$filename ) {

        $result = file_put_contents($filename, file_get_contents($url));

    } 
      
   

    //Read PDF and extract text
    $data = Pdf::getText('../public/'.$filename, '/vendor/spatie/pdftotext');
    
    // Parse out PDF  
    $standards_arrays = preg_split('/([1-8]\.[A-Z]{1,3}\.[A-Z]{1}\.\d)/', $data, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY );

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
    foreach( $standards_arrays as $data ) {
      if( preg_match( '/\bMajor Work of the Grade\b/', $data ) || preg_match( '/\bSupporting Content\b/', $data ))  {

        $string = preg_replace('/\n/', '', $data);
        $needle = ")";
        $start = strpos( $string, $needle);
        $end = strpos( $string, "Evidence" );  
        $length = $end - $start;
        
        $objectives[] = substr( $string, $start + 1, $length - 1); 
      }
    }
    
    //Create associative array of Standards
    for($i = 0; $i < count($names); $i++) {
      $standards[] = [ $names[$i], $objectives[$i] ];
    }
      

    foreach( $standards as $standard ) {
        
        $stand = new Standard();

            $stand->name = $standard[0];
            $stand->subject = $teacher->subject;
            $stand->gradeLevel = $teacher->gradeLevel;
            $stand->description = $standard[1];
        
            $stand->save();
    }
    return view('standards.index');
  }
  
}