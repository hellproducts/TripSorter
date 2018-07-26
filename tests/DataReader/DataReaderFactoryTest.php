<?php

namespace TripSorterTests\DataReader;

use PHPUnit\Framework\TestCase;
use TripSorter\DataReader\DataReaderFactory;
use TripSorter\DataReader\DataReaderType;
use TripSorter\DataReader\JsonDataReader;
use TripSorter\DataReader\XmlDataReader;

/**
 * Class DataReaderFactoryTest
 */
class DataReaderFactoryTest extends TestCase
{

    /** @var DataReaderFactory */
    private $factory;

    protected function setUp()
    {
        $this->factory = new DataReaderFactory();
    }

    /**
     * @throws \TripSorter\Exception\DataReaderFactoryException
     * @throws \Exception
     */
    public function testValidJsonDataReader(): void
    {
        $reader = $this->factory->createReader(DataReaderType::JSON);
        $this->assertInstanceOf(JsonDataReader::class, $reader);
    }

    /**
     * @throws \TripSorter\Exception\DataReaderFactoryException
     */
    public function testValidXmlDataReader(): void
    {
        $reader = $this->factory->createReader(DataReaderType::XML);
        $this->assertInstanceOf(XmlDataReader::class, $reader);
    }

    /**
     * @expectedException \TripSorter\Exception\DataReaderFactoryException
     */
    public function testInvalidDataReaderType(): void
    {
        $reader = $this->factory->createReader("awesome-reader");
    }

}