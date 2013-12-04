<?php
// views
require_once "RegisterView.php";
require_once "RegisteredView.php";
require_once "LoginView.php";
require_once "CourseView.php";
require_once "CourseEnrollView.php";
require_once "LoggedOutView.php";


// controllers
require_once "PersonController.php";
require_once "CourseController.php";

$page = $_GET['page'];
if (!empty($page)) {
 
    /** array for the get actions (i.e. usually display some information)
     * view: view to use when the action is complete
     * controller: controller related to the page
     * action: method to call in the controller
     * auth: true if the path requires authentication
     */
    $get = array(
        'register' => array('view' => 'RegisterView', 
                            'controller' => 'PersonController', 
                            'action' => 'registerIndex',
                            'auth' => false),
		    'login' => array('view' => 'LoginView', 
                            'controller' => 'PersonController', 
                            'action' => 'loginIndex',
                            'auth' => false),
		    'myCourses' => array('view' => 'CourseView', 
                            'controller' => 'CourseController', 
                            'action' => 'courseIndex',
                            'auth' => true),
			'enroll' => array('view' => 'CourseEnrollView', 
                            'controller' => 'CourseController', 
                            'action' => 'courseEnroll',
                            'auth' => true),
		    'logout' => array('view' => 'LoggedOutView', 
                            'controller' => 'PersonController', 
                            'action' => 'logout',
                            'auth' => true)
    );
    
    // array for the post actions (i.e. usually submit information)
    $post = array(
        'register' => array('view' => 'RegisteredView', 
                            'controller' => 'PersonController', 
                            'action' => 'createPerson',
                            'auth' => false),
		    'login' => array('view' => 'LoginView', 
                            'controller' => 'PersonController', 
                            'action' => 'login',
                            'auth' => false),
			'enroll' => array('view' => 'CourseView', 
                            'controller' => 'CourseController', 
                            'action' => 'courseEnrollPost',
                            'auth' => true),
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
            $auth = $components['auth'];
            break;
        }
    }

    //security!
    if ($auth) {
      session_start();
      // when a user is logged in, the session has the user in memory
      if (!isset($_SESSION['user'])) {
        // no user in the session, redirect to the login page
        header('Location: index_router.php?page=login');
        exit();
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
