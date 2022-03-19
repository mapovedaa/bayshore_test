<?php

use Phalcon\Mvc\Model;

class CarMake extends Model{

    /**
     *
     * @var integer
     */
    public $ID_CAR_MAKE;

    /**
     *
     * @var string
     */
    public $name;

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
        $this->hasMany('ID_CAR_MAKE', 'Car_model', 'FK_CAR_MAKE', array('alias' => 'Car_model'));
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
            'ID_CAR_MAKE' => 'ID_CAR_MAKE', 
            'name' => 'name', 
            'status' => 'status', 
            'date_create' => 'date_create', 
            'date_update' => 'date_update'
        );
    }

}
