<?php

use TravelApi\BoardingPass;
use TravelApi\BusPass;
use TravelApi\FlightPass;
use TravelApi\TrainPass;

class TravelApi
{

    private const FOLDERNAME = './resources/';

    private const TRAIN             = 'train';
    private const FLIGHT            = 'flight';
    private const BUS               = 'bus';
    private const AIRPORT_SHUTTLE   = 'airport shuttle';

    private const ALLOWED_TRANSPORTATION = [
        self::TRAIN,
        self::FLIGHT,
        self::BUS,
        self::AIRPORT_SHUTTLE
    ];

    public static function summarizeTrip(array $fileNames) : string
    {
        try {
            $tripSummary = '';
            foreach ($fileNames as $fileName) {
                $boardingPasses[] = self::createBoardingPass($fileName);
            }
            $sortedBoardingPasses = self::sortBoardingPasses($boardingPasses);
            foreach ($sortedBoardingPasses as $boardingPass) {
                $tripSummary .= $boardingPass->printTravel();
            }
            $tripSummary .= 'You have arrived at your final destination.';
            return $tripSummary;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    private static function createBoardingPass(string $fileName) : BoardingPass
    {
        $passContent    = json_decode(file_get_contents(self::FOLDERNAME.$fileName), true);
        $transportation = $passContent['transportation'];
        if (in_array($transportation, self::ALLOWED_TRANSPORTATION)) {
            switch ($transportation) {
                case self::TRAIN :
//                    require_once('TrainPass.php');
                    $boardingPass = new TrainPass($passContent);
                    break;
                case self::BUS :
//                    require_once('BusPass.php');
                    $boardingPass = new BusPass($passContent);
                    break;
                case self::FLIGHT :
//                    require_once('FlightPass.php');
                    $boardingPass = new FlightPass($passContent);
                    break;
                default:
                    break;
            }
            return $boardingPass;
        } else {
            throw new Exception('Incorrect transportation');
        }
    }

    private static function sortBoardingPasses(array $boardingPasses) : array
    {
        // Get the departure date for each pass
        foreach ($boardingPasses as $boardingPass) {
            $departureDates[] = $boardingPass->getDepartureDate();
        }
        // Sort the boarding passes by departure date
        array_multisort($departureDates, $boardingPasses);
        return $boardingPasses;
    }

}

echo TravelApi::summarizeTrip(['a1.json', 'a2.json', 'a3.json', 'a4.json']);
