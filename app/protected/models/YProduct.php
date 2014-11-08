<?php

/**
 * This is the model class for table "products".
 *
 * The followings are the available columns in table 'products':
 * @property integer $Id
 * @property string $Sku
 * @property string $Name
 * @property string $Description
 * @property string $Image
 * @property string $InStock
 * @property string $Price
 * @property string $IncomingPrice
 * @property string $IncomingCurrency
 * @property string $IncomingCurrencyRate
 */
class YProduct extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'products';
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
            array('Id', 'numerical', 'integerOnly' => true),
            array('Sku', 'length', 'max' => 100),
            array('Name, Image', 'length', 'max' => 255),
            array('InStock', 'length', 'max' => 10),
            array('Price, IncomingPrice, IncomingCurrencyRate', 'length', 'max' => 15),
            array('IncomingCurrency', 'length', 'max' => 3),
            array('Description', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Id, Sku, Name, Description, Image, InStock, Price, IncomingPrice, IncomingCurrency, IncomingCurrencyRate', 'safe', 'on' => 'search'),
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
            'Category' => array(self::HAS_MANY, 'YProductToCategory', array('IdProduct' => 'Id')),
            'ProductName' => array(self::HAS_ONE, 'YProductCategory', array('IdProduct' => 'Id')),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'Id' => 'ID',
            'Sku' => 'Sku',
            'Name' => 'Name',
            'Description' => 'Description',
            'Image' => 'Image',
            'InStock' => 'In Stock',
            'Price' => 'Price',
            'IncomingPrice' => 'Incoming Price',
            'IncomingCurrency' => 'Incoming Currency',
            'IncomingCurrencyRate' => 'Incomming Currency Rate',
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

        $criteria = new CDbCriteria;

        $criteria->compare('Id', $this->Id);
        $criteria->compare('Sku', $this->Sku, true);
        $criteria->compare('Name', $this->Name, true);
        $criteria->compare('Description', $this->Description, true);
        $criteria->compare('Image', $this->Image, true);
        $criteria->compare('InStock', $this->InStock, true);
        $criteria->compare('Price', $this->Price, true);
        $criteria->compare('IncomingPrice', $this->IncomingPrice, true);
        $criteria->compare('IncomingCurrency', $this->IncomingCurrency, true);
        $criteria->compare('IncomingCurrencyRate', $this->IncomingCurrencyRate, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Products the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
