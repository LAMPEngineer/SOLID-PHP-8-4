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
        return 'Paid $' . $amount . ' with Credit Card.';
    }

    public function refund(float $amount): string
    {
        return 'Refunded $' . $amount . ' to Credit Card.';
    }
}

class CashOnDelivery implements PaymentMethod
{
    public function pay(float $amount) : string
    {
        return 'Cash of $' . $amount . ' will be collected on delivery.';
    }

}


class PaymentProcess
{
    
    public function processPayment(PaymentMethod $paymemt, float $amount) : void
    {
        echo $paymemt->pay($amount) . PHP_EOL;
    }


    public function processRefund(RefundablePaymentMethod $payment, float $amount) : void
    {
        echo $payment->refund($amount) . PHP_EOL;
    }

}

// Usages
try {

    $card = new CreditPayment();
    $cod  = new CashOnDelivery();

    $paymentprocess = new PaymentProcess();

    $paymentprocess->processPayment($card, 500.76);
    $paymentprocess->processRefund($card, 500.76);

    $paymentprocess->processPayment($cod, 400.56);
    //$paymentprocess->processRefund($cod, 400.56); // not allowed, that's correct and follow LSP

} catch (\Throwable $th) {
    
    print $th->getMessage();
}


/* Output::

    Paid $500.76 with Credit Card.
    Refunded $500.76 to Credit Card.
    Cash of $400.56 will be collected on delivery.
*/

