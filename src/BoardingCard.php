<?php

namespace TravelApi;

class BoardingCard
{

    protected string $transportation;
    protected array $commonParams;
    protected array $specificParams;

    public function __construct(array $passContent)
    {
        $this->transportation   =   $passContent['transportation'];
        $this->commonParams     =   $passContent['commonParams'];
        $this->specificParams   =   $passContent['specificParams'];
    }

    public function getDepartureDate() : string
    {
        return $this->commonParams['departureDate'];
    }

}
