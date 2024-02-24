<?php
namespace App\Services\Api\TheMovieDatabase\Endpoints\Movie;

use App\Services\Api\TheMovieDatabase\Entities\Movie\Credit;
use App\Services\Api\TheMovieDatabase\Endpoints\BaseEndpoint;

class Credits extends BaseEndpoint
{
    private int $movieId;

    public function fromMovie(int|Credit $movie)
    {
        $this->movieId = $movie instanceof Credit ? $movie->id : $movie;
        return $this;
    }
    public function get(): mixed
    {
        $json[] = $this->service
            ->api
            ->get('/movie/' . $this->movieId . '/credits?language=pt-BR')
            ->json();

        return $this->transform($json, Credit::class)[0];
    }
}