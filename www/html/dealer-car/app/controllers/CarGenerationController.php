<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class CarGenerationController extends ControllerBase
{

    /**
     * Index action
     */
    public function indexAction(){
        $this->view->car_generations = CarGeneration::find();
    }

    /**
     * Searches for car_generation
     */
    public function searchAction()
    {

        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "CarGeneration", $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "ID_CAR_GENERATION";

        $car_generation = CarGeneration::find($parameters);
        if (count($car_generation) == 0) {
            $this->flash->notice("The search did not find any car_generation");

            return $this->dispatcher->forward(array(
                "controller" => "car_generation",
                "action" => "index"
            ));
        }

        $paginator = new Paginator(array(
            "data" => $car_generation,
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
     * Edits a car_generation
     *
     * @param string $ID_CAR_GENERATION
     */
    public function editAction($ID_CAR_GENERATION)
    {

        if (!$this->request->isPost()) {

            $car_generation = CarGeneration::findFirstByID_CAR_GENERATION($ID_CAR_GENERATION);
            if (!$car_generation) {
                $this->flash->error("car_generation was not found");

                return $this->dispatcher->forward(array(
                    "controller" => "car_generation",
                    "action" => "index"
                ));
            }

            $this->view->ID_CAR_GENERATION = $car_generation->ID_CAR_GENERATION;
            $this->view->car_models = CarModel::find();

            $this->tag->setDefault("ID_CAR_GENERATION", $car_generation->ID_CAR_GENERATION);
            $this->tag->setDefault("name", $car_generation->name);
            $this->tag->setDefault("year_begin", $car_generation->year_begin);
            $this->tag->setDefault("year_end", $car_generation->year_end);
            $this->tag->setDefault("status", $car_generation->status);
            $this->tag->setDefault("date_create", $car_generation->date_create);
            $this->tag->setDefault("date_update", $car_generation->date_update);
            $this->tag->setDefault("FK_CAR_MODEL", $car_generation->FK_CAR_MODEL);
            
        }
    }

    /**
     * Creates a new car_generation
     */
    public function createAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "car_generation",
                "action" => "index"
            ));
        }

        $car_generation = new CarGeneration();

        $car_generation->name = $this->request->getPost("name");
        $car_generation->year_begin = $this->request->getPost("year_begin");
        $car_generation->year_end = $this->request->getPost("year_end");
        $car_generation->status = 1;
        $car_generation->date_create = date('Y/m/d h:i:s', time());
        $car_generation->date_update = null;
        $car_generation->FK_CAR_MODEL = $this->request->getPost("FK_CAR_MODEL");
        

        if (!$car_generation->save()) {
            foreach ($car_generation->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "car_generation",
                "action" => "new"
            ));
        }

        $this->flash->success("car_generation was created successfully");

        return $this->dispatcher->forward(array(
            "controller" => "car_generation",
            "action" => "index"
        ));

    }

    /**
     * Saves a car_generation edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "car_generation",
                "action" => "index"
            ));
        }

        $ID_CAR_GENERATION = $this->request->getPost("ID_CAR_GENERATION");

        $car_generation = CarGeneration::findFirstByID_CAR_GENERATION($ID_CAR_GENERATION);
        if (!$car_generation) {
            $this->flash->error("car_generation does not exist " . $ID_CAR_GENERATION);

            return $this->dispatcher->forward(array(
                "controller" => "car_generation",
                "action" => "index"
            ));
        }

        $car_generation->name = $this->request->getPost("name");
        $car_generation->year_begin = $this->request->getPost("year_begin");
        $car_generation->year_end = $this->request->getPost("year_end");
        $car_generation->status = $this->request->getPost("status");
        $car_generation->date_update = date('Y/m/d h:i:s', time());
        $car_generation->FK_CAR_MODEL = $this->request->getPost("FK_CAR_MODEL");
        

        if (!$car_generation->save()) {

            foreach ($car_generation->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "car_generation",
                "action" => "edit",
                "params" => array($car_generation->ID_CAR_GENERATION)
            ));
        }

        $this->flash->success("car_generation was updated successfully");

        return $this->dispatcher->forward(array(
            "controller" => "car_generation",
            "action" => "index"
        ));

    }

    /**
     * Deletes a car_generation
     *
     * @param string $ID_CAR_GENERATION
     */
    public function deleteAction($ID_CAR_GENERATION)
    {

        $car_generation = CarGeneration::findFirstByID_CAR_GENERATION($ID_CAR_GENERATION);
        if (!$car_generation) {
            $this->flash->error("car_generation was not found");

            return $this->dispatcher->forward(array(
                "controller" => "car_generation",
                "action" => "index"
            ));
        }

        if (!$car_generation->delete()) {

            foreach ($car_generation->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "car_generation",
                "action" => "search"
            ));
        }

        $this->flash->success("car_generation was deleted successfully");

        return $this->dispatcher->forward(array(
            "controller" => "car_generation",
            "action" => "index"
        ));
    }

}
