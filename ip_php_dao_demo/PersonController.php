<?php

require_once "StudentDAO.php";
require_once "TeacherDAO.php";
require_once "DB.php";

require_once "Student.php";
require_once "Teacher.php";

/**
 * Controller for both student and teacher
 */
class PersonController {

  private $student;
  private $teacher;
  
  private $view;
  
  public function __construct($view) {
    $this->view = $view;
  }
  
  public function createPerson() {
    // get post data and use the dao to create the right person
    $personType = $_POST["status"];
    
    // TODO have the passwords and stuff in a config file
    $dbc = new DB('localhost', 'srs', 'interpro', 'utGvWqeYyQb5rMZm');
    
    $ok = true;
    
    if($personType == "student") {
      $dao = new StudentDAO($dbc);
      // TODO have a better security for the password
      $person = new Student(null, $_POST["firstName"] . ' ' . $_POST["lastName"], 
                              $_POST["mail"], sha1($_POST["password"]), $_POST["year"]);
    } else if($personType == "teacher") {
      $dao = new TeacherDAO($dbc);
      // TODO same for teacher
    } else {
      $ok = false;
    }
    
    if( $ok == true) {
      $ok = $dao->insert($person);
    }
    
    
    $data = array( "ok" => $ok);
    $this->view->setData($data);
  }
  
  public function registerIndex() {
    // nothing to do here, just displaying the page in the router
  }

}
?>
