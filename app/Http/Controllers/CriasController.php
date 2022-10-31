<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crias;
use App\Http\Resources\CriaResource;

class CriasController extends Controller
{

    private function clasificacionSalud( &$crias ) {
        foreach ($crias as &$cria) {
            $sensor = $cria->sensor()->first();
            $cria->sensores = $sensor;

            if( !is_null( $sensor ) ){
                $porEnfermar = false;
                if( $sensor->temperatura > 39.5 ) $porEnfermar = true;
                else if( $sensor->cardiaca < 70 || $sensor->cardiaca > 80 ) $porEnfermar = true;
                else if( $sensor->respiratoria < 15 || $sensor->respiratoria > 20 ) $porEnfermar = true;
                else if( $sensor->sanguinea > 10 ) $porEnfermar = true;

                if( $porEnfermar ){
                    $cria->estatus = 'Por Enfermar';
                }
            }
        }
    }

    private function clasificacionCarne( &$crias ) {
        foreach ($crias as &$cria) {
            $cria->carne = 'Grasa Tipo 1';
            if( $cria->peso < 15 || $cria->peso > 25 ) $cria->carne = 'Grasa Tipo 2';
            else if( $cria->musculo < 3 || $cria->musculo > 5 ) $cria->carne = 'Grasa Tipo 2';
            else if( $cria->marmoleo > 2 ) $cria->carne = 'Grasa Tipo 2';
        }
    }

    /**
    * @OA\Get(
    *     path="/api/v1/crias",
    *     summary="Mostrar Crias",
    *     @OA\Response(
    *         response=200,
    *         description="Mostrar todas las crias."
    *     ),
    *     @OA\Response(
    *         response="default",
    *         description="Algo salio mal."
    *     )
    * )
    */
    public function index()
    {
        $crias = Crias::where('estatus', '<>', 'cuarentena')->get();

        $this->clasificacionSalud( $crias );
        $this->clasificacionCarne( $crias );

        return response()->json([
            'result' => CriaResource::collection($crias)
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
        $crias = $request->all();
        foreach ($crias as $cria) {
            Crias::create( $cria );
        }

        return response()->json([
            'result' => 'éxito al registrar'
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
