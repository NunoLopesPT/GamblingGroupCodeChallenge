<?php

namespace GamblingGroup\Tests\ValueObjects;

use GamblingGroup\Entities\Affiliate;
use GamblingGroup\ValueObjects\AffiliateCollection;
use GamblingGroup\ValueObjects\Coordinates;
use PHPUnit\Framework\TestCase;

class AffiliateCollectionTest extends TestCase
{
    public function testAffiliatesAreAddedAndSorted(): void
    {
        $collection = new AffiliateCollection();
        $affiliate1 = new Affiliate(1, 'Amy', $this->createMock(Coordinates::class));
        $affiliate2 = new Affiliate(2, 'Bruno', $this->createMock(Coordinates::class));
        $affiliate3 = new Affiliate(3, 'Carl', $this->createMock(Coordinates::class));
        $affiliate4 = new Affiliate(4, 'David', $this->createMock(Coordinates::class));

        $collection->addSortedById($affiliate2);
        $collection->addSortedById($affiliate3);
        $collection->addSortedById($affiliate1);
        $collection->addSortedById($affiliate4);

        $previous = null;
        foreach ($collection->affiliates() as $affiliate) {
            if ($previous !== null) {
                $this->assertTrue($previous->id() < $affiliate->id());
            }

            $previous = $affiliate;
        }
    }

    public function testInsertingDuplicatedAffiliatedFails(): void
    {
        $this->expectException(\Exception::class);

        $collection = new AffiliateCollection();
        $affiliate = new Affiliate(1, 'Amy', $this->createMock(Coordinates::class));

        $collection->addSortedById($affiliate);
        $collection->addSortedById($affiliate);

    }
}