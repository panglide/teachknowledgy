<?php

namespace App\Http\Controllers;

use App\Standard;
use App\Lesson;
use Illuminate\Http\Request;
use Spatie\PdfToText\Pdf;
use Illuminate\Support\Arr;
use App\User;
use App\Classroom;

class StandardController extends Controller
{
  
    // protected $classroom;

    // public function __construct($classroom) {
    //   $this->classroom = $classroom;
    // }
    
    public function create(Request $request, Standard $standard, User $user, Lesson $lesson)
    {
      
     
      $classroom = Classroom::findOrFail(request('classroom'));

      
      $gradeLevel = $classroom->gradeLevel;
      $subject = $classroom->subject;

      $standards = Standard::where( 'gradeLevel', '=', $gradeLevel )
      ->where( 'subject', '=', $subject )->get();

      if( count( $standards ) > 0 ) {
        return redirect('dashboard');
      }
      
      
    //Go get Subject and Grade Specific PDF from TN Gov
    $url = 'https://www.tn.gov/content/dam/tn/education/standards/math/Standards_Support_grade_'. $gradeLevel .'_Mathematics.pdf';
    
    $filename = basename($url); 

    if( ! '../public/'.$filename ) {

        $result = file_put_contents($filename, file_get_contents($url));

    } 
      
   
    $local_path = '/usr/local/bin/pdftotext';
    $remote_path = '/usr/bin/pdftotext';
    //Read PDF and extract text
    $data = Pdf::getText('../public/'.$filename, $local_path);
    
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
   
  // There is a bug in the PDF scraper on 2nd and 6th grades.  This is a hack to get to demo.  Logic is correct but REGEX match is being blown up for some reason. Returns offset in array.
  if( ($gradeLevel === 2) || ($gradeLevel === 6) ) {

    if( count($names) != count($objectives) ) {

      $n_ct = count($names);
      $o_ct = count($objectives);

      if(  $n_ct > $o_ct ) {
        
        $diff = $n_ct - $o_ct;
        $x = $n_ct - $diff;

        } else {

        $diff= $o_ct - $n_ct;
        $x = $o_ct - $diff;
      }
    }
   
    for($i = 0; $i < $x; $i++) {

      if( !empty($names && $objectives) ) {
        $standards[] = [ $names[$i], $objectives[$i] ];
      }
    }
  } else {

  for($i = 0; $i < count($names); $i++) {

      if( !empty($names && $objectives) ) {
      $standards[] = [ $names[$i], $objectives[$i] ];
      }
  }
}


  foreach( $standards as $standard ) {
      $standard = new Standard();

          $standard->name = $names[0];
          $standard->subject = $subject;
          $standard->gradeLevel = $gradeLevel;
          $standard->description = $objectives[1];
      
          $standard->save();
    }

    return redirect('dashboard');
  }

}