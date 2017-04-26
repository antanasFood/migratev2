<?php

class Place extends ModelFoodout
{

    protected $LOCALIZED_TABLE = 'place_localized';


    /**
     *
     * @var integer
     * @Primary
     * @Identi ty
     * @Column(type="integer", length=11, nullable=false)
     */
    public $id;

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
    public $name;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $logo;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=false)
     */
    public $active;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
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
     * @Column(type="string", length=255, nullable=true)
     */
    public $slogan;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $description;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=false)
     */
    public $recommended;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=false)
     */
    public $new;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $delivery_price;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $delivery_time;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $cart_minimum;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=false)
     */
    public $self_delivery;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $average_rating;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $delivery_time_info;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=false)
     */
    public $min_on_self;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=false)
     */
    public $card_on_delivery;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $alcohol_rules;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=false)
     */
    public $disabled_online_payment;

    /**
     *
     * @var string
     * @Column(type="string", length=10, nullable=true)
     */
    public $chain;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=false)
     */
    public $navision;

    /**
     *
     * @var string
     * @Column(type="string", length=64, nullable=false)
     */
    public $delivery_options;

    /**
     *
     * @var integer
     * @Column(type="integer", length=6, nullable=true)
     */
    public $priority;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=false)
     */
    public $only_alcohol;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=false)
     */
    public $send_invoice;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=true)
     */
    public $discount_prices_enabled;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $review_count;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $delivery_price_old;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $cart_minimum_old;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=true)
     */
    public $top;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=true)
     */
    public $show_notification;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $notification_content;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $pickup_time;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $basket_limit_food;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $basket_limit_drinks;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=true)
     */
    public $disabled_payment_on_delivery;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=true)
     */
    public $auto_inform;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=true)
     */
    public $dishes_numeration;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=true)
     */
    public $allow_free_delivery;


    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $city_id;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $minimum_free_delivery_price;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $slug;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'place';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Place[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Place
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

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

}
