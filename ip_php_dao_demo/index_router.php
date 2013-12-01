<?php
// views
require_once "RegisterView.php";
require_once "RegisteredView.php";

// controllers
require_once"PersonController.php";

$page = $_GET['page'];
if (!empty($page)) {
 
    // array for the get actions (i.e. usually display some information)
    $get = array(
        'register' => array('view' => 'RegisterView', 
                            'controller' => 'PersonController', 
                            'action' => 'registerIndex')
    );
    
    // array for the post actions (i.e. usually submit information)
    $post = array(
        'register' => array('view' => 'RegisteredView', 
                            'controller' => 'PersonController', 
                            'action' => 'createPerson')
    );
    
    // will have the array corresponding to the desired action
    $data;
    
    // for debug purpose only
    //echo $_SERVER['REQUEST_METHOD'];
    
    switch ($_SERVER['REQUEST_METHOD']) {
      case 'GET':
        $data = $get;
        break;
      case 'POST':
        $data = $post;
        break;
    }
    

    // selecting the right view, controller and action
    foreach($data as $key => $components){
        if ($page == $key) {
            $view = $components['view'];
            $controller = $components['controller'];
            $action = $components['action'];
            break;
        }
    }

    // calling the controller method to generate the data and displaying the view
    if (isset($view)) {
        $v = new $view();
        $c = new $controller($v);
        $c->$action();
        echo $v->output();
    }
}
?>
