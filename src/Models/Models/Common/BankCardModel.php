<?php


namespace KomjIT\Barion\Models\Models\Common;


use KomjIT\Barion\Models\Helpers\iBarionModel;

class BankCardModel implements iBarionModel
{
    public $MaskedPan;
    public $BankCardType;
    public $ValidThruYear;
    public $ValidThruMonth;

    function __construct()
    {
        $this->MaskedPan = "";
        $this->BankCardType = "";
        $this->ValidThruYear = "";
        $this->ValidThruMonth = "";
    }

    public function fromJson($json)
    {
        if (!empty($json)) {
            $this->MaskedPan = jget($json, 'MaskedPan');
            $this->BankCardType = jget($json, 'BankCardType');
            $this->ValidThruYear = jget($json, 'ValidThruYear');
            $this->ValidThruMonth = jget($json, 'ValidThruMonth');
        }
    }
}
