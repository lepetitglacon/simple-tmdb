<?php

namespace Classes;

use GuzzleHttp\Client;

class Tmdb
{
    /**
     * @var String $string
     */
    private $apiKey;

    /**
     * @var Client $client
     */
    private $client;


    /**
     * @param $apiKey
     */
    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
        $this->client = new Client();
    }

    /**
     * @param $query
     * @return array|Movie
     */
    public function searchFilms($query) {

        $url = "https://api.themoviedb.org/3/search/movie?";

        if (isset($query)) {
            $url .= "query=".$query;
        } else {
            throw new Exception("Query empty");
        }

        if (isset($language)) {
            $url .= "&language=".$language;
        }
        if (isset($page)) {
            $url .= "&page=".$page;
        }
        if (isset($include_adult)) {
            $url .= "&include_adult=".$include_adult;
        }
        if (isset($region)) {
            $url .= "&region=".$region;
        }
        if (isset($year)) {
            $url .= "&year=".$year;
        }
        if (isset($primary_release_year)) {
            $url .= "&primary_release_year=".$primary_release_year;
        }

        $url .= "&api_key=".$this->apiKey;

        $encodedUrl = $url;

        $movies = [];
        foreach ($this->get($encodedUrl)['results'] as $film) {
            $movie = new Movie($film['id'],$film['title']);

            $movies[] = $movie;
        }

        return $movies;
    }

    public function getFilm($id) {
        $url = "https://api.themoviedb.org/3/movie/";
        $url .= $id;
        $url .= "?";
        $url .= "api_key=".$this->apiKey;

        if (isset($language)) {
            $url .= "&language=".$language;
        }

        $film = $this->get($url);

    }

    private function get($url) {
        return json_decode($this->client->request('GET', $url)->getBody()->getContents(), true, 512, JSON_OBJECT_AS_ARRAY);
    }


}