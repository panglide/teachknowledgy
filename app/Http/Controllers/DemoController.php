<?php

namespace App\Http\Controllers;

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
    public function index(Standard $standard)
    {
      $myGrade = 1;

      //Read PDF and extract text
      $data = (new Pdf())->setPdf('output.pdf')->text();
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

    $lesson = Lesson::find(1);

        // send filtered array to view
        return view('demo.index', compact('results', 'lesson'));

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
