<?php

namespace Classes;

class Cast
{

    /**
     * @var Person[]
     */
    protected array $cast;

    public function __construct()
    {
    }

    /**
     * @return Person[]
     */
    public function getCast(): array
    {
        return $this->cast;
    }

    /**
     * @param Person[] $cast
     */
    public function setCast(array $cast): void
    {
        $this->cast = $cast;
    }



}