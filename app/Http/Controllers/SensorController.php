<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crias;

class SensorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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

        $valid = $request->validate([
            'id' => 'exists:crias',
            'cardiaca' => 'numeric',
            'respiratoria' => 'numeric',
            'sanguinea' => 'numeric',
            'temperatura' => 'numeric'
        ]);

        $cria = Crias::where('id', $request->id)->first();
        $cria->sensores()->create([
            'cardiaca' => $valid['cardiaca'],
            'respiratoria' => $valid['respiratoria'],
            'sanguinea' => $valid['sanguinea'],
            'temperatura' => $valid['temperatura']
        ]);

        return response()->json([
            'result' => 'exitó al registrar'
        ]);
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
}
