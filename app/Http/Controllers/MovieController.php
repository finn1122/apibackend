<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MovieController extends Controller
{
    public function index()
    {
        
        return view("movies.index", [
            'movies' => Movie::latest()->paginate()
        ]);
    
    }


    public function create(Request $request)
    {
        $movie = new Movie();
        $title = __("Crear nueva pelicula");
        $textButton = __("Crear");
        $route = route("movies.store");
        
        return view("movies.create", compact("title","textButton", "route", "movie"));
    
    }


    public function store(Request $request)
    {

        //formatear fecha

        $movies = new Movie;
 


        $fecha = $request->publication_date;
        $publication_date = Carbon::parse($request->fecha)->format("Y-m-d");

        $movies->name = $request->name;
        $movies->publication_date = $publication_date;
        $movies->image = $request->image;
        $movies->save();
        return redirect(route("movies.index"))
            ->with("success", __("¡Pelicula guardada!"));

        /*$this->validate($request, [

            "name" => "required|max:140|unique:movies",
            "image" => "required",
            "publication_date" => "required",

        ]);

        Movie::create($request->only("name","image", "publication_date"));
        return redirect(route("movies.index"))
            ->with("success", __("¡Pelicula guardada!"));*/

    }




    
}
