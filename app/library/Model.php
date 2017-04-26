<?php

class Model extends \Phalcon\Mvc\Model
{
    /**
     * default database field id
     * @unsigned int
     */
    public $id;

    /**
     * default database field dateCreated
     * @datetime
     */
    public $dateCreated = '0000-00-00 00:00:00';

    /**
     * default database field dateUpdated
     * @datetime
     */
    public $dateUpdated = '0000-00-00 00:00:00';

    public function initialize()
    {
        //~ $this->keepSnapshots(true);
        $this->skipAttributesOnUpdate(['id']);
    }

    public function __get($arg)
    {
        if (method_exists($this, 'get'.ucfirst($arg))) {
            return $this->{'get'.ucfirst($arg)}();
        //~ } elseif (!empty($this->languageFields) && in_array($arg, $this->languageFields)) {
            //~ return $this->{'get'.ucfirst($arg)}();
        } elseif (isset($this->{$arg})) {
            return $this->{$arg};
        }

        return parent::__get($arg);
    }

//    ~ public function __call($method, $arguments = null)
//    ~ {
//        ~ if (stripos($method, 'get') !== false) {
//            ~ $lcName = lcfirst(substr($method, 3));
//            ~ if (in_array($lcName, $this->languageFields)) {
//                ~ $language = $this->getRelated('Language', [$this->getLanguageColumnIndex().'='.LANGID])->getFirst();
//                ~ if ($language) {
//                    ~ foreach ($this->languageFields as $field) {
//                        ~ $this->$field = $language->$field;
//                    ~ }
//                    ~ $return = $this->$lcName;
//                    ~ return $return;
//                ~ }
//            ~ }
//        ~ }
//        ~ $return = parent::__call($method, $arguments);
//        ~ return $return;
//    ~ }

//    /*
//     * prototypes & methods
//     * listed in http://docs.phalconphp.com/en/latest/reference/models.html#events-and-events-manager order
//     */
//    public function beforeValidation()
//    {
//    }
//
//    public function beforeValidationOnCreate()
//    {
//        $columns = $this->getDI()->get('db')->describeColumns($this->getSource());
//        foreach ($columns as $column) {
//            if ('deleted' == $column->getName()) {
//                if (empty($this->deleted) || !in_array($this->deleted, [0, 1])) {
//                    $this->deleted = 0;
//                }
//
//                break;
//            }
//        }
//    }
//
//    public function beforeValidationOnUpdate()
//    {
//    }
//
//    public function onValidationFails()
//    {
//    }
//
//    public function afterValidationOnCreate()
//    {
//    }
//
//    public function afterValidationOnUpdate()
//    {
//    }
//
//    public function afterValidation()
//    {
//    }
//
//    public function beforeSave()
//    {
//    }
//
//    public function beforeUpdate()
//    {
//    }
//
//    public function beforeCreate()
//    {
//    }
//
//    public function afterUpdate()
//    {
//    }
//
//    public function afterCreate()
//    {
//    }
//
//    public function afterSave()
//    {
//        $this->_clearCache($this->getDI());
//    }
//
//    public function afterFetch()
//    {
//    }
//
//    public function afterSaveSuccessfully()
//    {
//    }
//
//    /*
//     * prototypes & methods
//     * listed in http://docs.phalconphp.com/en/latest/reference/models.html#deleting-records order
//     */
//    public function beforeDelete()
//    {
//        //~ if (!empty($this->router)) {
//            //~ $this->router->delete();
//        //~ }
//    }
//
//    public function afterDelete()
//    {
//        $this->_clearCache($this->getDI());
//    }
//
//    protected function _clearCache($di)
//    {
//    }
//
//    /*
//     * @url http://docs.phalconphp.com/en/latest/reference/models.html#validation-failed-events
//     */
//    public function notSave()
//    {
//    }
//
//    public function validation()
//    {
//        return !$this->validationHasFailed();
//    }
//
//    public function recover()
//    {
//        $this->deleted = 0;
//        $this->save();
//    }
//
//    public function getId()
//    {
//        return $this->id;
//    }
//
//    public function setId($id)
//    {
//        $this->id = (int)$id;
//        return $this;
//    }
//
//    //~ public function saveLanguages($data = null, $whiteList = null)
//    //~ {
//        //~ $this->_languagesSaved = true;
//        //~ $languageColumnIndex = $this->getLanguageColumnIndex();
//        //~ foreach (Language::getActiveLanguages() as $language) {
//            //~ if (!($modelLanguage = $this->getRelated('Language', [$languageColumnIndex.'='.$language->id])->getFirst())) {
//                //~ $modelLanguage = $this->_createNewLanguage();
//                //~ $modelLanguage->$languageColumnIndex = $language->id;
//            //~ }
//            //~ foreach ($this->languageFields as $field) {
//                //~ if (isset($data[$field.'['.$language->id.']'])) {
//                    //~ $modelLanguage->$field = $data[$field.'['.$language->id.']'];
//                //~ }
//            //~ }
//
//            //~ $modelLanguage->save();
//        //~ }
//    //~ }
//
//    //~ protected function _createNewLanguage()
//    //~ {
//        //~ $modelName = $this->modelsManager->getRelationByAlias(get_class($this), 'Language')->getReferencedModel();
//        //~ $model = new $modelName;
//        //~ $model->{$this->modelsManager->getRelationByAlias(get_class($this), 'Language')->getReferencedFields()} = $this->id;
//        //~ return $model;
//    //~ }
//
//    //~ public function getLanguageColumnIndex()
//    //~ {
//        //~ return $this->modelsManager->getRelationByAlias(get_class($this->_createNewLanguage()), 'Language')->getFields();
//    //~ }
//
//    public function setDynamicUpdate($flag = true)
//    {
//        $this->useDynamicUpdate($flag);
//        return $this;
//    }
//
//    //~ public function checkUnique($field, $value, $where = false)
//    //~ {
//        //~ if (empty($where)) {
//            //~ $where = '1=1';
//        //~ }
//        //~ $condition = $field.' = :value:'.(($this->id) ? ' AND id != '.$this->id : '').' AND '.$where;
//        //~ if (self::count([$condition, 'bind' => ['value' => (string)$value]])) {
//            //~ return false;
//        //~ }
//
//        //~ return true;
//    //~ }
//
//    //~ public function getSaveLanguage()
//    //~ {
//        //~ return $this->_saveLanguage;
//    //~ }
//
//    //~ public function setSaveLanguage($flag = true)
//    //~ {
//        //~ $this->_saveLanguage = (boolean) $flag;
//        //~ return $this;
//    //~ }
//
//    public function enable()
//    {
//        $this->active = 1;
//        return $this->save();
//    }
//
//    public function disable()
//    {
//        $this->active = 0;
//        return $this->save();
//    }
//
    public function create($data = null, $whiteList = null)
    {
        $this->_data = $data;
        if (!parent::create($data, $whiteList)) {
            foreach ($this->getMessages() as $message) {
                throw new \Exception($message);
            }
        }

        return $this;
    }

//    public function update($data = null, $whiteList = null)
//    {
//        $this->_data = $data;
//        if (!parent::update($data, $whiteList)) {
//            foreach ($this->getMessages() as $message) {
//                throw new \Exception($message);
//            }
//        }
//
//        return $this;
//    }
//
//    public function save($data = null, $whiteList = null)
//    {
//        if (!parent::save($data, $whiteList)) {
//            foreach ($this->getMessages() as $message) {
//                throw new \Exception($message);
//            }
//        }
//
//        //~ if (!$this->_languagesSaved && $this->getSaveLanguage() && count($this->languageFields)) {
//            //~ $this->saveLanguages(($this->_data) ?: $data, $whiteList);
//        //~ }
//
//        return $this;
//    }
//
//    public function delete()
//    {
//        if (!parent::delete()) {
//            foreach ($this->getMessages() as $message) {
//                throw new \Exception($message);
//            }
//        }
//
//        return $this;
//    }

     public static function find($parameters = null)
     {
         return parent::find(self::_prepareBinds($parameters));
     }


     public static function findFirst($parameters = null)
     {
         return parent::findFirst(self::_prepareBinds($parameters));
     }

    //~ public static function sum($parameters = null)
    //~ {
        //~ return parent::sum(self::_prepareBinds($parameters));
    //~ }

    //~ public static function count($parameters = null)
    //~ {
        //~ return parent::count(self::_prepareBinds($parameters));
    //~ }

    //~ public static function average($parameters = null)
    //~ {
        //~ return parent::average(self::_prepareBinds($parameters));
    //~ }

    //~ public static function findActive($parameters = null)
    //~ {
        //~ if (is_string($parameters)) {
            //~ $parameters .= ' AND active = 1';
        //~ } elseif (is_array($parameters)) {
            //~ if (isset($parameters[0])) {
                //~ $parameters[0] .= ' AND active = 1';
            //~ } else {
                //~ $parameters[0] = 'active = 1';
            //~ }
        //~ } else {
            //~ $parameters = 'active = 1';
        //~ }
        //~ return parent::find($parameters);
    //~ }

    /*
     * FROM:
     * 0 => string 'id IN (:ids:)' (length=13)
     * 'bind' =>
     *   array (size=1)
     *     'ids' =>
     *       array (size=4)
     *         0 => int 15
     *         1 => int 17
     *         2 => int 18
     *         3 => int 19
     * 'for_update' => boolean true
     *
     * TO:
     * 0 => &string 'id IN (?0, ?1, ?2, ?3)' (length=22)
     * 'bind' =>
     *   array (size=4)
     *     0 => int 15
     *     1 => int 17
     *     2 => int 18
     *     3 => int 19
     * 'for_update' => boolean true
     */
     private static function _prepareBinds($parameters = null)
    {
        // binding is allowed only in array
        if (!is_array($parameters)) {
            return $parameters;
        }

        // getting conditions from 0 or conditions parameter
        if (!empty($parameters['conditions'])) {
            $conditions =& $parameters['conditions'];
        } elseif (!empty($parameters[0]))
            $conditions =& $parameters[0];
        else {
            $conditions = '';
        }

        // finding largest already set placeholder to avoid conflicts
        if (preg_match('/.*\?(\d+)/', $conditions, $matches)) {
            $i = $matches[1] + 1;
        } else {
            $i = 0;
        }

        /*
         * check if exists bind and replace all arrays to ?0 ?1 etc
         */
        if (!empty($parameters['bind'])) {
            foreach ($parameters['bind'] as $key => $binded) {
                if (is_array($binded)) {
                    $placeholders = [];
                    $binds = [];
                    foreach ($binded as $bind) {
                        $placeholders[] = '?'.$i;
                        $parameters['bind'][$i] = $bind;
                        $i++;
                    }
                    unset($parameters['bind'][$key]);
                    $conditions = str_replace(':'.$key.':', implode(', ', $placeholders), $conditions);
                }
            }
         }

         return $parameters;
     }

    //~ public function formatDateTime($format, $field)
    //~ {
        //~ return date($format, strtotime($this->{$field}));
    //~ }

    protected static function _getCache()
    {
        return Di::getDefault()->get('modelsCache');
    }

    protected function _registerDateCreatedBehavior()
    {
        $this->addBehavior(
            new Timestampable([
                'beforeCreate' => [
                    'field'  => 'dateCreated',
                    'format' => 'Y-m-d H:i:s'
                ]
            ])
        );

        return $this;
    }

    protected function _registerDateUpdatedBehavior()
    {
        $this->addBehavior(
            new Timestampable([
                'beforeUpdate' => [
                    'field'  => 'dateUpdated',
                    'format' => 'Y-m-d H:i:s'
                ]
            ])
        );

        return $this;
    }
}
