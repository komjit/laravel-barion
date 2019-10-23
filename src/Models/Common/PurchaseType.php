<?php


namespace KomjIT\Barion\Models\Common;


abstract class PurchaseType
{
    const GoodsAndServicePurchase = "GoodsAndServicePurchase";
    const CheckAcceptance = "CheckAcceptance";
    const AccountFunding = "AccountFunding";
    const QuasiCashTransaction = "QuasiCashTransaction";
    const PrePaidVacationAndLoan = "PrePaidVacationAndLoan";
}
