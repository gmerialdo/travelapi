<?php

namespace TravelApi;

//require_once('BoardingPass.php');

class FlightPass extends BoardingPass
{

    public function printTravel() : string
    {
        $bagageDrop = ($this->specificParams['bagageDrop']['auto'])?
            "Baggage will we automatically transferred from your last leg."
            : "Bagage drop at ticker counter ".$this->specificParams['bagageDrop']['counter'].".";

        $travel =   "From ".$this->commonParams['departureLocation'].", ";
        $travel .=  "take flight ".$this->specificParams['flightNb']." to ".$this->commonParams['arrivalLocation'].". ";
        $travel .=  "Gate ".$this->specificParams['gateNb'].". ";
        $travel .=  $bagageDrop."\n";
        return $travel;
    }

}
