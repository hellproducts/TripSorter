<?php

namespace TripSorter;

use TripSorter\BoardingCard\Card;

/**
 * Class TripSorter
 */
class TripSorter
{

    /** @var array */
    private $cards;
    /** @var int */
    private $cardsNo;

    /**
     * @param array $cards
     *
     * @return TripSorter
     */
    public function setBoardingCards(array $cards): self
    {
        $this->cards = $cards;
        $this->setCardsNo(count($this->cards));

        return $this;
    }

    /**
     * @param int $cardsNo
     */
    private function setCardsNo(int $cardsNo): void
    {
        $this->cardsNo = $cardsNo;
    }

    /**
     * @return array
     */
    public function retrieveSortedTrip(): array
    {
        $this->identifyDepartureAndDestination();
        $this->resetListIndexes();
        $this->sortCards();

        return $this->cards;
    }

    private function identifyDepartureAndDestination(): void
    {
        for ($i = 0; $i < $this->cardsNo; $i++) {
            $hasPreviousPoint = false;
            $isEndingPoint = true;
            // loop through all the cards and identify 1st and last node in the trip
            foreach ($this->cards as $index => $card) {
                $this->compareCards(
                    $this->cards[$i],
                    $card,
                    $hasPreviousPoint,
                    $isEndingPoint
                );
            }

            if (!$hasPreviousPoint) {
                array_unshift($this->cards, $this->cards[$i]);
                unset($this->cards[$i]);
            }
            if ($isEndingPoint) {
                $this->cards[] = $this->cards[$i];
                unset($this->cards[$i]);
            }
        }
    }

    private function sortCards(): void
    {
        for ($i = 0; $i < $this->cardsNo; $i++) {
            /** @var Card $currentCard */
            /** @var Card $card */
            $currentCard = $this->cards[$i];
            foreach ($this->cards as $idx => $card) {
                if (strcasecmp($currentCard->getTo(), $card->getFrom()) === 0) {
                    $nextIdx = $i + 1;
                    $tmp = $this->cards[$nextIdx];
                    $this->cards[$nextIdx] = $card;
                    $this->cards[$idx] = $tmp;
                    break;
                }
            }
        }
    }

    private function resetListIndexes(): void
    {
        $this->cards = array_values($this->cards);
    }

    /**
     * @param Card $firstCard
     * @param Card $secondCard
     * @param      $hasPreviousPoint
     * @param      $isLastPoint
     */
    private function compareCards(Card $firstCard, Card $secondCard, bool &$hasPreviousPoint, bool &$isLastPoint): void
    {
        if (strcasecmp($firstCard->getFrom(), $secondCard->getTo()) === 0) {
            $hasPreviousPoint = true;
        }
        if (strcasecmp($firstCard->getTo(), $secondCard->getFrom()) === 0) {
            $isLastPoint = false;
        }
    }

}