<?php

namespace TripSorter\BoardingCard;

/**
 * Class Card
 *
 * @package TripSorter\Card
 */
class Card
{
    /** @var string */
    private $from;

    /** @var string */
    private $to;

    /** @var string */
    private $type;

    /** @var string */
    private $identifier;

    /** @var string */
    private $seat;

    /**
     * @param array $data
     *
     * @return Card
     */
    public function populate(array $data): self
    {
        if (empty($data)) {
            return $this;
        }

        foreach ($data as $property => $value) {
            if (property_exists(__CLASS__, $property)) {
                $this->$property = $value;
            }
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getFrom(): string
    {
        return $this->from;
    }

    /**
     * @return string
     */
    public function getTo(): string
    {
        return $this->to;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getIdentifier(): string
    {
        return $this->identifier;
    }

    /**
     * @return string
     */
    public function getSeat(): string
    {
        return $this->seat;
    }
}
