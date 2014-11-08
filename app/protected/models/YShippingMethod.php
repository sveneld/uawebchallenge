<?php

/**
 * This is the model class for table "shipping_methods".
 *
 * The followings are the available columns in table 'shipping_methods':
 * @property integer $Id
 * @property string $Name
 * @property string $Cost
 * @property string $AdditionalParam
 */
class YShippingMethod extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'shipping_methods';
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
			array('Id', 'numerical', 'integerOnly'=>true),
			array('Name', 'length', 'max'=>255),
			array('Cost', 'length', 'max'=>15),
			array('AdditionalParam', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, Name, Cost, AdditionalParam', 'safe', 'on'=>'search'),
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
            'ShippingMethod' => array(self::BELONGS_TO, 'YOrder', array('Id' => 'IdShippingMethod')),
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
			'Cost' => 'Cost',
			'AdditionalParam' => 'Additional Param',
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
		$criteria->compare('Name',$this->Name,true);
		$criteria->compare('Cost',$this->Cost,true);
		$criteria->compare('AdditionalParam',$this->AdditionalParam,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ShippingMethods the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
