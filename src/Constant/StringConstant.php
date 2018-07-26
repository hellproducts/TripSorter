<?php
/**
 * Created by IntelliJ IDEA.
 * User: bacioropina
 * Date: 7/26/2018
 * Time: 11:01 AM
 */

namespace TripSorter\Constant;

/**
 * Class StringConstant
 */
class StringConstant
{
    public CONST JSON_DATA_PROVIDER = 'Running with data from JSON.';
    public const XML_DATA_PROVIDER = 'Running with data from XML.';
    public const TRIP_FINAL_MESSAGE = 'You have arrived at your final destination.';
    public const TRIP_TRAIN_MESSAGE = 'Take %s %s from %s to %s. Sit in seat %s.';
    public const TRIP_BUS_MESSAGE = 'Take the %s from %s to %s. No seat assignment.';
    public const TRIP_PLANE_MESSAGE = 'From %s, take flight %s to %s. Gate %s, seat %s.';
    public const TRIP_OTHER_TYPE_MESSAGE = 'Take %s from %s to %s. No joke, use the %s';
    public const TRIP_BAGGAGE_DROP_MESSAGE = 'Baggage drop at ticket counter %s.';
    public const TRIP_NO_BAGGAGE_DROP_MESSAGE = 'Baggage will we automatically transferred from your last leg.';
}
