<?php

namespace Classes;

use Exception;
use GuzzleHttp\Client;

class Tmdb
{
    const TMDB_API_ROOT_PATH = "https://api.themoviedb.org/3/";

    /**
     * @var String $string
     */
    private string $apiKey;

    /**
     * @var Client $client
     */
    private Client $client;


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
    public function searchFilms($query, $limit = 5): array|Movie
    {

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
        $i = 0;
        foreach ($this->get($encodedUrl)['results'] as $film) {
            if ($i >= $limit) break;

            $detailedFilm = $this->getFilm($film['id']);
            $movies[] = $detailedFilm;
            $i++;
        }

        return $movies;
    }

    /**
     * @param $id
     * @param null $language
     * @return Movie
     * @throws \Exception
     */
    public function getFilm($id, $language = null): Movie {
        $url = "https://api.themoviedb.org/3/movie/";
        $url .= $id;
        $url .= "?";
        $url .= "api_key=".$this->apiKey;

        if (isset($language)) {
            $url .= "&language=".$language;
        }

        $jsonFilm = $this->get($url);

        if (isset($jsonFilm['id']) && isset($jsonFilm['title'])) {
            $movie = new Movie($jsonFilm['id'],$jsonFilm['title']);

            if (isset($jsonFilm['adult'])) {
                $movie->setAdult($jsonFilm['adult']);
            }

            if (isset($jsonFilm['backdrop_path'])) {
                $movie->setBackdropPath($jsonFilm['backdrop_path']);
            }

            if (isset($jsonFilm['belongs_to_collection'])) {
                $movie->setBelongsToCollection($jsonFilm['belongs_to_collection']);
            }

            if (isset($jsonFilm['budget'])) {
                $movie->setBudget($jsonFilm['budget']);
            }

            if (isset($jsonFilm['genres'])) {
                $movie->setGenres($jsonFilm['genres']);
            }

            if (isset($jsonFilm['homepage'])) {
                $movie->setHomepage($jsonFilm['homepage']);
            }

            if (isset($jsonFilm['imdb_id'])) {
                $movie->setImdbId($jsonFilm['imdb_id']);
            }

            if (isset($jsonFilm['original_language'])) {
                $movie->setOriginalLanguage($jsonFilm['original_language']);
            }

            if (isset($jsonFilm['original_title'])) {
                $movie->setOriginalTitle($jsonFilm['original_title']);
            }

            if (isset($jsonFilm['overview'])) {
                $movie->setOverview($jsonFilm['overview']);
            }

            if (isset($jsonFilm['adult'])) {
                $movie->setAdult($jsonFilm['adult']);
            }

            if (isset($jsonFilm['popularity'])) {
                $movie->setPopularity($jsonFilm['popularity']);
            }

            if (isset($jsonFilm['poster_path'])) {
                $movie->setPosterPath($jsonFilm['poster_path']);
            }

            if (isset($jsonFilm['production_companies'])) {
                $movie->setProductionCompanies($jsonFilm['production_companies']);
            }

            if (isset($jsonFilm['release_date']) && !empty($jsonFilm['release_date'])) {
                $date = \DateTime::createFromFormat("Y-m-d", $jsonFilm['release_date']);
                if ($date) {
                    $movie->setReleaseDate($date);
                } else {
                    throw new \Exception("date not supported");
                }
            }

            if (isset($jsonFilm['revenue'])) {
                $movie->setRevenue($jsonFilm['revenue']);
            }

            if (isset($jsonFilm['runtime'])) {
                $movie->setRuntime($jsonFilm['runtime']);
            }

            if (isset($jsonFilm['spoken_languages'])) {
                $movie->setSpokenLanguages($jsonFilm['spoken_languages']);
            }

            if (isset($jsonFilm['status'])) {
                $movie->setStatus($jsonFilm['status']);
            }

            if (isset($jsonFilm['tagline'])) {
                $movie->setTagline($jsonFilm['tagline']);
            }

            if (isset($jsonFilm['video'])) {
                $movie->setVideo($jsonFilm['video']);
            }

            if (isset($jsonFilm['vote_average'])) {
                $movie->setVoteAverage($jsonFilm['vote_average']);
            }

            if (isset($jsonFilm['vote_count'])) {
                $movie->setVoteCount($jsonFilm['vote_count']);
            }

            // crew
            $movie->setCrew($this->getCrew($id));

            // cast
            $movie->setCast($this->getCast($id));

            // poster real path
            $movie->setPoster($this->getImagePath($movie->getPosterPath()));


        } else {
            throw new \Exception("TMDB error, no title or id");
        }

        return $movie;
    }

    /**
     * @param $id
     * @param string $language
     * @return Crew
     */
    public function getCrew($id, string $language = "us-EN"): Crew
    {
        $crew = new Crew();

        $directors = [];
        foreach (
            array_filter($this->getCreditsCrew($id, $language), function($value) {
                return $value["job"] == "Director";
            })
            as $director) {
            $directors[] = $this->buildPerson($director);
        }
        $crew->setDirectors($directors);

        $crews = [];
        foreach (
            array_filter($this->getCreditsCrew($id, $language), function($value) {
                return $value["job"] !== "Director";
            })
            as $director) {

            $crews[] = $this->buildPerson($director);
        }
        $crew->setCrew($crews);

        return $crew;
    }

    /**
     * @param int $id
     * @param string $language
     * @return Cast
     */
    public function getCast(int $id, string $language = "us-EN"): Cast
    {
        $return = new Cast();
        $cast = [];
        foreach ($this->getCreditsCast($id, $language) as $director) {
            $cast[] = $this->buildPerson($director);
        }

        $return->setCast($cast);

        return $return;
    }

    /**
     * @param $path
     * @param string $domain
     * @param string $size
     * @return string
     */
    private function getImagePath($path, string $domain = "https://image.tmdb.org/t/p/", string $size = "w500") : string {
        return $domain . $size . $path;
    }

    /**
     * @param array $person
     * @return Person
     */
    private function buildPerson(array $person): Person
    {
        $return = new Person($person["id"], $person["name"]);
        if (isset($person["adult"])) {
            $return->setAdult($person["adult"]);
        }
        if (isset($person["gender"])) {
            if ($person["gender"] === 1) {
                $return->setGender("Female");
            } else if ($person["gender"] === 2){
                $return->setGender("Male");
            } else if ($person["gender"] === 0) {
                $return->setGender("Non-binary");
            } else {
                $return->setGender(null);
            }

        }
        if (isset($person["original_name"])) {
            $return->setOriginalName($person["original_name"]);
        }
        if (isset($person["known_for_department"])) {
            $return->setKnownForDepartment($person["known_for_department"]);
        }
        if (isset($person["popularity"])) {
            $return->setPopularity($person["popularity"]);
        }
        if (isset($person["profile_path"])) {
            $return->setProfilePath($person["profile_path"]);
        }
        if (isset($person["credit_id"])) {
            $return->setCreditId($person["credit_id"]);
        }
        if (isset($person["department"])) {
            $return->setDepartment($person["department"]);
        }
        if (isset($person["job"])) {
            $return->setJob($person["job"]);
        }
        return $return;
    }

    private function get($url) {
        return json_decode($this->client->request('GET', $url)->getBody()->getContents(), true, 512, JSON_OBJECT_AS_ARRAY);
    }

    /**
     * @param int $filmId
     */
    public function getCredits(int $filmId, $language) {
        $url = self::TMDB_API_ROOT_PATH;
        $url .= "movie/";
        $url .= $filmId;
        $url .= "/credits?";
        $url .= "api_key=".$this->apiKey;
        if (isset($language)) {
            $url .= "&language=".$language;
        }

        return $this->get($url);
    }

    /**
     * @param $id
     * @param $language
     * @return array
     */
    public function getCreditsCrew($id, $language): array
    {
        return $this->getCredits($id, $language)["crew"];
    }

    /**
     * @param $id
     * @param $language
     * @return array
     */
    public function getCreditsCast($id, $language): array
    {
        return $this->getCredits($id, $language)["cast"];
    }


}