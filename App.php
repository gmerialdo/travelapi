<?php

namespace App;

require_once 'vendor/autoload.php';

$setOfCards = [
    'a1.json',
    'a2.json',
    'a3.json',
    'a4.json'
];

echo TravelApi::summarizeTrip($setOfCards);
