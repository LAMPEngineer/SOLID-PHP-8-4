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
        return "Paid Rs. " . $amount . " with Credit Card.";
    }

    public function refund(float $amount): string
    {
        return "Refunded Rs. " . $amount . " to Credit Card.";
    }
}

class CashOnDelivery extends PaymentMethod
{
    public function pay(float $amount): string
    {
        return "Cash of Rs. " . $amount . " will be collected on delivery.";
    }

    // Problem: Cash on Delivery can't refund
    public function refund(float $amount): string
    {
        throw new MyCustomException('Refund not supported for Cash On Delivery.');
    }
}


class MyCustomException extends Exception
{
    // You can add custom properties or methods here if needed
    public function __construct($message = "", $code = 0)
    {
        parent::__construct($message, $code);
    }
}

function processRefund(PaymentMethod $payment, float $amount) : void
{
    echo $payment->refund($amount) . PHP_EOL;
}

// Usages
$card = new CreditPayment();
processRefund($card, 500); // Works

$cod = new CashOnDelivery();
processRefund($cod, 500); // Breaks: Unexpected exception.

