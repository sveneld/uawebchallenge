<?php

/**
 * Created by PhpStorm.
 * User: Sveneld
 * Date: 08.11.14
 * Time: 16:16
 */
class OrderModel extends DataContainerResponse
{

    public function add($data)
    {
        $order = new YOrder();
        $order->FullName = $data->FullName;
        $order->Phone = $data->Phone;
        $order->PhoneAdditional = $data->PhoneAdditional;
        $order->Country = $data->Country;
        $order->City = $data->City;
        $order->Address = $data->Address;
        $order->AddressAdditional = $data->AddressAdditional;

        $criteria = new CDbCriteria();
        $products = array();
        foreach ($data->Products as $product) {
            $products[] = $product->Sku;
        }
        $products = $criteria->addInCondition('Sku', $products);
        $groupedProducts = array();
        foreach ($products as $product) {
            $groupedProducts[$product->Sku] = $product;
        }
        $subTotal = 0;
        foreach ($data->Products as $product) {
            $subTotal += $groupedProducts[$product->Sku]->Price * $product->Quantity;
        }

        $order->SubTotal = $subTotal;

        $shippingMethod = YShippingMethod::model()->findByPK($data->IdShippingMethod);
        $order->ShippingTotal = $shippingMethod->Cost;
        $order->ShippingMethodName = $shippingMethod->Name;
        $order->IdShippingMethod = $data->IdShippingMethod;

        $paymentMethod = YPaymentMethod::model()->findByPK($data->IdPaymentMethod);
        $order->PaymentTotal = $paymentMethod->Cost;
        $order->PaymentMethodName = $paymentMethod->Name;
        $order->IdPaymentMethod = $data->IdPaymentMethod;

        $order->Discount = $data->Discount;
        $order->Fee = $data->Fee;
        $order->Total = $data->Total;

        $order->PaymentMethodName = $data->PaymentMethodName;
        $order->IdPaymentMethod = $data->IdPaymentMethod;
        $order->IdOrderStatus = 1;

        if (!$order->save()) {
            return $this->addError('Fatal error 001');
        }

        foreach ($data->Products as $product) {
            $orderProduct = new YOrderProduct();
            $orderProduct->IdOrder = $order->Id;
            $orderProduct->IdProduct = $groupedProducts[$product->Sku]->Id;
            $orderProduct->Sku = $product->Sku;
            $orderProduct->Name = $groupedProducts[$product->Sku]->Name;
            $orderProduct->Price = $product->Price;
            $orderProduct->Quantity = $product->Quantity;
            $orderProduct->IncomingPrice = $groupedProducts[$product->Sku]->IncomingPrice;
            $orderProduct->IncomingCurrency = $groupedProducts[$product->Sku]->IncomingCurrency;
            $orderProduct->IncomingCurrencyRate = $groupedProducts[$product->Sku]->IncomingCurrencyRate;

            if (!$order->save()) {
                return $this->addError('Fatal error 002');
            }

        }

        $data = new stdClass();
        $data->IdOrder = $order->Id;;
        $this->addData($data);
        return $this;
    }

    public function get()
    {
        $data = new stdClass();
        $data->SomeVal = 'coool555';
        $this->addData($data);
    }

    public function getList()
    {
        $data = new stdClass();
        $data->SomeVal = 'coool555';
        $this->addData($data);
    }

    public function getStatus()
    {
        $data = new stdClass();
        $data->SomeVal = 'coool555';
        $this->addData($data);
    }

} 