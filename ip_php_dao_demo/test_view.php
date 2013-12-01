<?php

require_once "RegisteredView.php";


$view = new RegisteredView();

$data = array( "ok" => true);
$view->setData($data);
echo $view->output();


?>
