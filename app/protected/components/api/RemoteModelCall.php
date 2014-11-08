<?php
class RemoteModelCall extends DataContainerResponse {

    public function run(DataContainer $DataContainer){

        //Key validation
        if (empty($DataContainer->Key)){
            return $this->addError('Key cannot by empty!');
        }
        $ApiKeys = YApiKey::model()->with(array('Affiliate'))->cache(3600)->findByPk($DataContainer->Key);
        if (!$ApiKeys){
            $this->addError('Key not found!');
            return $this->getData();
        }
        if ($ApiKeys->Enabled == 0){
            $this->addError('Key is disabled!');
            return $this->getData();
        }
        if (strtotime($ApiKeys->ValidUntil) < time()){
            $this->addError('Key is expired!');
            return $this->getData();
        }

        Affiliate::setApiKey($ApiKeys->Key);
        Affiliate::setAffiliateId($ApiKeys->Affiliate->Id);
        $allowed = new StdClass();
        $allowed->shippingMethod = json_decode($ApiKeys->Affiliate->AllowedShippingMethods);
        $allowed->paymentMethod = json_decode($ApiKeys->Affiliate->AllowedPaymentMethods);
        $allowed->productCategories = json_decode($ApiKeys->Affiliate->AllowedProductCategories);
        Affiliate::setAllowed($allowed);

        //Class validation
        if (empty($DataContainer->Class)){
            $this->addError('Remote class cannot by empty!');
            return $this->getData();
        }

        try{
            if (!class_exists($DataContainer->Class)){
                throw new ApiException('Remote class not found!');
            }
        }catch (ApiException $e){
            $this->addError($e->getMessage());
            return $this->getData();
        }

        $Model = new $DataContainer->Class();
        if (method_exists($Model,$DataContainer->Method)){
            $result = call_user_func(array($Model, $DataContainer->Method), $DataContainer->Data);
            return $result->getData();
        } else {
            $this->addError('Method of class '.$DataContainer->Class.' not found!');
            return $this->getData();
        }

    }


}