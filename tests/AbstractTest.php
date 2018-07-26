<?php
/**
 * Created by IntelliJ IDEA.
 * User: bacioropina
 * Date: 7/26/2018
 * Time: 2:44 PM
 */

namespace TripSorterTests;


use PHPUnit\Framework\TestCase;
use TripSorter\BoardingCard\Card;

abstract class AbstractTest extends TestCase
{
    /** @var Card */
    protected $card;

    protected const data = [
        'from' => 'Cluj',
        'to' => 'Bucuresti',
        'type' => 'plane'
    ];

    protected const invalidData = [
        'from' => '',
        'to' => 'Bucuresti',
        'type' => 'plane'
    ];

    protected function setUpCard(): void
    {
        $this->card = new Card();
        $this->card->populate(self::data);
    }

}