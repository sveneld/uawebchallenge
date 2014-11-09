<?php
/**
 * Created by PhpStorm.
 * User: Sveneld
 * Date: 08.11.14
 * Time: 23:19
 */

class Affiliate {

    private static $apiKey;
    private static $affiliateId;
    private static $allowed = array();

    public static function setApiKey($key)
    {
        self::$apiKey = $key;
        Yii::app()->session['apiKey'] = $key;
    }

    public static function getApiKey()
    {
        return Yii::app()->session['apiKey'];
    }

    public static function setAffiliateId($value)
    {
        Yii::app()->session['affiliateId'] = $value;
        self::$affiliateId = $value;
    }

    public static function getAffiliateId()
    {
        return Yii::app()->session['affiliateId'];
    }

    public static function setAffiliatePercentFromSales($value)
    {
        Yii::app()->session['affiliatePercentFromSales'] = $value;
        self::$affiliateId = $value;
    }

    public static function getAffiliatePercentFromSales()
    {
        return Yii::app()->session['affiliatePercentFromSales'];
    }

    public static function setAllowed($value)
    {
        Yii::app()->session['allowed'] = $value;
        self::$allowed = $value;
    }

    public static function getAllowed()
    {
        return Yii::app()->session['allowed'];
    }

} 