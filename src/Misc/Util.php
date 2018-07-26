<?php
namespace TripSorter\Misc;

use TripSorter\BoardingCard\Card;
use TripSorter\BoardingCard\CardType;

class Util
{

    /**
     * Checks if the path to the given file path is a valid one and if the user has enough permissions to read it.
     *
     * @param string $filePath
     *
     * @return bool
     * @throws InvalidArgumentException
     */
    public static function isFileValid(string $filePath): bool
    {
        $fileIsOk = is_readable($filePath) && is_file($filePath);
        if (false === $fileIsOk) {
            throw new InvalidArgumentException(
                'File path is not valid or you do not have enough rights to read from it'
            );
        }
        return $fileIsOk;
    }

    /**
     * @param array $rawData
     *
     * @return array
     */
    public static function createCardsList(array $rawData): array
    {
        $cardsList = [];
        foreach ($rawData as $item) {
            $card = new Card();
            $card->populate($item);
            $cardsList[] = $card;
        }
        return $cardsList;
    }

    /**
     * @param Card $card
     *
     * @return string
     */
    public static function stringifyCard(Card $card): string
    {
        switch ($card->getType()) {
            case CardType::TYPE_TRAIN:
                return sprintf(
                    'Take %s %s from %s to %s. Sit in seat %s.',
                    $card->getType(),
                    $card->getIdentifier(),
                    $card->getFrom(),
                    $card->getTo(),
                    $card->getSeat()
                    );
                break;
            case CardType::TYPE_BUS:
                return sprintf(
                    'Take the %s from %s to %s. No seat assignment.',
                    $card->getType(),
                    $card->getFrom(),
                    $card->getTo()
                );
                break;
            case CardType::TYPE_PLANE:
                $message = sprintf(
                    'From %s, take flight %s to %s. Gate %s, seat %s.',
                    $card->getFrom(),
                    $card->getIdentifier(),
                    $card->getTo(),
                    $card->getGate(),
                    $card->getSeat()
                );
                if (null !== $card->getLuggage()) {
                    $message .= sprintf('Baggage drop at ticket counter %s.', $card->getLuggage());
                } else {
                    $message .= 'Baggage will we automatically transferred from your last leg.';
                }
                return $message;
                break;
            default:
                return 'You have arrived at your final destination.';
                break;

        }
    }

}