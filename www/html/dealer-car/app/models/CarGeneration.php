<?php

class CarGeneration extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $ID_CAR_GENERATION;

    /**
     *
     * @var string
     */
    public $name;

    /**
     *
     * @var string
     */
    public $year_begin;

    /**
     *
     * @var string
     */
    public $year_end;

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
     *
     * @var integer
     */
    public $FK_CAR_MODEL;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('ID_CAR_GENERATION', 'Car_serie', 'FK_CAR_GENERATION', array('alias' => 'Car_serie'));
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
            'ID_CAR_GENERATION' => 'ID_CAR_GENERATION', 
            'name' => 'name', 
            'year_begin' => 'year_begin', 
            'year_end' => 'year_end', 
            'status' => 'status', 
            'date_create' => 'date_create', 
            'date_update' => 'date_update', 
            'FK_CAR_MODEL' => 'FK_CAR_MODEL'
        );
    }

}
