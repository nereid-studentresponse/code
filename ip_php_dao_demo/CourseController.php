<?php

require_once "DB.php";

require_once "Student.php";
require_once "Course.php";
require_once "CourseDAO.php";
require_once "StudentDAO.php";

/**
 * Controller for both student and teacher
 */
class CourseController {
  
  private $view;
  
  public function __construct($view) {
    $this->view = $view;
  }
  
  public function courseIndex() {
    $user = $_SESSION['user'];
    
    $dbc = new DB('localhost', 'srs', 'interpro', 'utGvWqeYyQb5rMZm');
    $dao = new CourseDAO($dbc);
    
    // if the current logged in user is a student
    if ($user instanceof Student) {
      $courses = $dao->getByStudent($user);
    }
    
    $data = array( "courses" => $courses);
    $this->view->setData($data);
  }
  
  public function courseEnroll() {
    // TODO : put the list of courses of all courses available minus the courses of the user
    $dbc = new DB('localhost', 'srs', 'interpro', 'utGvWqeYyQb5rMZm');
    $dao = new CourseDAO($dbc);
    
    $user = $_SESSION['user'];
    
    $courses = $dao->getAvailableByStudent($user);
    
    $data = array( "courses" => $courses);
    $this->view->setData($data);
  }
  
  public function courseEnrollPost() {
    // debug
    //error_log(print_r($_POST, true));
    $enroll = $_POST["enroll"];
    $user = $_SESSION["user"];
    
    $dbc = new DB('localhost', 'srs', 'interpro', 'utGvWqeYyQb5rMZm');
    $sdao = new StudentDAO($dbc);
    
    foreach ($enroll as &$courseid) {
      // we just need the id to enroll a student.
      $dummyCourse = new Course($courseid, "dummy", "dummy");
      $sdao->enrollCourse($user, $dummyCourse);
    }
    
  }
}
?>
