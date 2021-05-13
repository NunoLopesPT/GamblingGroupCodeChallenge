<?php

namespace GamblingGroup\ValueObjects;

class Coordinates
{
    private float $latitude;
    private float $longitude;

    public function __construct(
        float $latitude,
        float $longitude
    )
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    public function latitude(): float
    {
        return $this->latitude;
    }

    public function longitude(): float
    {
        return $this->longitude;
    }

    /**
     * Return the distance between a given coordinate in KM.
     *
     * @param Coordinates $coordinates
     *
     * @return float
     */
    public function distance(Coordinates $coordinates): float
    {
        $latitude1 = deg2rad($this->latitude);
        $latitude2 = deg2rad($coordinates->latitude());
        $longitude1 = deg2rad($this->longitude);
        $longitude2 = deg2rad($coordinates->longitude());

        return rad2deg(
            acos(
                sin($latitude1) * sin($latitude2) +
                cos($latitude1) * cos($latitude2) * cos(abs($longitude1 - $longitude2))
            )
        ) * 60 * 1.1515 * 1.609344;
    }
}
