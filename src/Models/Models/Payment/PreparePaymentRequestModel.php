<?php


namespace KomjIT\Barion\Models\Models\Payment;


use KomjIT\Barion\Models\Common\Currency;
use KomjIT\Barion\Models\Common\FundingSourceType;
use KomjIT\Barion\Models\Common\PaymentType;
use KomjIT\Barion\Models\Models\BaseRequestModel;

class PreparePaymentRequestModel extends BaseRequestModel
{
    public $PaymentType;
    public $ReservationPeriod;
    public $DelayedCapturePeriod;
    public $PaymentWindow;
    public $GuestCheckout;
    public $FundingSources;
    public $PaymentRequestId;
    public $PayerHint;
    public $Transactions;
    public $Locale;
    public $OrderNumber;
    public $ShippingAddress;
    public $BillingAddress;
    public $InitiateRecurrence;
    public $RecurrenceId;
    public $RedirectUrl;
    public $CallbackUrl;
    public $Currency;
    public $CardHolderNameHint;
    public $PayerPhoneNumber;
    public $PayerWorkPhoneNumber;
    public $PayerHomePhoneNumber;
    public $PayerAccountInformation;
    public $PurchaseInformation;
    public $RecurrenceType;
    public $ChallengePreference;

    function __construct($requestId = null, $type = PaymentType::Immediate, $guestCheckoutAllowed = true, $allowedFundingSources = array(FundingSourceType::All), $window = "00:30:00", $locale = "hu-HU", $initiateRecurrence = false, $recurrenceId = null, $redirectUrl = null, $callbackUrl = null, $currency = Currency::HUF)
    {
        $this->PaymentRequestId = $requestId;
        $this->PaymentType = $type;
        $this->PaymentWindow = $window;
        $this->GuestCheckout = true;
        $this->FundingSources = array(FundingSourceType::All);
        $this->Locale = $locale;
        $this->InitiateRecurrence = $initiateRecurrence;
        $this->RecurrenceId = $recurrenceId;
        $this->RedirectUrl = $redirectUrl;
        $this->CallbackUrl = $callbackUrl;
        $this->Currency = $currency;
    }

    public function AddTransaction(PaymentTransactionModel $transaction)
    {
        if ($this->Transactions == null) {
            $this->Transactions = array();
        }
        array_push($this->Transactions, $transaction);
    }

    public function AddTransactions($transactions)
    {
        if (!empty($transactions)) {
            foreach ($transactions as $transaction) {
                if ($transaction instanceof PaymentTransactionModel) {
                    $this->AddTransaction($transaction);
                }
            }
        }
    }
}
