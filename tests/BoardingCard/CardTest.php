<?php

namespace TripSorterTests\BoardingCard;


use TripSorter\BoardingCard\Card;
use TripSorterTests\AbstractTest;

/**
 * Class CardTest
 * @package TripSorterTests\BoardingCard
 */
class CardTest extends AbstractTest
{

    private const EXPECTED_VALID_FROM = 'Cluj';
    private const EXPECTED_VALID_TO = 'Bucuresti';
    private const EXPECTED_TYPE = 'plane';

    protected function setUp()
    {
        $this->setUpCard();
    }

    /**
     * @throws \Exception
     */
    public function testValidCard(): void
    {
        $this->assertEquals(self::EXPECTED_VALID_FROM, $this->card->getFrom());
        $this->assertEquals(self::EXPECTED_VALID_TO, $this->card->getTo());
        $this->assertEquals(self::EXPECTED_TYPE, $this->card->getType());
    }

    /**
     * @throws \Exception
     */
    public function testNullData(): void
    {
        $this->card = new Card();
        $this->card->populate(self::invalidData);
        $this->assertNull($this->card->getFrom());
    }

}