<?php

namespace App;

use Exception;
use TravelApi\BoardingCard;
use TravelApi\BusCard;
use TravelApi\CardsHelper;
use TravelApi\FlightCard;
use TravelApi\TrainCard;

class TravelApi
{



    public static function summarizeTrip(array $fileNames) : string
    {
        try {
            $cardsHelper = new CardsHelper();
            $tripSummary = '';
            foreach ($fileNames as $fileName) {
                $boardingCards[] = $cardsHelper->createBoardingCard($fileName);
            }
            $sortedBoardingCards = $cardsHelper->sortBoardingCards($boardingCards);
            foreach ($sortedBoardingCards as $boardingCard) {
                $tripSummary .= $boardingCard->printTravel();
            }
            $tripSummary .= 'You have arrived at your final destination.';
            return $tripSummary;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

}

