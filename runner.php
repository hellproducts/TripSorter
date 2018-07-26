<?php
define('DS', DIRECTORY_SEPARATOR);
define('JSON_DATA', __DIR__ . DS . 'json-data' . DS . 'cards.json');
define('XML_DATA', __DIR__ . DS . 'json-data' . DS . 'cards.xml');

require_once __DIR__ . DS . 'vendor' . DS . 'autoload.php';

// running with JSON data provider
try {
    if (\TripSorter\Misc\Util::isFileValid(JSON_DATA)) {
        $json = file_get_contents(JSON_DATA);
        $reader = \TripSorter\DataReader\DataReaderFactory::createReader(
            \TripSorter\DataReader\DataReaderType::JSON
        );
        $rawData = $reader->convertFromString($json);
        $boardingCards = \TripSorter\Misc\Util::createCardsList($rawData);

        $sorter = new \TripSorter\TripSorter($boardingCards);
        $tripList = $sorter->retrieveSortedTrip();
    }
} catch (InvalidArgumentException $iae) {
    echo 'An error occurred: ' . $iae->getMessage() . PHP_EOL;
} catch (Exception $exception) {
    echo 'A generic error occurred: ' . $exception->getMessage() . PHP_EOL;
}

// now, doing the same thing, only with xml as a data provider.
try {
    if (\TripSorter\Misc\Util::isFileValid(JSON_DATA)) {
        $xml = file_get_contents(XML_DATA);
        $reader = \TripSorter\DataReader\DataReaderFactory::createReader(
            \TripSorter\DataReader\DataReaderType::XML
        );
        $rawData = $reader->convertFromString($xml);
        $boardingCards = \TripSorter\Misc\Util::createCardsList($rawData);
    }
} catch (InvalidArgumentException $iae) {
    echo 'An error occurred: ' . $iae->getMessage() . PHP_EOL;
} catch (Exception $exception) {
    echo 'A generic error occurred: ' . $exception->getMessage() . PHP_EOL;
}

foreach($tripList as $card) {
    echo \TripSorter\Misc\Util::stringifyCard($card) . PHP_EOL;
}
echo 'You have arrived at your final destination.' . PHP_EOL;
