<?php

class Params extends ModelFoodout
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    public $id;

    /**
     *
     * @var string
     * @Column(type="string", length=64, nullable=false)
     */
    public $param;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $value;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $version;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id', 'ParamsLog', 'param_id', ['alias' => 'ParamsLog']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'params';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Params[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Params
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
