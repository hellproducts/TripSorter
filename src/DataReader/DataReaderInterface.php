<?php

namespace TripSorter\DataReader;

/**
 * Interface DataReaderInterface - used as a "contract" to ensure that all data parsers have the same set of methods
 * used to decode data
 *
 * @package TripSorter\DataReader
 */
interface DataReaderInterface
{

    /**
     * @param string $data
     *
     * @return mixed
     */
    public function convertFromString(string $data);

}