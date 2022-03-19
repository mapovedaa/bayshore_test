<?php

class CarSpecification extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $ID_CAR_SPECIFICATION;

    /**
     *
     * @var string
     */
    public $name;

    /**
     *
     * @var integer
     */
    public $FK_PARENT;

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
        $this->hasMany('ID_CAR_SPECIFICATION', 'Car_spec_value', 'FK_CAR_SPECIFICATION', array('alias' => 'Car_spec_value'));
        $this->hasMany('ID_CAR_SPECIFICATION', 'Car_specification', 'FK_PARENT', array('alias' => 'Car_specification'));
        $this->belongsTo('FK_PARENT', 'Car_specification', 'ID_CAR_SPECIFICATION', array('alias' => 'Car_specification'));
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
            'ID_CAR_SPECIFICATION' => 'ID_CAR_SPECIFICATION', 
            'name' => 'name', 
            'FK_PARENT' => 'FK_PARENT', 
            'status' => 'status', 
            'date_create' => 'date_create', 
            'date_update' => 'date_update'
        );
    }

}
