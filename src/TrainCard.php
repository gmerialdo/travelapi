<?php

namespace TravelApi;

class TrainCard extends BoardingCard
{

    public function printTravel(): string
    {
        $travel =   "Take train " . $this->specificParams['trainNb'];
        $travel .=  " from " . $this->commonParams['departureLocation'];
        $travel .=  " to " . $this->commonParams['arrivalLocation'] . ". ";
        $travel .=  "Sit in seat " . $this->specificParams['seatNb'] . ".\n";
        return $travel;
    }

}
