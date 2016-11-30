<?php
  require_once("libs/Smarty.class.php");

  class MapView {
    private $smarty;

    function __construct() {
      $this->smarty = new Smarty();
    }

    public function showWeb($nameWeb) {
      $this->smarty->display($nameWeb);
    }

    public function loadHash($info) {
      $this->smarty->assign('data',$info);
      $this->smarty->display("../templates/response.tpl");
    }

  }

?>
