<?php

namespace Tests;

use TravelApi\BusCard;
use TravelApi\CardsHelper;
use PHPUnit\Framework\TestCase;
use TravelApi\FlightCard;

class CardsHelperTest extends TestCase
{

    private const RESOURCE_PATH = '../tests/resources/';

    public function testCreateBoardingCardCorrect()
    {
        $cardsHelper        = new CardsHelper();
        $resultFlightCard   = $cardsHelper->createBoardingCard(self::RESOURCE_PATH.'test_flight.json');
        $this->assertInstanceOf(FlightCard::class, $resultFlightCard);

        $cardsHelper        = new CardsHelper();
        $resultBusCard   = $cardsHelper->createBoardingCard(self::RESOURCE_PATH.'test_bus.json');
        $this->assertInstanceOf(BusCard::class, $resultBusCard);
    }

    public function testCreateBoardingCardIncorrectTransportation()
    {
        $this->expectException('Exception');
        $this->expectExceptionMessage('Incorrect transportation');
        (new CardsHelper())->createBoardingCard(self::RESOURCE_PATH.'test_wrong_transportation.json');
    }

    public function testSortBoardingCards()
    {
        $cardsHelper = new CardsHelper();
        $content1   = json_decode(file_get_contents('./tests/resources/test_sort1.json'), true);
        $card1      = new BusCard($content1);
        $content2   = json_decode(file_get_contents('./tests/resources/test_sort2.json'), true);
        $card2      = new BusCard($content2);
        $content3   = json_decode(file_get_contents('./tests/resources/test_sort3.json'), true);
        $card3      = new BusCard($content3);
        $resultSorted = $cardsHelper->sortBoardingCards([$card3, $card1, $card2]);
        $this->assertEquals([$card1, $card2, $card3], $resultSorted);
    }

}
