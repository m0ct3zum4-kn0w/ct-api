<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuarentena;
use App\Models\Crias;
use App\Http\Resources\CriaResource;

use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;

class CuarentenaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cuarentena = Crias::where('estatus' , 'cuarentena')->with('cuarentena', function($query){
            return $query->whereNull('salida');
        })->get();

        foreach ($cuarentena as &$cria) {
            $sensor = $cria->sensor()->first();
            $cria->sensores = $sensor;
        }

        return response()->json([
            'result' => CriaResource::collection($cuarentena)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cria = Crias::where('id', $request->id)->first();

        $cria->estatus = 'cuarentena';
        $cria->cuarentena()->create();
        $cria->save();

        return response()->json([
            'result' => 'La Cría se registró en cuarentena'
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
        $cria = Crias::where('id', $id)->first();

        $cuarentena = $cria->cuarentena()->whereNull('salida')->first();
        $cuarentena->salida = Carbon::now();
        $cuarentena->save();

        $cria->estatus = 'saludable';
        $cria->save();

        return response()->json([
            'result' => 'La cría se retiró de cuarentena'
        ]);
    }
}
