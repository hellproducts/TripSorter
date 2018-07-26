<?php

namespace TripSorter\Helper;

use TripSorter\BoardingCard\Card;
use TripSorter\BoardingCard\CardType;
use TripSorter\Constant\StringConstant;
use TripSorter\Validator\CardValidator;

class TripSorterHelper
{

    /**
     * Checks if the path to the given file path is a valid one and if the user has enough permissions to read it.
     *
     * @param string $filePath
     *
     * @return bool
     */
    public function isFileValid(string $filePath): bool
    {
        return is_readable($filePath) && is_file($filePath);
    }

    /**
     * @param array $rawData
     *
     * @return array
     * @throws \TripSorter\Exception\InvalidCardException
     */
    public function createCardsList(array $rawData): array
    {
        $validator = new CardValidator();
        $cardsList = [];
        foreach ($rawData as $item) {
            $card = new Card();
            $card->populate($item);
            $validator->setCard($card)->validate();
            $cardsList[] = $card;
        }
        return $cardsList;
    }

    /**
     * @param Card $card
     *
     * @return string
     */
    public function stringifyCard(Card $card): string
    {
        switch ($card->getType()) {
            case CardType::TYPE_TRAIN:
                return sprintf(
                    StringConstant::TRIP_TRAIN_MESSAGE,
                    $card->getType(),
                    $card->getIdentifier(),
                    $card->getFrom(),
                    $card->getTo(),
                    $card->getSeat()
                );
                break;
            case CardType::TYPE_BUS:
                return sprintf(
                    StringConstant::TRIP_BUS_MESSAGE,
                    $card->getType(),
                    $card->getFrom(),
                    $card->getTo()
                );
                break;
            case CardType::TYPE_PLANE:
                $message = sprintf(
                    StringConstant::TRIP_PLANE_MESSAGE,
                    $card->getFrom(),
                    $card->getIdentifier(),
                    $card->getTo(),
                    $card->getGate(),
                    $card->getSeat()
                );
                if (null !== $card->getLuggage()) {
                    $message .= sprintf(
                        StringConstant::TRIP_BAGGAGE_DROP_MESSAGE,
                        $card->getLuggage()
                    );
                } else {
                    $message .= StringConstant::TRIP_NO_BAGGAGE_DROP_MESSAGE;
                }
                return $message;
                break;
        }
    }

}