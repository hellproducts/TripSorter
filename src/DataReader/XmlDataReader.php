<?php
/**
 * Created by IntelliJ IDEA.
 * User: mac
 * Date: 25/07/2018
 * Time: 23:01
 */

namespace TripSorter\DataReader;

class XmlDataReader implements DataReaderInterface
{

    /**
     * @param string $data
     *
     * @return mixed
     */
    public function convertFromString(string $data)
    {
        $xml = simplexml_load_string($data);
        $encoded = json_encode($xml);
        $decoded = json_decode($encoded, true);
        return $decoded['element'] ?? [];
    }

    /**
     * @param string $filePath
     *
     * @return mixed
     */
    public function convertFromFile(string $filePath)
    {
        // TODO: Implement convertFromFile() method.
    }
}