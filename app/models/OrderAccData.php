<?php

class OrderAccData extends ModelFoodout
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
     * @Column(type="integer", length=11, nullable=false)
     */
    public $order_id;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $date;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $time;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $delivery_date;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $delivery_time;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $staff;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $chain;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $restaurant;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $restaurant_address;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $driver;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $delivery_type;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $client_name;

    /**
     *
     * @var integer
     * @Column(type="integer", length=6, nullable=false)
     */
    public $is_delivered;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $delivery_address;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $city;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $country;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $payment_type;

    /**
     *
     * @var double
     * @Column(type="double", length=8, nullable=false)
     */
    public $food_amount;

    /**
     *
     * @var double
     * @Column(type="double", length=8, nullable=false)
     */
    public $food_amount_eur;

    /**
     *
     * @var double
     * @Column(type="double", length=8, nullable=false)
     */
    public $food_vat;

    /**
     *
     * @var double
     * @Column(type="double", length=8, nullable=false)
     */
    public $drinks_amount;

    /**
     *
     * @var double
     * @Column(type="double", length=8, nullable=false)
     */
    public $drinks_amount_eur;

    /**
     *
     * @var double
     * @Column(type="double", length=8, nullable=false)
     */
    public $drinks_vat;

    /**
     *
     * @var double
     * @Column(type="double", length=8, nullable=false)
     */
    public $alcohol_amount;

    /**
     *
     * @var double
     * @Column(type="double", length=8, nullable=false)
     */
    public $alcohol_amount_eur;

    /**
     *
     * @var double
     * @Column(type="double", length=8, nullable=false)
     */
    public $alcohol_vat;

    /**
     *
     * @var double
     * @Column(type="double", length=8, nullable=false)
     */
    public $delivery_amount;

    /**
     *
     * @var double
     * @Column(type="double", length=8, nullable=false)
     */
    public $delivery_amount_eur;

    /**
     *
     * @var double
     * @Column(type="double", length=8, nullable=false)
     */
    public $delivery_vat;

    /**
     *
     * @var double
     * @Column(type="double", length=8, nullable=false)
     */
    public $gift_card_amount;

    /**
     *
     * @var double
     * @Column(type="double", length=8, nullable=false)
     */
    public $gift_card_amount_eur;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $discount_type;

    /**
     *
     * @var double
     * @Column(type="double", length=8, nullable=false)
     */
    public $discount_amount;

    /**
     *
     * @var double
     * @Column(type="double", length=8, nullable=false)
     */
    public $discount_amount_eur;

    /**
     *
     * @var double
     * @Column(type="double", length=8, nullable=false)
     */
    public $discount_percent;

    /**
     *
     * @var double
     * @Column(type="double", length=8, nullable=false)
     */
    public $total_amount;

    /**
     *
     * @var double
     * @Column(type="double", length=8, nullable=false)
     */
    public $total_amount_eur;

    /**
     *
     * @var integer
     * @Column(type="integer", length=6, nullable=false)
     */
    public $is_synced;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $sync_timestamp;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $version;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'order_acc_data';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return OrderAccData[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return OrderAccData
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
