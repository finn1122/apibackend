<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\MovieTurn;
use App\Turn;



class Movie extends Model
{
    use HasFactory;
    protected $fillable = ["name", "publication_date", "image", "active"];
    //turn
    /*public function turns(){
        return $this->belongsToMany('App\Turn',"movies_turns","turn_id","id");
    }

    //movies
    public function movies(){
        return $this->belongsToMany('App\Movie',"movies_turns","movie_id","id");
    }

    public function moviesTurns()
    {
        return $this->belongsTo('movies_turns', 'movie_id', 'id');    
    }*/

    public function turns(){
        return $this->belongsToMany('App\Models\Turn', 'movie_turn', 'movie_id', 'turn_id')->withPivot('id', 'movie_id', 'turn_id');
    }

        
        
}
