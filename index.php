<?php
  require_once("routing/configApp.php");
  require_once("controller/map_controller.php");

  $mapController = new MapController();

  if (!array_key_exists(ConfigApp::$ACTION, $_REQUEST)) {
    $mapController->showBase();
  } else {
    switch ($_REQUEST[ConfigApp::$ACTION]) {
      // Home del sitio
      case (ConfigApp::$ACTION_HOME):
        $mapController->showHome();
        break;
      case (ConfigApp::$ACTION_INFO_TWITTER):
        $mapController->getInfoTwitter();
        break;
      case (ConfigApp::$ACTION_FAQ):
        $mapController->showFAQ();
        break;
      default:
        // si no hizo match, muestro home
        $mapController->showHome();
    };
  };

?>
