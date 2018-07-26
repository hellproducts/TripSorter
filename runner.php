<?php
define('DS', DIRECTORY_SEPARATOR);
define('JSON_DATA', __DIR__ . DS . 'json-data' . DS . 'cards.json');
define('XML_DATA', __DIR__ . DS . 'json-data' . DS . 'cards.xml');

require_once __DIR__ . DS . 'vendor' . DS . 'autoload.php';

$helper = new \TripSorter\Helper\TripSorterHelper();
$readerFactory = new \TripSorter\DataReader\DataReaderFactory();
$sorter = new \TripSorter\TripSorter();

try {
    // running with JSON data provider
    if ($helper->isFileValid(JSON_DATA)) {
        $json = file_get_contents(JSON_DATA);
        $reader = $readerFactory->createReader(
            \TripSorter\DataReader\DataReaderType::JSON
        );
        $rawData = $reader->convertFromString($json);
        $boardingCards = $helper->createCardsList($rawData);
        $tripList = $sorter->setBoardingCards($boardingCards)
            ->retrieveSortedTrip();
        showTrip($tripList, $helper);
    }

    // now, doing the same thing, only with xml as a data provider.
    if ($helper->isFileValid(XML_DATA)) {
        $xml = file_get_contents(XML_DATA);
        $reader = $readerFactory->createReader(
            \TripSorter\DataReader\DataReaderType::XML
        );
        $rawData = $reader->convertFromString($xml);
        $boardingCards = $helper->createCardsList($rawData);
        $tripList = $sorter->setBoardingCards($boardingCards)
            ->retrieveSortedTrip();
        showTrip($tripList, $helper);
    }
} catch (\TripSorter\Exception\DataReaderFactoryException $dfe) {
    echo 'Error when trying to create a DataReaderInterface object. ' . PHP_EOL .
        'Message: ' . $ice->getMessage() . PHP_EOL .
        'Code: ' . $ice->getCode();
} catch (\TripSorter\Exception\InvalidCardException $ice) {
    echo 'An InvalidCardException occurred. ' . PHP_EOL .
        'Message: ' . $ice->getMessage() . PHP_EOL .
        'Code: ' . $ice->getCode();
} catch (Exception $exception) {
    echo 'A generic error occurred: ' . $exception->getMessage() . PHP_EOL;
}

function showTrip($tripList, \TripSorter\Helper\TripSorterHelper $helper)
{
    foreach ($tripList as $card) {
        echo $helper->stringifyCard($card) . PHP_EOL;
    }
    echo \TripSorter\Constant\StringConstant::TRIP_FINAL_MESSAGE . PHP_EOL;
}
