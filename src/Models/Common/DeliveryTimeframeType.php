<?php


namespace KomjIT\Barion\Models\Common;


abstract class DeliveryTimeframeType
{
    const ElectronicDelivery = "ElectronicDelivery";
    const SameDayShipping = "SameDayShipping";
    const OvernightShipping = "OvernightShipping";
    const TwoDayOrMoreShipping = "TwoDayOrMoreShipping";
}
