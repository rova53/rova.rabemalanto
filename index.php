<?php
require("classes/Loader.php");
require("classes/BaseController.php");
require("Controler/Home.php");
require("Modele/Mysql.php");
require("Modele/image_zone_grise.php");
if(count($_GET) > 0)
$loader = new Loader($_GET);
else
$loader = new Loader($_POST);
$controller = $loader->CreateController();
$controller->ExecuteAction();