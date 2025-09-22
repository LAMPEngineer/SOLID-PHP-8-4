<?php
/*
 * Child classes should behave like their parent classes without unexpected changes.
 * If a subclass changes the expected behavior of the parent class, it violates LSP.
 *
 *
 * Here we have a base class PaymentMethod and create "CreditPayment" and
 * "CashOnDelivery" Subclasses, both should work wherever "PaymentMethod"
 * is expected - pay & refund. But "CashOnDelivery" would break this principle
 * since we can't expect refund from CashOnDelivery.
 *
 */
declare(strict_types = 1);

abstract class PaymentMethod
{
    abstract public function pay(float $amount) : string;
    abstract public function refund(float $amount) : string;
}

class CreditPayment extends PaymentMethod
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

class CashOnDelivery extends PaymentMethod
{
    public function pay(float $amount): string
    {
        return 'Cash of $' . $amount . ' will be collected on delivery.';
    }

    // Problem: Cash on Delivery can't refund
    public function refund(float $amount): string
    {
        throw new \Exception('Refund not supported for Cash On Delivery.' . PHP_EOL);
    }
}


class PaymentProcess
{
   public function processPay(PaymentMethod $payment, float $amount) : void
    {
        echo $payment->pay($amount) . PHP_EOL;
    }

   public function processRefund(PaymentMethod $payment, float $amount) : void
    {
        echo $payment->refund($amount) . PHP_EOL;
    }
}

// Usages
try {
    $card = new CreditPayment();
    $paymentprocess = new PaymentProcess();

    $paymentprocess->processPay($card, 500.67); // Works
    $paymentprocess->processRefund($card, 500.67); // Works


    $cod = new CashOnDelivery();
    $paymentprocess->processPay($cod, 500.67); // Works
    $paymentprocess->processRefund($cod, 500); // Breaks: Unexpected exception.

} catch (\Throwable $th) {

    print $th->getMessage();
}


/* Output::

    Paid $500.67 with Credit Card.
    Refunded $500.67 to Credit Card.
    Cash of $500.67 will be collected on delivery.
    Refund not supported for Cash On Delivery.
*/
