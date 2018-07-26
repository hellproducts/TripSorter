<?php

namespace TripSorter\Exception;


class InvalidCardException extends \Exception
{
    public const NULL_INSTANCE = 1000;
    public const INVALID_INSTANCE = 1001;
    public const NULL_DEPARTURE_ATTRIBUTE = 1002;
    public const NULL_ARRIVAL_ATTRIBUTE = 1003;
    public const NULL_TYPE_ATTRIBUTE = 1004;
}