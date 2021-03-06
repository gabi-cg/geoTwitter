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
      $resultado = $this->model->getInfoTwitter($_REQUEST['lat'],$_REQUEST['lng']); // se obtienen los tweets dada una latitud y longitud
      $trendings = $this->model->getHashtags($resultado["statuses"]); //$resultado["statuses"] array de 100 elem devuelto por recurso de API Twitter
      $this->view->loadHash($trendings);
    }

  }
?>
