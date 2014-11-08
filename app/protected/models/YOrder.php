<?php

/**
 * This is the model class for table "orders".
 *
 * The followings are the available columns in table 'orders':
 * @property integer $Id
 * @property string $FullName
 * @property string $Phone
 * @property string $PhoneAdditional
 * @property string $Country
 * @property string $City
 * @property string $Address
 * @property string $AddressAdditional
 * @property string $SubTotal
 * @property string $ShippingTotal
 * @property string $PaymantTotal
 * @property string $Discount
 * @property string $Fee
 * @property string $Total
 * @property string $ShippingMethodName
 * @property string $IdShippingMethod
 * @property string $PaymentMethodName
 * @property string $IdPaymentMethod
 * @property string $IdOrderStatus
 * @property string $ApiKey
 * @property string $IdAffiliate
 */
class YOrder extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'orders';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Id, ApiKey, IdAffiliate', 'required'),
			array('Id, IdAffiliate', 'numerical', 'integerOnly'=>true),
			array('FullName, Address, AddressAdditional, ShippingMethodName, PaymentMethodName', 'length', 'max'=>255),
			array('Phone, PhoneAdditional, Country, City', 'length', 'max'=>45),
			array('ApiKey', 'length', 'max'=>32),
			array('SubTotal, ShippingTotal, PaymantTotal, Discount, Fee, Total', 'length', 'max'=>15),
			array('IdShippingMethod, IdPaymentMethod, IdOrderStatus', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, FullName, Phone, PhoneAdditional, Country, City, Address, AddressAdditional, SubTotal, ShippingTotal, PaymantTotal, Discount, Fee, Total, ShippingMethodName, IdShippingMethod, PaymentMethodName, IdPaymentMethod, IdOrderStatus,  ApiKey, IdAffiliate', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
            'ShippingMethod' => array(self::HAS_ONE, 'YShippingMethod', array('IdShippingMethod' => 'Id')),
            'PaymentMethod' => array(self::HAS_ONE, 'YPaymentMethod', array('IdPaymentMethod' => 'Id')),
            'OrderStatus' => array(self::HAS_ONE, 'YOrderStatus', array('IdOrderStatus' => 'Id')),
            'Product' => array(self::HAS_MANY, 'YOrderProduct', array('IdOrder' => 'Id')),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' => 'ID',
			'FullName' => 'Full Name',
			'Phone' => 'Phone',
			'PhoneAdditional' => 'Phone Additional',
			'Country' => 'Country',
			'City' => 'City',
			'Address' => 'Address',
			'AddressAdditional' => 'Address Additional',
			'SubTotal' => 'Sub Total',
			'ShippingTotal' => 'Shipping Total',
			'PaymantTotal' => 'Paymant Total',
			'Discount' => 'Discount',
			'Fee' => 'Fee',
			'Total' => 'Total',
			'ShippingMethodName' => 'Shipping Method Name',
			'IdShippingMethod' => 'Shipping Method',
			'PaymentMethodName' => 'Payment Method Name',
			'IdPaymentMethod' => 'Payment Method',
			'IdOrderStatus' => 'Id Order Status',
			'ApiKey' => 'Api Key',
			'IdAffiliate' => 'Id Affiliate',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('Id',$this->Id);
		$criteria->compare('FullName',$this->FullName,true);
		$criteria->compare('Phone',$this->Phone,true);
		$criteria->compare('PhoneAdditional',$this->PhoneAdditional,true);
		$criteria->compare('Country',$this->Country,true);
		$criteria->compare('City',$this->City,true);
		$criteria->compare('Address',$this->Address,true);
		$criteria->compare('AddressAdditional',$this->AddressAdditional,true);
		$criteria->compare('SubTotal',$this->SubTotal,true);
		$criteria->compare('ShippingTotal',$this->ShippingTotal,true);
		$criteria->compare('PaymantTotal',$this->PaymantTotal,true);
		$criteria->compare('Discount',$this->Discount,true);
		$criteria->compare('Fee',$this->Fee,true);
		$criteria->compare('Total',$this->Total,true);
		$criteria->compare('ShippingMethodName',$this->ShippingMethodName,true);
		$criteria->compare('IdShippingMethod',$this->IdShippingMethod,true);
		$criteria->compare('PaymentMethodName',$this->PaymentMethodName,true);
		$criteria->compare('IdPaymentMethod',$this->IdPaymentMethod,true);
		$criteria->compare('IdOrderStatus',$this->IdOrderStatus,true);
		$criteria->compare('ApiKey',$this->ApiKey,true);
		$criteria->compare('IdAffiliate',$this->IdAffiliate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Orders the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
