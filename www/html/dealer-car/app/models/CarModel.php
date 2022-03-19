<?php

use Phalcon\Mvc\Model;

class CarModel extends Model{

    /**
     *
     * @var integer
     */
    protected $ID_CAR_MODEL;

    /**
     *
     * @var string
     */
    protected $name;

    /**
     *
     * @var integer
     */
    protected $status;

    /**
     *
     * @var string
     */
    protected $date_create;

    /**
     *
     * @var string
     */
    protected $date_update;

    /**
     *
     * @var integer
     */
    protected $FK_CAR_MAKE;

    /**
     * Method to set the value of field ID_CAR_MODEL
     *
     * @param integer $ID_CAR_MODEL
     * @return $this
     */
    public function setIdCarModel($ID_CAR_MODEL)
    {
        $this->ID_CAR_MODEL = $ID_CAR_MODEL;

        return $this;
    }

    /**
     * Method to set the value of field name
     *
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Method to set the value of field status
     *
     * @param integer $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Method to set the value of field date_create
     *
     * @param string $date_create
     * @return $this
     */
    public function setDateCreate($date_create)
    {
        $this->date_create = $date_create;

        return $this;
    }

    /**
     * Method to set the value of field date_update
     *
     * @param string $date_update
     * @return $this
     */
    public function setDateUpdate($date_update)
    {
        $this->date_update = $date_update;

        return $this;
    }

    /**
     * Method to set the value of field FK_CAR_MAKE
     *
     * @param integer $FK_CAR_MAKE
     * @return $this
     */
    public function setFkCarMake($FK_CAR_MAKE)
    {
        $this->FK_CAR_MAKE = $FK_CAR_MAKE;

        return $this;
    }

    /**
     * Returns the value of field ID_CAR_MODEL
     *
     * @return integer
     */
    public function getIdCarModel()
    {
        return $this->ID_CAR_MODEL;
    }

    /**
     * Returns the value of field name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns the value of field status
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Returns the value of field date_create
     *
     * @return string
     */
    public function getDateCreate()
    {
        return $this->date_create;
    }

    /**
     * Returns the value of field date_update
     *
     * @return string
     */
    public function getDateUpdate()
    {
        return $this->date_update;
    }

    /**
     * Returns the value of field FK_CAR_MAKE
     *
     * @return integer
     */
    public function getFkCarMake()
    {
        return $this->FK_CAR_MAKE;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('ID_CAR_MODEL', 'Car_serie', 'FK_CAR_MODEL', array('alias' => 'Car_serie'));
        $this->hasMany('ID_CAR_MODEL', 'Car_trim', 'FK_CAR_MODEL', array('alias' => 'Car_trim'));
        $this->belongsTo('FK_CAR_MAKE', 'Car_make', 'ID_CAR_MAKE', array('alias' => 'Car_make'));
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
            'ID_CAR_MODEL' => 'ID_CAR_MODEL', 
            'name' => 'name', 
            'status' => 'status', 
            'date_create' => 'date_create', 
            'date_update' => 'date_update', 
            'FK_CAR_MAKE' => 'FK_CAR_MAKE'
        );
    }

}
