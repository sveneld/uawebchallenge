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

        try {
            Database::beginTransaction();

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
            Database::commitTransaction();
            TransactionFactory::commit();
        } catch (Exception $e) {
            TransactionFactory::rollback();
            return $this->addError('Fatal error 003');
        }

        $data = new stdClass();
        $data->IdOrder = $order->Id;
        $this->addData($data);
        return $this;
    }

    public function get($data)
    {
        $criteria = new CDbCriteria();
        $criteria->addCondition('Id', $data->IdOrder);
        $criteria->addCondition('ApiKey', RemoteModelCall::$ApiKey);
        $criteria->with(array('Product'));
        $order = YOrder::model()->find($criteria);
        if (empty($order)){
            return $this->addError('No such order');
        }
        $data = new stdClass();
        $data->IdOrder = $order->Id;
        $data->FullName = $order->FullName;
        $data->Phone = $order->Phone;
        $data->PhoneAdditional = $order->PhoneAdditional;
        $data->Country = $order->Country;
        $data->City = $order->City;
        $data->Address = $order->Address;
        $data->AddressAdditional = $order->AddressAdditional;
        $data->SubTotal = $order->SubTotal;
        $data->ShippingTotal = $order->ShippingTotal;
        $data->PaymantTotal = $order->PaymantTotal;
        $data->Discount = $order->Discount;
        $data->Fee = $order->Fee;
        $data->Total = $order->Total;
        $data->ShippingMethodName = $order->ShippingMethodName;
        $data->IdShippingMethod = $order->IdShippingMethod;
        $data->PaymentMethodName = $order->PaymentMethodName;
        $data->IdPaymentMethod = $order->IdPaymentMethod;
        $data->IdOrderStatus = $order->IdOrderStatus;
        $data->Products = array();
        foreach($order->Product as $product){
            $pData = new stdClass();
            $pData->Name = $product->Name;
            $pData->Sku = $product->Sku;
            $pData->Price = $product->Price;
            $pData->Quantity = $product->Quantity;
            $data->Products[] = $pData;
        }

        $this->addData($data);
        return $this;
    }

    public function getList($data)
    {
        $criteria = new CDbCriteria();
        $criteria->addCondition('ApiKey', RemoteModelCall::$ApiKey);
        $criteria->with(array('Product'));
        $orders = YOrder::model()->findAll($criteria);
        foreach ($orders as $order){
            $data = new stdClass();
            $data->IdOrder = $order->Id;
            $data->FullName = $order->FullName;
            $data->Phone = $order->Phone;
            $data->PhoneAdditional = $order->PhoneAdditional;
            $data->Country = $order->Country;
            $data->City = $order->City;
            $data->Address = $order->Address;
            $data->AddressAdditional = $order->AddressAdditional;
            $data->SubTotal = $order->SubTotal;
            $data->ShippingTotal = $order->ShippingTotal;
            $data->PaymantTotal = $order->PaymantTotal;
            $data->Discount = $order->Discount;
            $data->Fee = $order->Fee;
            $data->Total = $order->Total;
            $data->ShippingMethodName = $order->ShippingMethodName;
            $data->IdShippingMethod = $order->IdShippingMethod;
            $data->PaymentMethodName = $order->PaymentMethodName;
            $data->IdPaymentMethod = $order->IdPaymentMethod;
            $data->IdOrderStatus = $order->IdOrderStatus;
            $data->Products = array();
            foreach($order->Product as $product){
                $pData = new stdClass();
                $pData->Name = $product->Name;
                $pData->Sku = $product->Sku;
                $pData->Price = $product->Price;
                $pData->Quantity = $product->Quantity;
                $data->Products[] = $pData;
            }
            $this->addData($data);
        }
        return $this;
    }

    public function getStatus($data)
    {
        $criteria = new CDbCriteria();
        $criteria->addCondition('Id', $data->IdOrder);
        $criteria->addCondition('ApiKey', RemoteModelCall::$ApiKey);
        $criteria->select('IdOrderStatus');
        $criteria->with(array('OrderStatus' => array('select' => 'Name')));
        $order = YOrder::model()->find($criteria);

        if (empty($order)){
            return $this->addError('No such order');
        }

        $data = new stdClass();
        $data->IdOrder = $order->Id;
        $data->IdOrderStatus = $order->IdOrderStatus;
        $data->OrderStatusName = !empty($order->OrderStatus->Name) ? $order->OrderStatus->Name : '';

        $this->addData($data);
        return $this;
    }

} 