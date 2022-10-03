<?php

namespace App\Http\Controllers\Api\V2;

use App\Http\Controllers\Controller;
use App\Models\MovieTurn;
use Illuminate\Http\Request;

use App\Http\Resources\V2\MovieTurnCollection;
use App\Http\Resources\V2\MovieTurnResource;

//importar libreria para validar request
use Validator;



class MovieTurnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new MovieTurnCollection(MovieTurn::latest()->paginate());
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
            "movie_id" => "required|integer",
            "turn_id" => "required|integer",
        ]);

        //verificar si hay errores en el request
        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors(),
            ]);
        }else{
            $movieTurn = MovieTurn::create($request->all());
            return new MovieTurnResource($movieTurn);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MovieTurn  $movieTurn
     * @return \Illuminate\Http\Response
     */
    public function show(MovieTurn $movieTurn)
    {
        return new MovieTurnResource($movieTurn);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MovieTurn  $movieTurn
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MovieTurn $movieTurn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MovieTurn  $movieTurn
     * @return \Illuminate\Http\Response
     */
    public function destroy(MovieTurn $movieTurn)
    {
        //
    }
}
