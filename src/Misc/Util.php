<?php
namespace TripSorter\Misc;

use TripSorter\BoardingCard\Card;

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

}