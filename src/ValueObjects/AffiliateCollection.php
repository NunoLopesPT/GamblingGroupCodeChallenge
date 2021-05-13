<?php

namespace GamblingGroup\ValueObjects;

use GamblingGroup\Entities\Affiliate;

class AffiliateCollection
{
    /** @var Affiliate[] $collection */
    private array $collection = [];

    /**
     * @return Affiliate[]
     */
    public function affiliates(): array
    {
        return $this->collection;
    }

    public function addSortedById(Affiliate $newAffiliate): void
    {
        if (empty($this->collection)) {
            $this->collection[] = $newAffiliate;
        } else {
            foreach ($this->collection as $index => $affiliate) {
                if ($affiliate->id() > $newAffiliate->id()) {
                    array_splice( $this->collection, $index, 0, [$newAffiliate]);
                    break;
                } elseif ($affiliate->id() === $newAffiliate->id()) {
                    throw new \Exception('An affiliate with this id(' . $affiliate->id() . ') was already added');
                } elseif($index + 1 === count($this->collection)) {
                    $this->collection[] = $newAffiliate;
                }
            }
        }
    }
}
