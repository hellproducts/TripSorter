<?php

namespace TripSorter\DataReader;

/**
 * Class JsonDataReader
 *
 * @package TripSorter\DataReader
 */
class JsonDataReader implements DataReaderInterface
{

    /**
     * Decodes the json string into an associative array which will be later used to populate Card objects.
     *
     * @param string $data
     *
     * @return mixed
     */
    public function convertFromString(string $data)
    {
        return json_decode($data, true);
    }

    /**
     * @param string $filePath
     *
     * @return mixed
     * @throws \RuntimeException
     */
    public function convertFromFile(string $filePath)
    {
        throw new \RuntimeException('Method is not implemented');
    }
}