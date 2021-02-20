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
    public function index(User $user)
    {
      $myGrade = auth()->user()->gradeLevel;
    
      //Read PDF and extract text
      $data = Pdf::getText('kindergarten/mathunit1.pdf', '/usr/local/bin/pdftotext');
      $stand = preg_split('/([1-8]\.[A-Z]{1,3}\.[A-Z]{1}\.\d)/', $data, -1, PREG_SPLIT_OFFSET_CAPTURE | PREG_SPLIT_DELIM_CAPTURE );
      $kStand = preg_split('/([K]\.[A-Z]{1,3}\.[A-Z]{1}\.\d)/', $data, -1, PREG_SPLIT_OFFSET_CAPTURE | PREG_SPLIT_DELIM_CAPTURE );
      $kStandards = array_slice($kStand, 3);
      $standards = array_slice($stand, 3);
    
    
      foreach ($standards as $key => $standard ) {
        if($key % 2 === 0) {
            $Keys[] = $standard[0];
        } else {
            $Values[] = $standard[0];
        }
       }
    
      foreach ($kStandards as $key => $standard ) {
        if($key % 2 === 0) {
            $KKeys[] = $standard[0];
        } else {
            $KValues[] = $standard[0];
        }
       }
    
       foreach(array_combine($KKeys, $KValues) as $key=>$value){
         $KArray[$key] = $value;
       }
    
    
         //combine Keys and Values arrays into one associative array
      foreach(array_combine($Keys, $Values) as $key=>$value){
        $completeArray[$key] = $value;
      }
    
    
      if($myGrade == 0){
        $results = array_filter($KArray, function($key) use($myGrade){
          return $key == $myGrade;
        }, ARRAY_FILTER_USE_KEY);
      }
      else {
    
      $results = array_filter($completeArray, function($key) use($myGrade){
        return $key == $myGrade;
      }, ARRAY_FILTER_USE_KEY);
    }
    
    
    $results = Standard::find(1);

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
