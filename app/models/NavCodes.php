<?php

class NavCodes extends ModelFoodout
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
     * @Column(type="string", length=30, nullable=true)
     */
    public $timestamp;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=true)
     */
    public $code;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=true)
     */
    public $city;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=true)
     */
    public $search_city;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $city_id;
    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'nav_codes';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return NavCodes[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return NavCodes
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    /**
     * @return int
     */
    public function getCityId()
    {
        return $this->city_id;
    }

    /**
     * @param int $city_id
     */
    public function setCityId($city_id)
    {
        $this->city_id = $city_id;
    }

}
