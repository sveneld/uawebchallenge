<?php

class ProductModel extends DataContainerResponse
{

    public function getList($data)
    {
        $criteria = new CDbCriteria();
        $criteria->with = array('Category');
        if (!empty(Affiliate::getAllowed()->productCategories) && empty($data->IdCategory)) {
            $criteria->addInCondition('Category.IdCategory', Affiliate::getAllowed()->productCategories);
        }
        if (!empty($data->IdCategory)) {
            $criteria->addCondition('Category.IdCategory = :CategoryId');
            $criteria->params[':CategoryId'] = $data->IdCategory;
        }
        $result = YProduct::model()->cache(CACHE_LIFETIME)->findAll($criteria);
        foreach ($result as $item) {
            $row = new stdClass();
            $row->Id = $item->Id;
            $row->Sku = $item->Sku;
            $row->Name = $item->Name;
            $row->Description = $item->Description;
            $row->Image = $item->Image;
            $row->InStock = $item->InStock;
            $row->Price = $item->Price;
            $this->addData($row);
        }
        return $this;
    }

}