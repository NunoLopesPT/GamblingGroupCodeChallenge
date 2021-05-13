<?php

namespace GamblingGroup\Entities;

use GamblingGroup\ValueObjects\Coordinates;

class Affiliate
{
    private int $id;
    private string $name;
    private Coordinates $homeCoordinates;

    public function __construct(
        int $id,
        string $name,
        Coordinates $homeCoordinates
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->homeCoordinates = $homeCoordinates;
    }

    public function id(): int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function homeCoordinates(): Coordinates
    {
        return $this->homeCoordinates;
    }
}