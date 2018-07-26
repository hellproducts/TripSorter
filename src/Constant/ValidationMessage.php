<?php
/**
 * Created by IntelliJ IDEA.
 * User: bacioropina
 * Date: 7/26/2018
 * Time: 11:12 AM
 */

namespace TripSorter\Constant;

/**
 * Class ValidationMessage
 * @package TripSorter\Constant
 */
class ValidationMessage
{
    public const NULL_INSTANCE = 'The provided variable is null.';
    public const INVALID_INSTANCE = 'The provided variable is not of type %s.';
    public const NULL_DEPARTURE_ATTRIBUTE = 'The "from" field must not be null.';
    public const NULL_ARRIVAL_ATTRIBUTE = 'The "to" field must not be null.';
    public const NULL_TYPE_ATTRIBUTE = 'The "type" attribute must not be null.';
}
