<?php

namespace TripSorter\DataReader;

use TripSorter\Exception\DataReaderFactoryException;

/**
 * Class DataReaderFactory
 * @package TripSorter\DataReader
 */
class DataReaderFactory
{

    /**
     * @param string $type
     *
     * @return DataReaderInterface
     * @throws DataReaderFactoryException
     */
    public function createReader(string $type): DataReaderInterface
    {
        switch ($type) {
            case DataReaderType::JSON:
                return new JsonDataReader();
                break;
            case DataReaderType::XML:
                return new XmlDataReader();
                break;
            default:
                throw new DataReaderFactoryException(
                    'Type' . $type . ' is not a valid data reader type',
                    DataReaderFactoryException::INVALID_TYPE_READER
                );
        }
    }

}