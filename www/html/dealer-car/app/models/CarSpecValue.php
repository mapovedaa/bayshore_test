<?php

class CarSpecValue extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $ID_CAR_SPEC_VALUE;

    /**
     *
     * @var integer
     */
    public $FK_CAR_TRIM;

    /**
     *
     * @var integer
     */
    public $FK_CAR_SPECIFICATION;

    /**
     *
     * @var string
     */
    public $value;

    /**
     *
     * @var string
     */
    public $unit;

    /**
     *
     * @var integer
     */
    public $status;

    /**
     *
     * @var string
     */
    public $date_create;

    /**
     *
     * @var string
     */
    public $date_update;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('FK_CAR_TRIM', 'Car_trim', 'ID_CAR_TRIM', array('alias' => 'Car_trim'));
        $this->belongsTo('FK_CAR_SPECIFICATION', 'Car_specification', 'ID_CAR_SPECIFICATION', array('alias' => 'Car_specification'));
    }

    /**
     * Independent Column Mapping.
     * Keys are the real names in the table and the values their names in the application
     *
     * @return array
     */
    public function columnMap()
    {
        return array(
            'ID_CAR_SPEC_VALUE' => 'ID_CAR_SPEC_VALUE', 
            'FK_CAR_TRIM' => 'FK_CAR_TRIM', 
            'FK_CAR_SPECIFICATION' => 'FK_CAR_SPECIFICATION', 
            'value' => 'value', 
            'unit' => 'unit', 
            'status' => 'status', 
            'date_create' => 'date_create', 
            'date_update' => 'date_update'
        );
    }

}
