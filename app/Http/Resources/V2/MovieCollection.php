<?php

namespace App\Http\Resources\V2;

use Illuminate\Http\Resources\Json\ResourceCollection;

class MovieCollection extends ResourceCollection
{
    public $collects = MovieResource::class;

    public function toArray($request)
    {
        //return parent::toArray($request);
        return[
            'data' => $this->collection,
            'meta' => [
                'organization' => 'nasa',
                'authors' => [
                    'ivan',
                    'mauro'
                ]
            ],
            'type' => 'articles'
        ];
    }
}
