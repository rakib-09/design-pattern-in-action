<?php
/**
 * Created by Anonymous
 * Date: 2/5/20
 * Time: 1:34 am
 */

interface PaymentGateway{
    public function pay($amount);
}

class DCC implements PaymentGateway{

    public function pay($amount)
    {
       echo "Paying $amount using Debit/Credit card\n";
    }
}

class Stripe implements PaymentGateway {

    public function pay($amount)
    {
        echo "Paying $amount using Stripe\n";
    }
}

class Order {
    private PaymentGateway $paymentGateway;


    public function setPaymentGateway(PaymentGateway $paymentGateway)
    {
        $this->paymentGateway = $paymentGateway;
    }

    public function payBill($amount)
    {
        return $this->paymentGateway->pay($amount);
    }

}

$order = new Order();
$order2 = clone $order;
$order->setPaymentGateway(new DCC());
$order2->setPaymentGateway(new Stripe());
$order->payBill(200);
$order2->payBill(500);