<?php

namespace App\Services\Api\TheMovieDatabase\Endpoints\Movie;

use App\Services\Api\TheMovieDatabase\Endpoints\BaseEndpoint;
use App\Services\Api\TheMovieDatabase\Entities\Movie\Popular;

class Populars extends BaseEndpoint
{
    public function get()
    {
        return $this->transform(
            $this->service
                ->api
                ->retry(10, 1000, throw: false)
                ->get('/movie/popular?include_adult=false&language=pt-BR&sort_by=popularity.desc')
                ->json('results'),
            Popular::class
        );
    }
}
