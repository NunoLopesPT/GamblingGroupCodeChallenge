<?php

namespace GamblingGroup\Tests;

use GamblingGroup\Entities\Affiliate;
use GamblingGroup\ValueObjects\Coordinates;
use PHPUnit\Framework\TestCase;

class AffiliateTest extends TestCase
{
    public function testCanRetrieveProperties(): void
    {
        $id = 1;
        $name = 'John';
        $coordinates = $this->createMock(Coordinates::class);
        $affiliate = new Affiliate($id, $name, $coordinates);

        $this->assertEquals($id, $affiliate->id());
        $this->assertEquals($name, $affiliate->name());
        $this->assertEquals($coordinates, $affiliate->homeCoordinates());
    }
}