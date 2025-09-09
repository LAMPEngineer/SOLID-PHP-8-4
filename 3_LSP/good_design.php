<?php
/*
 * To apply LSP, we fix this by splitting responsibilities into the different abstractions:
 * "PaymentMethod" and "RefundablePaymentMethod".
 *
 * 1. CreditPayment would work for both pay() and refund()
 *
 * 2. CashOnDelivery would only work for pay()
 *
 * We shouldn’t force child classes to implement methods they can’t logically support.
 * This way, our CashOnDelivery class does not break expectations, and LSP is respected.
 *
 */
declare(strict_types = 1);

interface PaymentMethod
{
    public function pay(float $amount) : string;
}

interface RefundablePaymentMethod extends PaymentMethod
{
    public function refund(float $amount) : string;

}

class CreditPayment implements RefundablePaymentMethod
{
    public function pay( float $amount) : string
    {
        return "Paid Rs. " . $amount . " with Credit Card.";
    }

    public function refund(float $amount): string
    {
        return "Refunded Rs. " . $amount . " to Credit Card.";
    }
}

class CashOnDelivery implements PaymentMethod
{
    public function pay(float $amount) : string
    {
        return "Cash of Rs. " . $amount . " will be collected on delivery.";
    }

}


function processPayment(PaymentMethod $paymemt, float $amount)
{
    echo $paymemt->pay($amount) . PHP_EOL;
}

function processRefund(RefundablePaymentMethod $payment, float $amount)
{
    echo $payment->refund($amount) . PHP_EOL;
}

// Usages
$card = new CreditPayment();
$cod  = new CashOnDelivery();

processPayment($card, 500);
processRefund($card, 500);

processPayment($cod, 500);
//processRefund($cod, 500); // not allowed, that's correct and follow LSP
