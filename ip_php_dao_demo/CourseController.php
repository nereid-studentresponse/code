<?php

require_once "DB.php";

require_once "Student.php";
require_once "Course.php";
require_once "CourseDAO.php";
require_once "StudentDAO.php";
require_once "LessonDAO.php";

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
	// if the current logged in user is a student
    if ($user instanceof Student) {
		$userType = "student";
    } else {
		$userType = "teacher";
	}
	
	$courses = $this->currentUserCourses();
	
	$data = array( "courses" => $courses, "userType" => $userType);
	$this->view->setData($data);
  }
  
  public function courseEnroll() {
    // TODO : put the list of courses of all courses available minus the courses of the user
    $dbc = DB::withConfig();
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

    $dbc = DB::withConfig();
    $sdao = new StudentDAO($dbc);

    $ok = true;
    foreach ($enroll as &$courseid) {
      // we just need the id to enroll a student.
      $dummyCourse = new Course($courseid, "dummy", "dummy");
      $ok = $ok && $sdao->enrollCourse($user, $dummyCourse);
      

    }

      $data = array( "ok" => $ok);
      $courses = $this->currentUserCourses();
      $data = array( "courses" => $courses);
      $this->view->setData($data);
  }

  /**
   * Returns the courses of the current logged in user.
   * needs a user to be in the session
   */
  private function currentUserCourses() {
    $user = $_SESSION['user'];
  
    $dbc = DB::withConfig();
    $dao = new CourseDAO($dbc);
    $daoLesson = new LessonDAO($dbc);
  
    // if the current logged in user is a student
    if ($user instanceof Student) {
		$courses = $dao->getByStudent($user);
    } else {
		$courses = $dao->getByTeacher($user);
	}
	
    // TODO for the teacher
    return $courses;
  }

}
?>
