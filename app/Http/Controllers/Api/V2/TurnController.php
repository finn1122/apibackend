<?php

namespace App\Http\Controllers\Api\V2;

use App\Http\Controllers\Controller;
use App\Models\Turn;
use Illuminate\Http\Request;

//importar coleccion turn V2
use App\Http\Resources\V2\TurnResource;
use App\Http\Resources\V2\TurnCollection;

//importar libreria para validar request
use Validator;


class TurnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //muchos recursos
        return new TurnCollection(Turn::latest()->paginate());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validar que las variables se envien por el request
        $validator = Validator::make($request->all(), [
            "turn" => "required",
            "active" => "required|boolean",
        ]);

        //verificar si hay errores en el request
        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors(),
            ]);
        }else{
            $turn = Turn::create($request->all());
            return new TurnResource($turn);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Turn  $turn
     * @return \Illuminate\Http\Response
     */
    public function show(Turn $turn)
    {
        return new TurnResource($turn);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Turn  $turn
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Turn $turn)
    {
        //validar que las variables se envien por el request
        $validator = Validator::make($request->all(), [
            "turn" => "date_format:H:i:s," . $turn->id,
            "active" => "boolean",
        ]);

        //verificar si hay errores en el request
        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors(),
            ]);
        }else{
            $turn->fill($request->only("turn","active"))->save();
            return new TurnResource($turn);
        }
        $turn->fill($request->only("turn","active"))->save();
        return new TurnResource($turn);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Turn  $turn
     * @return \Illuminate\Http\Response
     */
    public function destroy(Turn $turn)
    {
        try{
            $turn->delete();
            return response()->json([
                'message' => 'success',
            ], 204);

        }catch(\Exception $e){

            return response()->json([
                'message' => $e,
            ]);

        }
        
    }
}
