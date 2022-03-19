<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class CarMakeController extends ControllerBase
{

    /**
     * Index action
     */
    public function indexAction(){
        $this->view->car_makes = CarMake::find();
    }

    /**
     * Searches for car_make
     */
    public function searchAction()
    {

        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "CarMake", $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "ID_CAR_MAKE";

        $car_make = CarMake::find($parameters);
        if (count($car_make) == 0) {
            $this->flash->notice("The search did not find any car_make");

            return $this->dispatcher->forward(array(
                "controller" => "car_make",
                "action" => "index"
            ));
        }

        $paginator = new Paginator(array(
            "data" => $car_make,
            "limit"=> 10,
            "page" => $numberPage
        ));

        $this->view->page = $paginator->getPaginate();
    }

    /**
     * Displays the creation form
     */
    public function newAction()
    {

    }

    /**
     * Edits a car_make
     *
     * @param string $ID_CAR_MAKE
     */
    public function editAction($ID_CAR_MAKE){
        if (!$this->request->isPost()) {
            $car_make = CarMake::findFirstByID_CAR_MAKE($ID_CAR_MAKE);
            if (!$car_make) {
                $this->flash->error("car_make was not found");

                return $this->dispatcher->forward(array(
                    "controller" => "car_make",
                    "action" => "index"
                ));
            }

            $this->view->ID_CAR_MAKE = $car_make->ID_CAR_MAKE;

            $this->tag->setDefault("ID_CAR_MAKE", $car_make->ID_CAR_MAKE);
            $this->tag->setDefault("name", $car_make->name);
            $this->tag->setDefault("status", $car_make->status);
            $this->tag->setDefault("date_create", $car_make->date_create);
            $this->tag->setDefault("date_update", $car_make->date_update);
            
        }
    }

    /**
     * Creates a new car_make
     */
    public function createAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "car_make",
                "action" => "index"
            ));
        }

        $car_make = new CarMake();

        $car_make->name = $this->request->getPost("name");
        $car_make->status = 1;
        $car_make->date_create = date('Y/m/d h:i:s', time());
        $car_make->date_update = null;
        

        if (!$car_make->save()) {
            foreach ($car_make->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "car_make",
                "action" => "new"
            ));
        }

        $this->flash->success("car_make was created successfully");

        return $this->dispatcher->forward(array(
            "controller" => "car_make",
            "action" => "index"
        ));

    }

    /**
     * Saves a car_make edited
     *
     */
    public function saveAction(){
        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "car_make",
                "action" => "index"
            ));
        }
        
        $ID_CAR_MAKE = $this->request->getPost("ID_CAR_MAKE");
        $car_make = CarMake::findFirstByID_CAR_MAKE($ID_CAR_MAKE);
        if (!$car_make) {
            $this->flash->error("car_make does not exist " . $ID_CAR_MAKE);
            return $this->dispatcher->forward(array(
                "controller" => "car_make",
                "action" => "index"
            ));
        }

        $car_make->name = $this->request->getPost("name");
        $car_make->status = $this->request->getPost("status");
        $car_make->date_update = date('Y/m/d h:i:s', time());
        if (!$car_make->save()) {
            foreach ($car_make->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "car_make",
                "action" => "edit",
                "params" => array($car_make->ID_CAR_MAKE)
            ));
        }

        $this->flash->success("car_make was updated successfully");

        return $this->dispatcher->forward(array(
            "controller" => "car_make",
            "action" => "index"
        ));

    }

    /**
     * Deletes a car_make
     *
     * @param string $ID_CAR_MAKE
     */
    public function deleteAction($ID_CAR_MAKE)
    {

        $car_make = CarMake::findFirstByID_CAR_MAKE($ID_CAR_MAKE);
        if (!$car_make) {
            $this->flash->error("car_make was not found");

            return $this->dispatcher->forward(array(
                "controller" => "car_make",
                "action" => "index"
            ));
        }

        if (!$car_make->delete()) {

            foreach ($car_make->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "car_make",
                "action" => "index"
            ));
        }

        $this->flash->success("car_make was deleted successfully");

        return $this->dispatcher->forward(array(
            "controller" => "car_make",
            "action" => "index"
        ));
    }

}
