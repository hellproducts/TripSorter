<?php

namespace TripSorter\Validator;

use TripSorter\BoardingCard\Card;
use TripSorter\Constant\ValidationMessage;
use TripSorter\Exception\InvalidCardException;

/**
 * Class CardValidator
 */
class CardValidator implements ValidatorInterface
{

    /** @var Card */
    private $card;

    /**
     * Checks if the attached card is a valid card.
     * For a card to be valid, it must have a departure, an arrival and a type.
     * @throws InvalidCardException
     */
    public function validate(): void
    {
        $message = null;
        $code = null;
        if (null === $this->card) {
            $message = ValidationMessage::NULL_INSTANCE;
            $code = InvalidCardException::NULL_INSTANCE;
            throw new InvalidCardException($message, $code);
        }
        if (!$this->card instanceof Card) {
            $message = ValidationMessage::INVALID_INSTANCE;
            $code = InvalidCardException::INVALID_INSTANCE;
            throw new InvalidCardException($message, $code);
        }
        if (null === $this->card->getFrom()) {
            $message = ValidationMessage::NULL_DEPARTURE_ATTRIBUTE;
            $code = InvalidCardException::NULL_DEPARTURE_ATTRIBUTE;
            throw new InvalidCardException($message, $code);
        }
        if (null === $this->card->getTo()) {
            $message = ValidationMessage::NULL_ARRIVAL_ATTRIBUTE;
            $code = InvalidCardException::NULL_ARRIVAL_ATTRIBUTE;
            throw new InvalidCardException($message, $code);
        }
        if (null === $this->card->getType()) {
            $message = ValidationMessage::NULL_TYPE_ATTRIBUTE;
            $code = InvalidCardException::NULL_TYPE_ATTRIBUTE;
            throw new InvalidCardException($message, $code);
        }
    }

    /**
     * @param Card $card
     *
     * @return CardValidator
     */
    public function setCard(Card $card): self
    {
        $this->card = $card;
        return $this;
    }
}