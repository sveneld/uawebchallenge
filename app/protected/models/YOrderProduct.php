<?php

/**
 * This is the model class for table "order_products".
 *
 * The followings are the available columns in table 'order_products':
 * @property string $IdOrder
 * @property string $IdProduct
 * @property string $Sku
 * @property string $Name
 * @property string $Quantity
 * @property string $Price
 * @property string $IncomingPrice
 * @property string $IncomingCurrency
 * @property string $IncomingCurrencyRate
 */
class YOrderProduct extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'order_products';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('IdOrder, IdProduct', 'required'),
            array('IdOrder, IdProduct, Quantity', 'length', 'max' => 10),
            array('Sku, Name', 'length', 'max' => 255),
            array('Price', 'length', 'max' => 15),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('IdOrder, IdProduct, Sku, Name, Quantity, Price, IncomingPrice, IncomingCurrency, IncomingCurrencyRate ', 'safe', 'on' => 'search'),
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
            'Product' => array(self::BELONGS_TO, 'YOrder', array('IdOrder' => 'Id')),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'IdOrder' => 'Id Order',
            'IdProduct' => 'Id Product',
            'Sku' => 'Sku',
            'Name' => 'Name',
            'Quantity' => 'Quantity',
            'Price' => 'Price',
            'IncomingPrice' => 'Incoming Price',
            'IncomingCurrency' => 'Incoming Currency',
            'IncomingCurrencyRate' => 'Incoming Currency Rate',
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

        $criteria->compare('IdOrder', $this->IdOrder, true);
        $criteria->compare('IdProduct', $this->IdProduct, true);
        $criteria->compare('Sku', $this->Sku, true);
        $criteria->compare('Name', $this->Name, true);
        $criteria->compare('Quantity', $this->Quantity, true);
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
     * @return OrderProducts the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
