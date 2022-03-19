<?php

class CarSerie extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $ID_CAR_SERIE;

    /**
     *
     * @var string
     */
    public $name;

    /**
     *
     * @var integer
     */
    public $FK_CAR_GENERATION;

    /**
     *
     * @var integer
     */
    public $FK_CAR_MODEL;

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
        $this->hasMany('ID_CAR_SERIE', 'Car_trim', 'FK_CAR_SERIE', array('alias' => 'Car_trim'));
        $this->belongsTo('FK_CAR_GENERATION', 'Car_generation', 'ID_CAR_GENERATION', array('alias' => 'Car_generation'));
        $this->belongsTo('FK_CAR_MODEL', 'Car_model', 'ID_CAR_MODEL', array('alias' => 'Car_model'));
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
            'ID_CAR_SERIE' => 'ID_CAR_SERIE', 
            'name' => 'name', 
            'FK_CAR_GENERATION' => 'FK_CAR_GENERATION', 
            'FK_CAR_MODEL' => 'FK_CAR_MODEL', 
            'status' => 'status', 
            'date_create' => 'date_create', 
            'date_update' => 'date_update'
        );
    }

}
