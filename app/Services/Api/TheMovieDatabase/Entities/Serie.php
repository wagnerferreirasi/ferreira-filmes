<?php

namespace App\Services\Api\TheMovieDatabase\Entities;

class Serie
{
    public int $id;
    public string $title;
    public string $original_title;
    public string $release_date;
    public string $poster_path;
    public string $overview;
    public float $vote_average;

    public function __construct(mixed $data)
    {
        $this->id = data_get($data, 'id');
        $this->title = data_get($data, 'title');
        $this->original_title = data_get($data, 'original_title');
        $this->release_date = substr(data_get($data, 'release_date'), 0, 4);
        $this->poster_path = 'https://media.themoviedb.org/t/p/w300_and_h450_bestv2' . data_get($data, 'poster_path');
        $this->overview = data_get($data, 'overview');
        $this->vote_average = data_get($data, 'vote_average');
    }
}
