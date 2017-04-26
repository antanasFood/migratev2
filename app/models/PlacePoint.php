<?php

use Phalcon\Mvc\Model\Validator\Email as Email;

class PlacePoint extends ModelFoodout
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
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $place;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $created_by;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $edited_by;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $deleted_by;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $address;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $city;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=false)
     */
    public $active;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $delivery_time;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=false)
     */
    public $pick_up;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=false)
     */
    public $delivery;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $created_at;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $edited_at;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $deleted_at;

    /**
     *
     * @var string
     * @Column(type="string", length=20, nullable=false)
     */
    public $phone;

    /**
     *
     * @var string
     * @Column(type="string", length=30, nullable=false)
     */
    public $lat;

    /**
     *
     * @var string
     * @Column(type="string", length=30, nullable=false)
     */
    public $lon;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=false)
     */
    public $fast;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=false)
     */
    public $public;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=false)
     */
    public $allow_cash;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=false)
     */
    public $allow_card;

    /**
     *
     * @var string
     * @Column(type="string", length=20, nullable=false)
     */
    public $company_code;

    /**
     *
     * @var string
     * @Column(type="string", length=128, nullable=true)
     */
    public $email;

    /**
     *
     * @var string
     * @Column(type="string", length=20, nullable=true)
     */
    public $alt_phone1;

    /**
     *
     * @var string
     * @Column(type="string", length=20, nullable=true)
     */
    public $alt_phone2;

    /**
     *
     * @var string
     * @Column(type="string", length=128, nullable=true)
     */
    public $alt_email1;

    /**
     *
     * @var string
     * @Column(type="string", length=128, nullable=true)
     */
    public $alt_email2;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $delivery_time_info;

    /**
     *
     * @var string
     * @Column(type="string", length=10, nullable=true)
     */
    public $internal_code;

    /**
     *
     * @var string
     * @Column(type="string", length=128, nullable=true)
     */
    public $invoice_email;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=false)
     */
    public $use_external_logistics;

    /**
     *
     * @var string
     * @Column(type="string", length=10, nullable=true)
     */
    public $parent_id;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=true)
     */
    public $no_replication;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $wd1;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $wd2;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $wd3;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $wd4;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $wd5;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $wd6;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $wd7;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $city_id;


    /**
     * Validations and business logic
     *
     * @return boolean
     */
    /*public function validation()
    {
        $this->validate(
            new Email(
                [
                    'field'    => 'email',
                    'required' => true,
                ]
            )
        );

        if ($this->validationHasFailed() == true) {
            return false;
        }

        return true;
    }
    */



    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'place_point';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return PlacePoint[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return PlacePoint
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
