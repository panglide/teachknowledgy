<?php

namespace App\Http\Controllers;

use App\Standard;
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
      $teacher = User::find(1);
      $gradeLevel = 5;
      $subject = $teacher->subject;
      
      
    //Go get Subject and Grade Specific PDF from TN Gov
      $url = 'https://www.tn.gov/content/dam/tn/education/standards/math/Standards_Support_grade_'. $gradeLevel .'_Mathematics.pdf';

      $filename = basename($url);
      
      $result = file_put_contents($filename, file_get_contents($url));

      

    //Read PDF and extract text
      $data = Pdf::getText('../public/'.$filename, '/usr/local/bin/pdftotext');
    
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
      $arr[] = [ $names[$i], $objectives[$i] ];
    }
      
    
    $lesson = Lesson::find(1);
      
    foreach( $arr as $standards ) {
      $standard = $standards;
    }

        // send filtered array to view
        return view('standards.index', compact('results'));

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

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Standard  $standard
     * @return \Illuminate\Http\Response
     */
    public function show(Standard $standard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Standard  $standard
     * @return \Illuminate\Http\Response
     */
    public function edit(Standard $standard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Standard  $standard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Standard $standard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Standard  $standard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Standard $standard)
    {
        //
    }

    // public function downloadPDF(){
    //
    //     // 1. Assign URL to variable
    //     $url = 'https://www.tn.gov/content/dam/tn/education/standards/math/stds_math.pdf';
    //
    //
    //     // 2. Visit url and download PDF with cURL
    //
    //     $path = "public/output.pdf";
    //
    //     $ch = curl_init($url);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     curl_setopt($ch, CURLOPT_REFERER, $url);
    //
    //     $data = curl_exec($ch);
    //
    //     curl_close($ch);
    //
    //     // 3. Save PDF to temp folder on local server
    //     $result = file_put_contents($path, $data);
    //
    //     if(!$result){
    //             echo "error";
    //     }else{
    //             echo "success";
    //     }
    // }

}//endofStandardController
