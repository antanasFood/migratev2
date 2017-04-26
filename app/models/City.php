<?php

class City extends ModelFoodout
{


    protected $LOCALIZED_FIELD = ['title', 'meta_title', 'meta_description', '~slug'];
    protected $LOCALIZED_TABLE = 'city_localized';
    protected $SLUG_TYPE = 'city';

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
     * @Column(type="string", length=255, nullable=false)
     */
    public $title;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true, length=255)
     */
    public $meta_title;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $meta_description;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $slug;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $zavalas_on;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $zavalas_time;

    /**
     *
     * @var string
     * @Column(type="string", length=128, nullable=true)
     */
    public $position;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=true)
     */
    public $active = 1;


    private $locale = null;


    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSource('city');
    }

    /**
     * @return null
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * @param null $locale
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;
    }

    /**
     * @return string
     */
    public function getSlugType()
    {
        return $this->SLUG_TYPE;
    }

    /**
     * @param string $SLUG_TYPE
     */
    public function setSlugType($SLUG_TYPE)
    {
        $this->SLUG_TYPE = $SLUG_TYPE;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
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
