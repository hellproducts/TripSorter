<?php
namespace TripSorterTests\Validator;


use TripSorter\BoardingCard\Card;
use TripSorter\Validator\CardValidator;
use TripSorterTests\AbstractTest;

class CardValidatorTest extends AbstractTest
{

    /** @var CardValidator */
    private $validator;

    protected function setUp(): void
    {
        $this->validator = new CardValidator();

        $this->setUpCard();
    }

    public function testValidCard(): void
    {
        $this->validator->setCard($this->card);
        $this->assertNull($this->validator->validate());
    }

    /**
     * @expectedException \TripSorter\Exception\InvalidCardException
     */
    public function testInvalidCard(): void
    {
        $this->card = new Card();
        $this->card->populate(self::invalidData);
        $this->validator->setCard($this->card);
        $this->validator->validate();
    }

}