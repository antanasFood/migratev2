<?php

class FoodCategory extends ModelFoodout
{

    protected $LOCALIZED_TABLE = 'food_categories_localized';

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
    public $place_id;

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
     * @Column(type="string", length=45, nullable=false)
     */
    public $name;

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
     * @var integer
     * @Column(type="integer", length=1, nullable=false)
     */
    public $drinks;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=false)
     */
    public $alcohol;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $lineup;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=true)
     */
    public $texts_only;

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
//        $this->hasMany('id', 'ComboDiscount', 'dish_category', ['alias' => 'ComboDiscount']);
//        $this->hasMany('id', 'FoodCategoriesLocalized', 'object_id', ['alias' => 'FoodCategoriesLocalized']);
//        $this->hasMany('id', 'FoodCategoryDishMap', 'foodcategory_id', ['alias' => 'FoodCategoryDishMap']);
//        $this->belongsTo('deleted_by', 'FosUser', 'id', ['alias' => 'FosUser']);
//        $this->belongsTo('edited_by', 'FosUser', 'id', ['alias' => 'FosUser']);
//        $this->belongsTo('place_id', 'Place', 'id', ['alias' => 'Place']);
//        $this->belongsTo('created_by', 'FosUser', 'id', ['alias' => 'FosUser']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'food_category';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return FoodCategory[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return FoodCategory
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
