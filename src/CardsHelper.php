<?php

namespace TravelApi;

use Exception;

class CardsHelper
{

    private const FOLDERNAME = './resources/';

    private const TRAIN             = 'train';
    private const FLIGHT            = 'flight';
    private const BUS               = 'bus';

    private const ALLOWED_TRANSPORTATION = [
        self::TRAIN,
        self::FLIGHT,
        self::BUS,
    ];

    public function createBoardingCard(string $fileName) : BoardingCard
    {
        $passContent    = json_decode(file_get_contents(self::FOLDERNAME.$fileName), true);
        $transportation = $passContent['transportation'];

        if (in_array($transportation, self::ALLOWED_TRANSPORTATION)) {
            switch ($transportation) {
                case self::TRAIN :
                    $boardingPass = new TrainCard($passContent);
                    break;
                case self::BUS :
                    $boardingPass = new BusCard($passContent);
                    break;
                case self::FLIGHT :
                    $boardingPass = new FlightCard($passContent);
                    break;
                default:
                    break;
            }
            return $boardingPass;
        } else {
            throw new Exception('Incorrect transportation');
        }
    }

    public function sortBoardingCards(array $boardingPasses) : array
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
