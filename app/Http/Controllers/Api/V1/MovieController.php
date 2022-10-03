<?php

namespace App\Http\Controllers\Api\V1;



use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;

//importar para mejorar formateo
use App\Http\Resources\V1\MovieResource;


class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return MovieResource::collection(Movie::latest()->paginate());
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
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        //retornar recurso
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
        //
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
            ], 204);

        }catch(\Exception $exception){

            return response()->json([
                'message' => 'ocurrio un error al intentar borrar',
            ]);

        }

        
    }
}
