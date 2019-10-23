<?php


namespace KomjIT\Barion\Models\Models\Common;


use KomjIT\Barion\Models\Helpers\iBarionModel;

class FundingInformationModel implements iBarionModel
{
    public $BankCard;
    public $AuthorizationCode;

    function __construct()
    {
        $this->BankCard = new BankCardModel();
        $this->AuthorizationCode = "";
    }

    public function fromJson($json)
    {
        if (!empty($json)) {
            $this->BankCard = new BankCardModel();
            $this->BankCard->fromJson(jget($json, 'BankCard'));
            $this->AuthorizationCode = jget($json, 'AuthorizationCode');
        }
    }
}
