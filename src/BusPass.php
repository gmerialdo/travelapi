<?php

namespace TravelApi;

//require_once('BoardingPass.php');

class BusPass extends BoardingPass
{

    public function printTravel() : string
    {
        $seat = $this->specificParams['seat'] ? "Seat ".$this->specificParams['seat'] : "No seat assignment.";

        $travel  = "Take the ". $this->specificParams['busType'];
        $travel .= " from " .$this->commonParams['departureLocation'];
        $travel .= " to " .$this->commonParams['arrivalLocation'] . ". ";
        $travel .= $seat."\n";
        return $travel;
    }

}
