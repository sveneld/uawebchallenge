<?php
/**
 * Created by JetBrains PhpStorm.
 * User: serj
 * Date: 11.01.14
 * Time: 18:02
 * To change this template use File | Settings | File Templates.
 */

/**
 * Базовий класс для основних моделей
 * Class WBaseMap
 */
abstract class WBaseMap extends CFormModel
{
    private $_validator = array();
    private $waring = array();
    private $info = array();
    private $_params = array();

    /**
     * Навсякий випадок хай буде
     * @param string $method
     * @param array $parameters
     * @return mixed
     * @throws WException
     */
//    public function __call($method, $parameters)
//    {
//        if(!method_exists($this, $method)){
//            throw new WException('вавава');
//        }
//
//        return $this->{'_' . $method}();
//    }

    /**
     * Заповняє атрибути моделі
     * @param array $values
     * @param bool $safeOnly
     */
    public function setAttributes($values, $safeOnly = true)
    {
        if (!is_array($values)) {
            return;
        }

        foreach ($values as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }

    /**
     * Додає повідомлення
     * @param $name
     * @param $message
     */
    final protected function addInfo($name, $message)
    {
        if (empty($name)) {
            $this->info[] = $message;
        } else {
            $this->info[$name][] = $message;
        }
    }

    /**
     * Віддає повідомлення
     * @return array
     */
    final public function getInfo()
    {
        return $this->info;
    }

    /**
     * Додає попередження
     * @param $name
     * @param $message
     */
    final protected function addWarning($name, $message)
    {
        if (empty($name)) {
            $this->waring[] = $message;
        } else {
            $this->waring[$name][] = $message;
        }
    }

    /**
     * Віддає попередження
     * @return array
     */
    final public function getWarning()
    {
        return $this->waring;
    }

    // Віддає валідатор головному валідатору
    public function rules()
    {
        return $this->_validator;
    }

    /**
     * Валідує метод
     * @param $name
     * @return $this
     */
    public function methodValidate($name)
    {
        $this->initialization();
        $validators = $this->getValidator();
        if (method_exists($this, 'getValidator') && array_key_exists($name, $validators)) {
            $this->_validator = $validators[$name];
        } else {
            $this->_validator = array();
        }
        $this->validate();

        return $this;
    }

    /**
     * Додає параметр для внутрішніх потреб
     * @param $name
     * @param $value
     */
    final protected function _addParam($name, $value)
    {
        $this->_params[$name] = $value;
    }

    /**
     * Бере параметр для внутрішніх потреб
     * @param $name
     * @return bool
     */
    final protected function _getParam($name)
    {
        if (empty($this->_params[$name])) {
            return false;
        }

        return $this->_params[$name];
    }


    /**
     * ДОРОБИТИ
     * Метод ініціалізує об'єкти в масивах
     */
    public function initialization()
    {
        if (method_exists($this, 'getInitialization')) {
            $attributes = $this->getInitialization();

            foreach ($attributes as $attribute => $item) {
                if (!empty($this->$attribute)) {
                    foreach ($this->$attribute as $keyAttribute => &$object) {
                        try {
                            if (!$object instanceof $item['Owner']) {
                                $object = (array)$object;
                                if (empty($object))
                                    break;
                                $owner = new $item['Owner']();
                                $create = true;
                                foreach ($item['Id'] as $id) {
                                    if (!empty($object[$id]))
                                        $owner->$id = $object[$id];
                                    else
                                        $create = false;
                                }
                                if ($create)
                                    $owner->create();
                                foreach ($object as $key => $value)
                                    $owner->$key = $value;
                                $object = $owner;
                                $owner->initialization();
                            }
                        } catch (Exception $e) {
                            $object = null;
                            $this->addError($attribute, "Object {$keyAttribute} removed. It has the wrong format");
                        }
                    }
                }
            }
        }

        return $this;
    }

    /**
     * Додає помилки ActiveRecord до загального масива помилок
     * @param CActiveRecord $model
     * @return bool
     */
    protected function hasARErrors(CActiveRecord $model)
    {
        if ($model->errors)
            return true;
        foreach ($model->errors as $key => $error)
            $this->addError($key, $error);
        return false;
    }

    /**
     * Присвоює атрибути ActiveRecord, даній моделі. Присвоює лише тим атрибутам, які є в моделі
     * @param CActiveRecord $attributes
     * @param null $class
     * @return $this|null|WBaseMap.
     */
    protected function setARAttributes(CActiveRecord $attributes, $class = null)
    {
        if ($attributes) {
            if($class)
                $class = new $class();
            else
                $class = $this;
            foreach ($attributes as $key => $value) {
                $key = ucfirst($key);
                if (property_exists($class, $key))
                    $class->$key = $value;
            }
            return $class;
        }
        return $this;
    }

    /**
     * Встанавлює помилку, якщо елемент false
     * Використовується, коли не знайдено елемент ActiveRecord
     * @param $model
     * @param string $massageError - яку додати помилку
     * @param string $keyError - до якого атрибута додати
     * @return bool
     */
    protected function nullIsAR($model, $massageError = 'No find model', $keyError = 'model')
    {
        if ($model)
            return false;
        $this->addError($keyError, $massageError);
        return true;
    }

    protected function setCache($key, $value = false)
    {
        if(!$value)
            $value = $this;
        WCache::setCache($key, $value);
    }

    protected function getCache($key, $fillThis = true)
    {
        $result = WCache::getCache($key);
        if(!$result)
            return null;
        if($fillThis){
            foreach($result as $keyItem => $item){
                $this->$keyItem = $item;
            }
        }
        return $result;
    }

    protected function deleteCache($key)
    {
        return WCache::deleteCache($key);
    }
}