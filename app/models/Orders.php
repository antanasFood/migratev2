<?php

class Orders extends ModelFoodout
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
    public $user_id;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $address_id;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=false)
     */
    public $order_status;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $order_date;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=true)
     */
    public $delivery_type;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $comment;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $place_comment;

    /**
     *
     * @var string
     * @Column(type="string", length=100, nullable=false)
     */
    public $order_hash;

    /**
     *
     * @var string
     * @Column(type="string", length=100, nullable=true)
     */
    public $payment_method;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $payment_status;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $submitted_for_payment;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $last_updated;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $last_payment_error;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $place_id;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $point_id;

    /**
     *
     * @var string
     * @Column(type="string", length=100, nullable=true)
     */
    public $place_name;

    /**
     *
     * @var string
     * @Column(type="string", length=100, nullable=true)
     */
    public $place_point_address;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $driver_id;

    /**
     *
     * @var string
     * @Column(type="string", length=100, nullable=true)
     */
    public $place_point_city;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=false)
     */
    public $place_point_self_delivery;

    /**
     *
     * @var string
     * @Column(type="string", length=4, nullable=false)
     */
    public $locale;

    /**
     *
     * @var double
     * @Column(type="double", length=8, nullable=true)
     */
    public $total;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $vat;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $accept_time;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $delivery_time;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=true)
     */
    public $is_delay;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $delay_duration;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $delay_reason;

    /**
     *
     * @var string
     * @Column(type="string", length=32, nullable=true)
     */
    public $user_ip;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $reminded;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $coupon;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $coupon_code;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $discount_size;

    /**
     *
     * @var double
     * @Column(type="double", length=8, nullable=true)
     */
    public $discount_sum;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $version;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=true)
     */
    public $mobile;

    /**
     *
     * @var string
     * @Column(type="string", length=4, nullable=true)
     */
    public $sf_series;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $sf_number;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=true)
     */
    public $nav_price_update;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=true)
     */
    public $nav_process_order;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=true)
     */
    public $company;

    /**
     *
     * @var string
     * @Column(type="string", length=160, nullable=true)
     */
    public $company_name;

    /**
     *
     * @var string
     * @Column(type="string", length=60, nullable=true)
     */
    public $company_code;

    /**
     *
     * @var string
     * @Column(type="string", length=60, nullable=true)
     */
    public $vat_code;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $company_address;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $delivery_price;

    /**
     *
     * @var string
     * @Column(type="string", length=20, nullable=true)
     */
    public $nav_delivery_order;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=true)
     */
    public $order_from_nav;

    /**
     *
     * @var string
     * @Column(type="string", length=10, nullable=true)
     */
    public $nav_driver_code;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=true)
     */
    public $late_order_informed;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=true)
     */
    public $client_contacted;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=true)
     */
    public $is_corporate_client;

    /**
     *
     * @var string
     * @Column(type="string", length=60, nullable=true)
     */
    public $division_code;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=true)
     */
    public $problem_solved;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=true)
     */
    public $order_picked;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=true)
     */
    public $preorder;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $completed_time;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=false)
     */
    public $newsletter_subscribe;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $assign_late;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $dispatcher_id;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=false)
     */
    public $place_informed;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=false)
     */
    public $driver_auto_assigned;

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
        return 'orders';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Orders[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Orders
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
