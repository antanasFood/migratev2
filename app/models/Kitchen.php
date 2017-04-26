<?php

class Kitchen extends ModelFoodout
{
    protected $LOCALIZED_TABLE = 'kitchen_localized';

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
     * @Column(type="string", length=100, nullable=true)
     */
    public $logo;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=false)
     */
    public $visible;

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
    public $alias;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $meta_description;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $meta_title;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $slug;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
//        $this->hasMany('id', 'KitchenLocalized', 'object_id', ['alias' => 'KitchenLocalized']);
//        $this->hasMany('id', 'PlaceKitchen', 'kitchen_id', ['alias' => 'PlaceKitchen']);
//        $this->belongsTo('deleted_by', 'FosUser', 'id', ['alias' => 'FosUser']);
//        $this->belongsTo('edited_by', 'FosUser', 'id', ['alias' => 'FosUser']);
//        $this->belongsTo('created_by', 'FosUser', 'id', ['alias' => 'FosUser']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'kitchen';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Kitchen[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Kitchen
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
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
