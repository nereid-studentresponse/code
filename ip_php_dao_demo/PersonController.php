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

    $dbc = DB::withConfig();
    
    $ok = true;
    error_log($personType);
    if($personType == "student") {
      $dao = new StudentDAO($dbc);
      // TODO have a better security for the password
      $person = new Student(null, $_POST["firstName"] . ' ' . $_POST["lastName"], 
                              $_POST["mail"], $this->hashPass($_POST["password"]), 
                              $_POST["year"]);
    } else if($personType == "teacher") {
      error_log("Teacher");
      $dao = new TeacherDAO($dbc);
      $person = new Teacher(null, $_POST["firstName"] . ' ' . $_POST["lastName"], 
                              $_POST["mail"], $this->hashPass($_POST["password"]), 
                              $_POST["speciality"]);
    } else {
      // new type of person?
      $ok = false;
      error_log("none");
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

  public function loginIndex() {
    // nothing to do here, just displaying the page in the router
  }
  
  /**
  * function called after post on loginView.php 
  */
  public function login() {
    // call for authentication
    // if not ok : return on page loginView.php
    
    //TODO lowercase?
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    //new way to get the DB
    $dbc = DB::withConfig();
    $dao = new StudentDAO($dbc);
    $person = $dao->getByEmail($email);
    // TODO check if the email actually exists
    if (!$person) {
      $dao = new TeacherDAO($dbc);
      $person = $dao->getByEmail($email);
      //debug
      //error_log('Teacher '. print_r($person, true));
    }
    //debug
    //error_log('Person '. print_r($person, true));
    
    if ($this->checkPass($password, $person->getPassword())) {
      session_start();
      $_SESSION['user'] = $person;
      //if ok : go on page courses
      header('Location: index_router.php?page=myCourses');
    } else {
      header('Location: index_router.php?page=login');
    }
    
    exit();
  }

  public function logout() {
    session_destroy();
    $data = array( "ok" => true);
    $this->view->setData($data);
  }


  /**
   * just sha1 for now, but we can upgrade it to a more secure function
   */
  private function hashPass($password) {
    return sha1($password);
  }

  /**
   * Returns true if the password matches the hashed one
   */
  private function checkPass($plainTextPwd, $hashedPwd) {
    return $this->hashPass($plainTextPwd) == $hashedPwd;
  }
}
?>
