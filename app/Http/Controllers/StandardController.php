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
