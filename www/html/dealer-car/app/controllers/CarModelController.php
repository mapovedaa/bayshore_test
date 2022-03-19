<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class CarModelController extends ControllerBase
{

    /**
     * Index action
     */
    public function indexAction(){
        $this->view->car_models = CarModel::find();
    }

    /**
     * Searches for car_model
     */
    public function searchAction()
    {

        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "CarModel", $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "ID_CAR_MODEL";

        $car_model = CarModel::find($parameters);
        if (count($car_model) == 0) {
            $this->flash->notice("The search did not find any car_model");

            return $this->dispatcher->forward(array(
                "controller" => "car_model",
                "action" => "index"
            ));
        }

        $paginator = new Paginator(array(
            "data" => $car_model,
            "limit"=> 10,
            "page" => $numberPage
        ));

        $this->view->page = $paginator->getPaginate();
    }

    /**
     * Displays the creation form
     */
    public function newAction(){
        $this->view->car_makes = CarMake::find();
    }

    /**
     * Edits a car_model
     *
     * @param string $ID_CAR_MODEL
     */
    public function editAction($ID_CAR_MODEL)
    {

        if (!$this->request->isPost()) {

            $car_model = CarModel::findFirstByID_CAR_MODEL($ID_CAR_MODEL);
            if (!$car_model) {
                $this->flash->error("car_model was not found");

                return $this->dispatcher->forward(array(
                    "controller" => "car_model",
                    "action" => "index"
                ));
            }

            $this->view->ID_CAR_MODEL = $car_model->ID_CAR_MODEL;
            $this->view->car_makes = CarMake::find();
            $this->view->FK_CAR_MAKE = $car_model->getFkCarMake();

            $this->tag->setDefault("ID_CAR_MODEL", $car_model->getIdCarModel());
            $this->tag->setDefault("name", $car_model->getName());
            $this->tag->setDefault("status", $car_model->getStatus());
            $this->tag->setDefault("FK_CAR_MAKE", $car_model->getFkCarMake());
            
        }
    }

    /**
     * Creates a new car_model
     */
    public function createAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "car_model",
                "action" => "index"
            ));
        }

        $car_model = new CarModel();

        $car_model->name = $this->request->getPost("name");
        $car_model->status = 1;
        $car_model->date_create = date('Y/m/d h:i:s', time());
        $car_model->date_update = null;
        $car_model->FK_CAR_MAKE = $this->request->getPost("FK_CAR_MAKE");
        

        if (!$car_model->save()) {
            foreach ($car_model->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "car_model",
                "action" => "new"
            ));
        }

        $this->flash->success("car_model was created successfully");

        return $this->dispatcher->forward(array(
            "controller" => "car_model",
            "action" => "index"
        ));

    }

    /**
     * Saves a car_model edited
     *
     */
    public function saveAction(){
        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "car_model",
                "action" => "index"
            ));
        }

        $ID_CAR_MODEL = $this->request->getPost("ID_CAR_MODEL");

        $car_model = CarModel::findFirstByID_CAR_MODEL($ID_CAR_MODEL);
        if (!$car_model) {
            $this->flash->error("car_model does not exist " . $ID_CAR_MODEL);

            return $this->dispatcher->forward(array(
                "controller" => "car_model",
                "action" => "index"
            ));
        }

        $car_model->name = $this->request->getPost("name");
        $car_model->status = $this->request->getPost("status");
        $car_model->date_update =  date('Y/m/d h:i:s', time());
        $car_model->FK_CAR_MAKE = $this->request->getPost("FK_CAR_MAKE");
        
        if (!$car_model->save()) {

            foreach ($car_model->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "car_model",
                "action" => "edit",
                "params" => array($car_model->ID_CAR_MODEL)
            ));
        }

        $this->flash->success("car_model was updated successfully");

        return $this->dispatcher->forward(array(
            "controller" => "car_model",
            "action" => "index"
        ));

    }

    /**
     * Deletes a car_model
     *
     * @param string $ID_CAR_MODEL
     */
    public function deleteAction($ID_CAR_MODEL)
    {

        $car_model = CarModel::findFirstByID_CAR_MODEL($ID_CAR_MODEL);
        if (!$car_model) {
            $this->flash->error("car_model was not found");

            return $this->dispatcher->forward(array(
                "controller" => "car_model",
                "action" => "index"
            ));
        }

        if (!$car_model->delete()) {

            foreach ($car_model->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "car_model",
                "action" => "search"
            ));
        }

        $this->flash->success("car_model was deleted successfully");

        return $this->dispatcher->forward(array(
            "controller" => "car_model",
            "action" => "index"
        ));
    }

}
