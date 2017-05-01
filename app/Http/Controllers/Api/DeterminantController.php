<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeterminantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $albums = \App\Album::all();
      return [
          'success' => true,
          'data' => $albums
      ];
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function calDet(Request $request) 
    {
        $request_param = $request->all();
        $arr = [explode(" ", $request_param["r0"]), 
                explode(" ", $request_param["r1"]), 
                explode(" ", $request_param["r2"]),
                explode(" ", $request_param["r3"])
                ];
        $m0_top = ($arr[1][1] * $arr[2][2] * $arr[3][3]) + ($arr[1][2] * $arr[2][3] * $arr[3][1]) + ($arr[1][3] * $arr[2][1] * $arr[3][2]);
        $m0_down = ($arr[3][1] * $arr[2][2] * $arr[1][3]) + ($arr[3][2] * $arr[2][3] * $arr[1][1]) + ($arr[3][3] * $arr[2][1] * $arr[1][2]);
        $m0 = $m0_top - $m0_down;
        $m1_top = ($arr[0][1] * $arr[2][2] * $arr[3][3]) + ($arr[0][2] * $arr[2][3] * $arr[3][1]) + ($arr[0][3] * $arr[2][1] * $arr[3][2]);
        $m1_down = ($arr[3][1] * $arr[2][2] * $arr[0][3]) + ($arr[3][2] * $arr[2][3] * $arr[0][1]) + ($arr[3][3] * $arr[2][1] * $arr[0][2]);
        $m1 = $m1_top - $m1_down;
        $m2_top = ($arr[0][1] * $arr[1][2] * $arr[3][3]) + ($arr[0][2] * $arr[1][3] * $arr[3][1]) + ($arr[0][3] * $arr[1][1] * $arr[3][2]);
        $m2_down = ($arr[3][1] * $arr[1][2] * $arr[0][3]) + ($arr[3][2] * $arr[1][3] * $arr[0][1]) + ($arr[3][3] * $arr[1][1] * $arr[0][2]);
        $m2 = $m2_top - $m2_down;
        $m3_top = ($arr[0][1] * $arr[1][2] * $arr[2][3]) + ($arr[0][2] * $arr[1][3] * $arr[2][1]) + ($arr[0][3] * $arr[1][1] * $arr[2][2]);
        $m3_down = ($arr[2][1] * $arr[1][2] * $arr[0][3]) + ($arr[2][2] * $arr[1][3] * $arr[0][1]) + ($arr[2][3] * $arr[1][1] * $arr[0][2]);
        $m3 = $m3_top - $m3_down;
        $det_A = ($arr[0][0] * $m0) + ($arr[1][0] * $m1 * -1) + ($arr[2][0] * $m2) + ($arr[3][0] * $m3 * -1);
        return [
          'success' => true,
          'data' => $det_A
        ];
    }
}
