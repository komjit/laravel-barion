<?php


namespace KomjIT\Barion\Models\Common;


abstract class PasswordChangeIndicator
{
    const NoChange = "NoChange";
    const ChangedDuringThisTransaction = "ChangedDuringThisTransaction";
    const LessThan30Days = "LessThan30Days";
    const Between30And60Days = "Between30And60Days";
    const MoreThan60Days = "MoreThan60Days";
}
