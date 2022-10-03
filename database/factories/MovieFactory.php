<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'publication_date' => $this->faker->dateTime(),
            'image' => $this->faker->randomElement([
                'https://cdn.pixabay.com/photo/2022/09/20/20/22/blueberries-7468718_960_720.jpg',
                'https://cdn.pixabay.com/photo/2013/04/11/02/20/film-102681_960_720.jpg',
                'https://cdn.pixabay.com/photo/2019/10/17/21/17/joker-4557864_960_720.jpg',
                'https://cdn.pixabay.com/photo/2018/07/06/19/48/charles-chaplin-3521070_960_720.jpg',
                'https://cdn.pixabay.com/photo/2014/10/31/17/41/dancing-dave-minion-510835_960_720.jpg',
                'https://cdn.pixabay.com/photo/2017/08/08/11/51/jerusalem-church-2611203_960_720.jpg',
                'https://cdn.pixabay.com/photo/2015/01/28/09/50/death-614644_960_720.jpg',

            ]),
            'active' => $this->faker->boolean(),


        ];
    }
}
