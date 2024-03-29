<?php


namespace KomjIT\Barion\Models\Models\ThreeDSecure;


use KomjIT\Barion\Models\Helpers\iBarionModel;

class GiftCardPurchaseModel implements iBarionModel
{
    public $Amount;
    public $Count;

    function __construct()
    {
        $this->Amount = "";
        $this->Count = 0;
    }

    public function fromJson($json)
    {
        if (!empty($json)) {
            $this->Amount = jget($json, 'Amount');
            $this->Count = jget($json, 'Count');
        }
    }
}
