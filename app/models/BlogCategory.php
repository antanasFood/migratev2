<?php

class BlogCategory extends \Phalcon\Mvc\Model
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
    public $title;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $language;

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
    public $seo_title;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $seo_description;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $order_no;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id', 'BlogPost', 'category_id', ['alias' => 'BlogPost']);
        $this->belongsTo('deleted_by', 'FosUser', 'id', ['alias' => 'FosUser']);
        $this->belongsTo('edited_by', 'FosUser', 'id', ['alias' => 'FosUser']);
        $this->belongsTo('created_by', 'FosUser', 'id', ['alias' => 'FosUser']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'blog_category';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return BlogCategory[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return BlogCategory
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
