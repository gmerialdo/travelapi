<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\TravelApi;

class TravelApiTest extends TestCase
{

    private const RESOURCE_PATH = '../tests/resources/';

    public function testSummarize(): void
    {
        $fileNames = [
            self::RESOURCE_PATH.'test_bus.json',
            self::RESOURCE_PATH.'test_flight.json'
        ];
        $resultCorrectSet   = TravelApi::summarizeTrip($fileNames);
        $expected           = "Take the airport bus from Barcelona to Gerona Airport. No seat assignment.\n"
            . "From Stockholm, take flight SK22 to New York JFK. Gate 22. Baggage will we automatically transferred from your last leg.\n"
            . "You have arrived at your final destination.";
        $this->assertEquals($expected, $resultCorrectSet);
    }

    public function testPrintTravelWrongTransportation()
    {
        $resultWrongSet = TravelApi::summarizeTrip([self::RESOURCE_PATH.'test_wrong_transportation.json']);
        $expected       = 'Incorrect transportation';
        $this->assertEquals($expected, $resultWrongSet);
    }

}
