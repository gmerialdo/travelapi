<?php

namespace Tests;

use TravelApi\FlightCard;
use PHPUnit\Framework\TestCase;

class FlightCardTest extends TestCase
{

    public function testPrintTravel()
    {
        $cardContent = json_decode(file_get_contents('./tests/resources/test_flight.json'), true);
        $flightCard  = new FlightCard($cardContent);
        $actual      = $flightCard->printTravel();
        $expected    = "From Stockholm, take flight SK22 to New York JFK. Gate 22. "
            . "Baggage will we automatically transferred from your last leg.\n";
        $this->assertEquals($expected, $actual);
    }

    public function testgetDepartureDate()
    {
        $cardContent = json_decode(file_get_contents('./tests/resources/test_flight.json'), true);
        $flightCard  = new FlightCard($cardContent);
        $actual      = $flightCard->getDepartureDate();
        $expected    = '2023-03-05 17:05';
        $this->assertEquals($expected, $actual);
    }

}
