<?php
/**
 * Created by IntelliJ IDEA.
 * User: mac
 * Date: 25/07/2018
 * Time: 22:58
 */

namespace TripSorter\DataReader;


class DataReaderFactory
{

    /**
     * @param string $type
     *
     * @return DataReaderInterface
     * @throws \InvalidArgumentException
     */
    public static function createReader(string $type): DataReaderInterface
    {
        switch ($type) {
            case DataReaderType::JSON:
                return new JsonDataReader();
                break;
            case DataReaderType::XML:
                return new XmlDataReader();
                break;
            default:
                throw new \InvalidArgumentException('Type' . $type . ' is not a valid data reader type');
        }
    }

}