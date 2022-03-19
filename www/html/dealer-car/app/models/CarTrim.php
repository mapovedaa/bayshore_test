<?php

class CarTrim extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $ID_CAR_TRIM;

    /**
     *
     * @var string
     */
    protected $name;

    /**
     *
     * @var integer
     */
    protected $start_production_year;

    /**
     *
     * @var integer
     */
    protected $end_production_year;

    /**
     *
     * @var integer
     */
    protected $FK_CAR_MODEL;

    /**
     *
     * @var integer
     */
    protected $FK_CAR_SERIE;

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
     * Method to set the value of field ID_CAR_TRIM
     *
     * @param integer $ID_CAR_TRIM
     * @return $this
     */
    public function setIdCarTrim($ID_CAR_TRIM)
    {
        $this->ID_CAR_TRIM = $ID_CAR_TRIM;

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
     * Method to set the value of field start_production_year
     *
     * @param integer $start_production_year
     * @return $this
     */
    public function setStartProductionYear($start_production_year)
    {
        $this->start_production_year = $start_production_year;

        return $this;
    }

    /**
     * Method to set the value of field end_production_year
     *
     * @param integer $end_production_year
     * @return $this
     */
    public function setEndProductionYear($end_production_year)
    {
        $this->end_production_year = $end_production_year;

        return $this;
    }

    /**
     * Method to set the value of field FK_CAR_MODEL
     *
     * @param integer $FK_CAR_MODEL
     * @return $this
     */
    public function setFkCarModel($FK_CAR_MODEL)
    {
        $this->FK_CAR_MODEL = $FK_CAR_MODEL;

        return $this;
    }

    /**
     * Method to set the value of field FK_CAR_SERIE
     *
     * @param integer $FK_CAR_SERIE
     * @return $this
     */
    public function setFkCarSerie($FK_CAR_SERIE)
    {
        $this->FK_CAR_SERIE = $FK_CAR_SERIE;

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
     * Returns the value of field ID_CAR_TRIM
     *
     * @return integer
     */
    public function getIdCarTrim()
    {
        return $this->ID_CAR_TRIM;
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
     * Returns the value of field start_production_year
     *
     * @return integer
     */
    public function getStartProductionYear()
    {
        return $this->start_production_year;
    }

    /**
     * Returns the value of field end_production_year
     *
     * @return integer
     */
    public function getEndProductionYear()
    {
        return $this->end_production_year;
    }

    /**
     * Returns the value of field FK_CAR_MODEL
     *
     * @return integer
     */
    public function getFkCarModel()
    {
        return $this->FK_CAR_MODEL;
    }

    /**
     * Returns the value of field FK_CAR_SERIE
     *
     * @return integer
     */
    public function getFkCarSerie()
    {
        return $this->FK_CAR_SERIE;
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
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('ID_CAR_TRIM', 'Car_spec_value', 'FK_CAR_TRIM', array('alias' => 'Car_spec_value'));
        $this->belongsTo('FK_CAR_MODEL', 'Car_model', 'ID_CAR_MODEL', array('alias' => 'Car_model'));
        $this->belongsTo('FK_CAR_SERIE', 'Car_serie', 'ID_CAR_SERIE', array('alias' => 'Car_serie'));
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
            'ID_CAR_TRIM' => 'ID_CAR_TRIM', 
            'name' => 'name', 
            'start_production_year' => 'start_production_year', 
            'end_production_year' => 'end_production_year', 
            'FK_CAR_MODEL' => 'FK_CAR_MODEL', 
            'FK_CAR_SERIE' => 'FK_CAR_SERIE', 
            'status' => 'status', 
            'date_create' => 'date_create', 
            'date_update' => 'date_update'
        );
    }

}
