<?php

namespace App\Http\Resources\V2;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TurnCollection extends ResourceCollection
{
    public $collects = TurnResource::class;
    

    public function toArray($request)
    {
        //return parent::toArray($request);
        return[
            'data' => $this->collection,
            'meta' => [
                'organization' => 'Movies inc.',
                'authors' => [
                    'Ivan',
                    'Mauro'
                ]
            ],
                'type' => 'articles',
        ];
    }
}
