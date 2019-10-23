<?php


namespace KomjIT\Barion\Models\Common;


abstract class PaymentType
{
    const Immediate = "Immediate";
    const Reservation = "Reservation";
    const DelayedCapture = "DelayedCapture";
}
