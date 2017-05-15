<?php

class SmsTemplate extends ModelFoodout
{

    protected $LOCALIZED_FIELD = ['text'];
    protected $LOCALIZED_TABLE = 'sms_template_localized';

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
    public $text;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $status;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $source;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=true)
     */
    public $preorder;

    /**
     *
     * @var string
     * @Column(type="string", length=16, nullable=true)
     */
    public $type;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=true)
     */
    public $active;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $deleted_at;


    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'sms_template';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return SmsTemplate[]|SmsTemplate
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return SmsTemplate
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
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


}
