<?php
  require_once("model/map_Model.php");
  require_once("view/map_View.php");

  class MapController {
    private $view;
    private $model;

    public function __construct() {
      $this->view = new MapView();
      $this->model = new MapModel();
    }

    public function showBase() {
      $this->view->showWeb("templates/base.tpl");
    }

    public function showHome() {
      $this->view->showWeb("templates/home.tpl");
    }

    public function getInfoTwitter() {
      $resultado = $this->model->getInfoTwitter($_REQUEST['lat'],$_REQUEST['lng']);
      return count($resultado["statuses"]);
      //$this->view->showMapTwitter("templates/map.tpl", $resultado);
    }

  }
?>
