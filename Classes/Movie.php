<?php

namespace Classes;

use DateTime;

class Movie
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $title;

    /**
     * @var bool
     */
    public $adult;

    /**
     * @var string
     */
    public $backdropPath;

    /**
     * @var object|null
     */
    public $belongsToCollection;

    /**
     * @var int
     */
    public $budget;

    /**
     * @var array
     */
    public $genres;

    /**
     * @var string
     */
    public $homepage;

    /**
     * @var string
     */
    public $imdbId;

    /**
     * @var string
     */
    public $originalLanguage;

    /**
     * @var string
     */
    public $originalTitle;

    /**
     * @var string
     */
    public $overview;

    /**
     * @var float
     */
    public $popularity;

    /**
     * @var string|null
     */
    public $posterPath;

    /**
     * @var string|null
     */
    public $poster;

    /**
     * @var array
     */
    public $productionCompanies;

    /**
     * @var array
     */
    public $productionCountries;

    /**
     * @var DateTime
     */
    public $releaseDate;

    /**
     * @var int
     */
    public $revenue;

    /**
     * @var int
     */
    public $runtime;

    /**
     * @var array
     */
    public $spokenLanguages;

    /**
     * @var string
     */
    public $status;

    /**
     * @var string
     */
    public $tagline;

    /**
     * @var bool
     */
    public $video;

    /**
     * @var float
     */
    public $voteAverage;

    /**
     * @var int
     */
    public $voteCount;

    /**
     * @var Crew
     */
    public Crew $crew;

    /**
     * @var Cast
     */
    public Cast $cast;

    /**
     * @param int $id
     * @param string $title
     */
    public function __construct($id, $title)
    {
        $this->id = $id;
        $this->title = $title;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return bool
     */
    public function isAdult(): bool
    {
        return $this->adult;
    }

    /**
     * @param bool $adult
     */
    public function setAdult(bool $adult): void
    {
        $this->adult = $adult;
    }

    /**
     * @return string
     */
    public function getBackdropPath(): string
    {
        return $this->backdropPath;
    }

    /**
     * @param string $backdropPath
     */
    public function setBackdropPath(string $backdropPath): void
    {
        $this->backdropPath = $backdropPath;
    }

    /**
     * @return object|null
     */
    public function getBelongsToCollection(): ?object
    {
        return $this->belongsToCollection;
    }

    /**
     * @param object|null $belongsToCollection
     */
    public function setBelongsToCollection(?object $belongsToCollection): void
    {
        $this->belongsToCollection = $belongsToCollection;
    }

    /**
     * @return int
     */
    public function getBudget(): int
    {
        return $this->budget;
    }

    /**
     * @param int $budget
     */
    public function setBudget(int $budget): void
    {
        $this->budget = $budget;
    }

    /**
     * @return array
     */
    public function getGenres(): array
    {
        return $this->genres;
    }

    /**
     * @param array $genres
     */
    public function setGenres(array $genres): void
    {
        $this->genres = $genres;
    }

    /**
     * @return string
     */
    public function getHomepage(): string
    {
        return $this->homepage;
    }

    /**
     * @param string $homepage
     */
    public function setHomepage(string $homepage): void
    {
        $this->homepage = $homepage;
    }

    /**
     * @return string
     */
    public function getImdbId(): string
    {
        return $this->imdbId;
    }

    /**
     * @param string $imdbId
     */
    public function setImdbId(string $imdbId): void
    {
        $this->imdbId = $imdbId;
    }

    /**
     * @return string
     */
    public function getOriginalLanguage(): string
    {
        return $this->originalLanguage;
    }

    /**
     * @param string $originalLanguage
     */
    public function setOriginalLanguage(string $originalLanguage): void
    {
        $this->originalLanguage = $originalLanguage;
    }

    /**
     * @return string
     */
    public function getOriginalTitle(): string
    {
        return $this->originalTitle;
    }

    /**
     * @param string $originalTitle
     */
    public function setOriginalTitle(string $originalTitle): void
    {
        $this->originalTitle = $originalTitle;
    }

    /**
     * @return string
     */
    public function getOverview(): string
    {
        return $this->overview;
    }

    /**
     * @param string $overview
     */
    public function setOverview(string $overview): void
    {
        $this->overview = $overview;
    }

    /**
     * @return float
     */
    public function getPopularity(): float
    {
        return $this->popularity;
    }

    /**
     * @param float $popularity
     */
    public function setPopularity(float $popularity): void
    {
        $this->popularity = $popularity;
    }

    /**
     * @return string|null
     */
    public function getPosterPath(): ?string
    {
        return $this->posterPath;
    }

    /**
     * @param string|null $posterPath
     */
    public function setPosterPath(?string $posterPath): void
    {
        $this->posterPath = $posterPath;
    }

    /**
     * @return string|null
     */
    public function getPoster(): ?string
    {
        return $this->poster;
    }

    /**
     * @param string|null $poster
     */
    public function setPoster(?string $poster): void
    {
        $this->poster = $poster;
    }

    /**
     * @return array
     */
    public function getProductionCompanies(): array
    {
        return $this->productionCompanies;
    }

    /**
     * @param array $productionCompanies
     */
    public function setProductionCompanies(array $productionCompanies): void
    {
        $this->productionCompanies = $productionCompanies;
    }

    /**
     * @return array
     */
    public function getProductionCountries(): array
    {
        return $this->productionCountries;
    }

    /**
     * @param array $productionCountries
     */
    public function setProductionCountries(array $productionCountries): void
    {
        $this->productionCountries = $productionCountries;
    }

    /**
     * @return DateTime
     */
    public function getReleaseDate(): DateTime
    {
        return $this->releaseDate;
    }

    /**
     * @param DateTime $releaseDate
     */
    public function setReleaseDate(DateTime $releaseDate): void
    {
        $this->releaseDate = $releaseDate;
    }

    /**
     * @return int
     */
    public function getRevenue(): int
    {
        return $this->revenue;
    }

    /**
     * @param int $revenue
     */
    public function setRevenue(int $revenue): void
    {
        $this->revenue = $revenue;
    }

    /**
     * @return int
     */
    public function getRuntime(): int
    {
        return $this->runtime;
    }

    /**
     * @param int $runtime
     */
    public function setRuntime(int $runtime): void
    {
        $this->runtime = $runtime;
    }

    /**
     * @return array
     */
    public function getSpokenLanguages(): array
    {
        return $this->spokenLanguages;
    }

    /**
     * @param array $spokenLanguages
     */
    public function setSpokenLanguages(array $spokenLanguages): void
    {
        $this->spokenLanguages = $spokenLanguages;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getTagline(): string
    {
        return $this->tagline;
    }

    /**
     * @param string $tagline
     */
    public function setTagline(string $tagline): void
    {
        $this->tagline = $tagline;
    }

    /**
     * @return bool
     */
    public function isVideo(): bool
    {
        return $this->video;
    }

    /**
     * @param bool $video
     */
    public function setVideo(bool $video): void
    {
        $this->video = $video;
    }

    /**
     * @return float
     */
    public function getVoteAverage(): float
    {
        return $this->voteAverage;
    }

    /**
     * @param float $voteAverage
     */
    public function setVoteAverage(float $voteAverage): void
    {
        $this->voteAverage = $voteAverage;
    }

    /**
     * @return int
     */
    public function getVoteCount(): int
    {
        return $this->voteCount;
    }

    /**
     * @param int $voteCount
     */
    public function setVoteCount(int $voteCount): void
    {
        $this->voteCount = $voteCount;
    }

    /**
     * @return Crew
     */
    public function getCrew(): Crew
    {
        return $this->crew;
    }

    /**
     * @param Crew $crew
     */
    public function setCrew(Crew $crew): void
    {
        $this->crew = $crew;
    }

    /**
     * @return Cast
     */
    public function getCast(): Cast
    {
        return $this->cast;
    }

    /**
     * @param Cast $cast
     */
    public function setCast(Cast $cast): void
    {
        $this->cast = $cast;
    }






}