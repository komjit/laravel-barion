<?php


namespace KomjIT\Barion\Models\Models\Payment;


use KomjIT\Barion\Models\Common\QRCodeSize;
use KomjIT\Barion\Models\Models\BaseRequestModel;

class PaymentQRRequestModel extends BaseRequestModel
{
    public $UserName;
    public $Password;
    public $PaymentId;
    public $Size;

    function __construct($paymentId)
    {
        $this->PaymentId = $paymentId;
        $this->Size = QRCodeSize::Normal;
    }
}
