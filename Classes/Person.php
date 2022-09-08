<?php

namespace Classes;

class Person
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var bool
     */
    private $adult;

    /**
     * @var string|null
     */
    private ?string $gender;

    /**
     * @var string
     */
    private $knownForDepartment;

    /**
     * @var string
     */
    private $originalName;

    /**
     * @var float
     */
    private $popularity;

    /**
     * @var string|null
     */
    private $profilePath;

    /**
     * @var string
     */
    private $creditId;

    /**
     * @var string
     */
    private $department;

    /**
     * @var string
     */
    private $job;

    /**
     * @param int $id
     * @param string $name
     */
    public function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
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
     * @return string|null
     */
    public function getGender(): ?string
    {
        return $this->gender;
    }

    /**
     * @param string|null $gender
     */
    public function setGender(?string $gender): void
    {
        $this->gender = $gender;
    }

    /**
     * @return string
     */
    public function getKnownForDepartment(): string
    {
        return $this->knownForDepartment;
    }

    /**
     * @param string $knownForDepartment
     */
    public function setKnownForDepartment(string $knownForDepartment): void
    {
        $this->knownForDepartment = $knownForDepartment;
    }

    /**
     * @return string
     */
    public function getOriginalName(): string
    {
        return $this->originalName;
    }

    /**
     * @param string $originalName
     */
    public function setOriginalName(string $originalName): void
    {
        $this->originalName = $originalName;
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
    public function getProfilePath(): ?string
    {
        return $this->profilePath;
    }

    /**
     * @param string|null $profilePath
     */
    public function setProfilePath(?string $profilePath): void
    {
        $this->profilePath = $profilePath;
    }



    /**
     * @return string
     */
    public function getCreditId(): string
    {
        return $this->creditId;
    }

    /**
     * @param string $creditId
     */
    public function setCreditId(string $creditId): void
    {
        $this->creditId = $creditId;
    }

    /**
     * @return string
     */
    public function getDepartment(): string
    {
        return $this->department;
    }

    /**
     * @param string $department
     */
    public function setDepartment(string $department): void
    {
        $this->department = $department;
    }

    /**
     * @return string
     */
    public function getJob(): string
    {
        return $this->job;
    }

    /**
     * @param string $job
     */
    public function setJob(string $job): void
    {
        $this->job = $job;
    }




}