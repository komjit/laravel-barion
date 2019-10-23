<?php


namespace KomjIT\Barion\Http\Controllers;


use App\Http\Controllers\Controller;
use KomjIT\Barion\Models\BarionClient;
use KomjIT\Barion\Models\Common\BarionEnvironment;
use KomjIT\Barion\Models\Common\Currency;
use KomjIT\Barion\Models\Common\FundingSourceType;
use KomjIT\Barion\Models\Common\PaymentType;
use KomjIT\Barion\Models\Common\UILocale;
use KomjIT\Barion\Models\Models\Common\ItemModel;
use KomjIT\Barion\Models\Models\Payment\PaymentTransactionModel;
use KomjIT\Barion\Models\Models\Payment\PreparePaymentRequestModel;
use KomjIT\Barion\Models\Models\ThreeDSecure\ShippingAddressModel;

class BarionController extends Controller
{
    public function index(){

        $myPosKey = "7763715f139e4f148243e3e40eeeb771";
        $myEmailAddress = "webmester@komjit.eu";

        $BC = new BarionClient($myPosKey, 2, BarionEnvironment::Test);

// create the item model
        $item = new ItemModel();
        $item->Name = "TestItem"; // no more than 250 characters
        $item->Description = "A test item for payment"; // no more than 500 characters
        $item->Quantity = 1;
        $item->Unit = "piece"; // no more than 50 characters
        $item->UnitPrice = 1000;
        $item->ItemTotal = 1000;
        $item->SKU = "ITEM-01"; // no more than 100 characters

// create the transaction
        $trans = new PaymentTransactionModel();
        $trans->POSTransactionId = "TRANS-01";
        $trans->Payee = $myEmailAddress; // no more than 256 characters
        $trans->Total = 1000;
        $trans->Comment = "Test Transaction"; // no more than 640 characters
        $trans->AddItem($item); // add the item to the transaction

// create the shipping address
        $shippingAddress = new ShippingAddressModel();
        $shippingAddress->Country = "HU";
        $shippingAddress->Region = null;
        $shippingAddress->City = "Budapest";
        $shippingAddress->Zip = "1111";
        $shippingAddress->Street = "Teszt utca 1.";
        $shippingAddress->Street2 = "1. emelet 1. ajto";
        $shippingAddress->Street3 = "";
        $shippingAddress->FullName = "Teszt Tibor";

// create the request model
        $ppr = new PreparePaymentRequestModel();
        $ppr->GuestCheckout = true;
        $ppr->PaymentType = PaymentType::Immediate;
        $ppr->FundingSources = array(FundingSourceType::All);
        $ppr->PaymentRequestId = "PAYMENT-01";
        $ppr->PayerHint = "user@example.com";
        $ppr->Locale = UILocale::HU;
        $ppr->OrderNumber = "ORDER-0001";
        $ppr->Currency = Currency::HUF;
        $ppr->RedirectUrl = "http://webshop.example.com/afterpayment";
        $ppr->CallbackUrl = "http://webshop.example.com/processpayment";
        $ppr->AddTransaction($trans);

// send the request
        $myPayment = $BC->PreparePayment($ppr);

        if ($myPayment->RequestSuccessful === true) {
            return redirect()->to(BARION_WEB_URL_TEST."?id=" . $myPayment->PaymentId);
        }
    }
}
