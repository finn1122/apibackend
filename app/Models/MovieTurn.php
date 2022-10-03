<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Movie;
use App\Turn;


class MovieTurn extends Model
{
    use HasFactory;

    protected $table = 'movie_turn';

    protected $fillable = ["movie_id", "turn_id"];

    public function movieTurn(){
        return $this->belongsTo('App\Movie',"movie_id","id");//puedes jugar invirtiendo el orden de los id's
    }
    public function turns(){
        return $this->belongsTo('App\Turn',"turn_id","id");//puedes jugar invirtiendo el orden de los id's
    }




}
