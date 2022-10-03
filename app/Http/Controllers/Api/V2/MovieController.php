<?php

namespace App\Http\Controllers\Api\V2;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;

//importar libreria para validar request
use Validator;


//importar resource V2
use App\Http\Resources\V2\MovieResource;
//importar coleccion V2
use App\Http\Resources\V2\MovieCollection;


class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new MovieCollection(Movie::latest()->paginate());
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
            "name" => "required|max:140|unique:movies",
            "image" => "required",
            "publication_date" => "required|date_format:Y-m-d",
        ]);

        //verificar si hay errores en el request
        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors(),
            ]);
        }else{
            $movie = Movie::create($request->all());
            return new MovieResource($movie);
        }
        


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        return new MovieResource($movie);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {

        //validar que las variables se envien por el request
        $validator = Validator::make($request->all(), [
            "name" => "max:140|unique:movies,name," . $movie->id,
            "publication_date" => "date_format:Y-m-d",
            "image" => "string",
            "active" => "boolean",

        ]);

        //verificar si hay errores en el request
        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors(),
            ]);
        }else{
            $movie->fill($request->only("name","publication_date","image", "active"))->save();
            return new MovieResource($movie);
        }

        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        try{
            $movie->delete();
            return response()->json([
                'message' => 'success',
            ]);

        }catch(\Exception $exception){

            return response()->json([
                'message' => 'ocurrio un error al intentar borrar',
            ]);

        }
    }
}
