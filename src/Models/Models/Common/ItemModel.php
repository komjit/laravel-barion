<?php


namespace KomjIT\Barion\Models\Models\Common;


use KomjIT\Barion\Models\Helpers\iBarionModel;

class ItemModel implements iBarionModel
{
    public $Name;
    public $Description;
    public $Quantity;
    public $Unit;
    public $UnitPrice;
    public $ItemTotal;
    public $SKU;

    function __construct()
    {
        $this->Name = "";
        $this->Description = "";
        $this->Quantity = 0;
        $this->Unit = "";
        $this->UnitPrice = 0;
        $this->ItemTotal = 0;
        $this->SKU = "";
    }

    public function fromJson($json)
    {
        if (!empty($json)) {
            $this->Name = jget($json, 'Name');
            $this->Description = jget($json, 'Description');
            $this->Quantity = jget($json, 'Quantity');
            $this->Unit = jget($json, 'Unit');
            $this->UnitPrice = jget($json, 'UnitPrice');
            $this->ItemTotal = jget($json, 'ItemTotal');
            $this->SKU = jget($json, 'SKU');
        }
    }
}
