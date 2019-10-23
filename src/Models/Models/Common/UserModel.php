<?php


namespace KomjIT\Barion\Models\Models\Common;


use KomjIT\Barion\Models\Helpers\iBarionModel;

class UserModel implements iBarionModel
{
    public $Name;
    public $Email;

    function __construct()
    {
        $this->Name = "";
        $this->Email = "";
    }

    function fromJson($json)
    {
        if (!empty($json)) {
            $this->Email = $json['Email'];

            $name = new UserNameModel();
            $name->fromJson($json['Name']);
        }
    }
}
