<?php


namespace KomjIT\Barion\Models\Common;


abstract class AccountCreationIndicator
{
    const NoAccount = "NoAccount";
    const CreatedDuringThisTransaction = "CreatedDuringThisTransaction";
    const LessThan30Days = "LessThan30Days";
    const Between30And60Days = "Between30And60Days";
    const MoreThan60Days = "MoreThan60Days";
}
