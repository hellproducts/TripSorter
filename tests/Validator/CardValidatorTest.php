<?php
/**
 * Created by IntelliJ IDEA.
 * User: bacioropina
 * Date: 7/26/2018
 * Time: 11:58 AM
 */

namespace TripSorterTests\Validator;


use PHPUnit\Framework\TestCase;
use TripSorter\BoardingCard\Card;
use TripSorter\Exception\InvalidCardException;
use TripSorter\Validator\CardValidator;

class CardValidatorTest extends TestCase
{

    /** @var Card */
    private $card;
    
    /** @var CardValidator */
    private $validator;

    private const data = [
        'from' => 'Cluj',
        'to' => 'Bucuresti',
        'type' => 'plane'
    ];

    private const invalidData = [
        'from' => '',
        'to' => 'Bucuresti',
        'type' => 'plane'
    ];

    protected function setUp(): void
    {
        $this->validator = new CardValidator();
        
        $this->card = new Card();
        $this->card->populate(self::data);
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