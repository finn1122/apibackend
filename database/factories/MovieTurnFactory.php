<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Movie;
use App\Models\Turn;



class MovieTurnFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    //protected $model = MoviesTurn::class;

    public function definition()
    {
        return [
            'movie_id' => Movie::all()->unique()->random()->id,
            'turn_id' => Turn::all()->unique()->random()->id,

        ];
    }
}
