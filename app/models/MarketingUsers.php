<?php

use Phalcon\Mvc\Model\Validator\Email as Email;

class MarketingUsers extends ModelFoodout
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
     * @Column(type="string", length=84, nullable=true)
     */
    public $firstname;

    /**
     *
     * @var string
     * @Column(type="string", length=84, nullable=true)
     */
    public $lastname;

    /**
     *
     * @var string
     * @Column(type="string", length=64, nullable=false)
     */
    public $city;

    /**
     *
     * @var string
     * @Column(type="string", length=16, nullable=false)
     */
    public $phone;

    /**
     *
     * @var string
     * @Column(type="string", length=128, nullable=false)
     */
    public $email;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $created_at;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $birth_date;

    /**
     *
     * @var string
     * @Column(type="string", length=254, nullable=true)
     */
    public $entry_key;

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
        return 'marketing_users';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return MarketingUsers[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return MarketingUsers
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
