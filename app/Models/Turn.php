<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Movie;


class Turn extends Model
{
    use HasFactory;
    protected $fillable = ["turn", "active"];

    //movies
   /*public function movies(){
        return $this->belongsToMany('App\Movie',"movies_turns","movie_id","id");
    }
    //turn
    public function turns(){
        return $this->belongsToMany('App\Turn',"movies_turns","turn_id","id");
    }*/

    public function movies(){
        return $this->belongsToMany('App\Models\Movie', 'movie_turn', 'movie_id', 'turn_id')->withPivot('id','movie_id', 'turn_id');
    }

    

}
