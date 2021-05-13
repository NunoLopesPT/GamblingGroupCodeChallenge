<?php

use GamblingGroup\Entities\Affiliate;
use GamblingGroup\ValueObjects\AffiliateCollection;
use GamblingGroup\ValueObjects\Coordinates;

require_once __DIR__.'/vendor/autoload.php';

// Load file
$file = fopen("resources/affiliates.txt", "r");

// Save each line as an entity sorted by ID.
$affiliates = new AffiliateCollection();
while(! feof($file))
{
    $data = json_decode(fgets($file), true);
    $homeCoordinates = new Coordinates($data['latitude'], $data['longitude']);
    $affiliates->addSortedById(new Affiliate($data['affiliate_id'], $data['name'], $homeCoordinates));
}

// Close file since we don't need to check it anymore.
fclose($file);

// The GPS coordinates for Dublin office
$officeCoordinates = new Coordinates(53.3340285, -6.2535495);

// Loop through each affiliate.
foreach ($affiliates->affiliates() as $affiliate) {
    // Affiliates in less than 100 KM's from the office print the name.
    if ($officeCoordinates->distance($affiliate->homeCoordinates()) < 100) {
        echo $affiliate->id() . ' ' . $affiliate->name() . "\n";
    }
}
