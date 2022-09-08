<?php

namespace Classes;

class Crew
{
    /**
     * @var Person[]
     */
    protected $directors;

    /**
     * @var Person[]
     */
    protected $crew;

    public function __construct()
    {
    }

    /**
     * @return Person[]
     */
    public function getDirectors(): array
    {
        return $this->directors;
    }

    /**
     * @param Person[] $directors
     */
    public function setDirectors(array $directors): void
    {
        $this->directors = $directors;
    }

    /**
     * @return Person[]
     */
    public function getCrew(): array
    {
        return $this->crew;
    }

    /**
     * @param Person[] $crew
     */
    public function setCrew(array $crew): void
    {
        $this->crew = $crew;
    }






}