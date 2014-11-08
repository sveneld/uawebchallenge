<?php

/**
 * This is the model class for table "affiliates".
 *
 * The followings are the available columns in table 'affiliates':
 * @property string $Id
 * @property string $Name
 * @property string $AllowedShippingMethods
 * @property string $AllowedPaymentMethods
 * @property string $AllowedProductCategories
 * @property string $PercentFromSales
 */
class YAffiliate extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'affiliates';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Id', 'required'),
			array('Id', 'length', 'max'=>10),
			array('Name', 'length', 'max'=>255),
			array('PercentFromSales', 'length', 'max'=>15),
			array('AllowedShippingMethods, AllowedPaymentMethods, AllowedProductCategories', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, Name, AllowedShippingMethods, AllowedPaymentMethods, AllowedProductCategories, PercentFromSales', 'safe', 'on'=>'search'),
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
            'Affiliate' => array(self::HAS_MANY, 'YApiKey', array('IdAffiliate' => 'Id')),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' => 'ID',
			'Name' => 'Name',
			'AllowedShippingMethods' => 'Allowed Shipping Methods',
			'AllowedPaymentMethods' => 'Allowed Payment Methods',
			'AllowedProductCategories' => 'Allowed Product Categories',
			'PercentFromSales' => 'Percent From Sales',
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

		$criteria->compare('Id',$this->Id,true);
		$criteria->compare('Name',$this->Name,true);
		$criteria->compare('AllowedShippingMethods',$this->AllowedShippingMethods,true);
		$criteria->compare('AllowedPaymentMethods',$this->AllowedPaymentMethods,true);
		$criteria->compare('AllowedProductCategories',$this->AllowedProductCategories,true);
		$criteria->compare('PercentFromSales',$this->PercentFromSales,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Affiliate the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
