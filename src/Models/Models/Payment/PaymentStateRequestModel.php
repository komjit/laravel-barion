<?php


namespace KomjIT\Barion\Models\Models\Payment;


use KomjIT\Barion\Models\Models\BaseRequestModel;

class PaymentStateRequestModel extends BaseRequestModel
{
    public $PaymentId;

    function __construct($paymentId)
    {
        $this->PaymentId = $paymentId;
    }
}
