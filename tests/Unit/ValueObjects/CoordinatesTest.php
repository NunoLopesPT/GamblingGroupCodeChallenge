<?php

namespace GamblingGroup\Tests\ValueObjects;

use GamblingGroup\Entities\Affiliate;
use GamblingGroup\ValueObjects\AffiliateCollection;
use GamblingGroup\ValueObjects\Coordinates;
use PHPUnit\Framework\TestCase;

class CoordinatesTest extends TestCase
{
    public function testCanRetrieveProperties(): void
    {
        $latitude = 0.9;
        $longitude = 0.8;
        $coordinates = new Coordinates($latitude, $longitude);

        $this->assertEquals($latitude, $coordinates->latitude());
        $this->assertEquals($longitude, $coordinates->longitude());
    }

    public function testCalculateDistancesAtSamePoint(): void
    {
        $coordinates = new Coordinates(1, 1);

        $this->assertEquals(0, $coordinates->distance($coordinates));
    }

    public function testCalculateDistancesFromPortoToDublin(): void
    {
        $portoCoordinates = new Coordinates(41.14961, -8.61099);
        $dublinOfficeCoordinates = new Coordinates(53.3340285, -6.2535495);

        $this->assertEquals(1366, round($portoCoordinates->distance($dublinOfficeCoordinates)));
    }
}