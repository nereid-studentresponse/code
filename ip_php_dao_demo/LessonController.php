<?php

require_once "LessonDAO.php";
require_once "CourseDAO.php";
require_once "DB.php";

require_once "Lesson.php";
require_once "Course.php";


/**
 * Controller for lessons
 */
class LessonController {

  private $lesson;
  private $course;
  
  private $view;
  
  public function __construct($view) {
    $this->view = $view;
  }
  
  public function createLesson() {
   
    
    // TODO have the passwords and stuff in a config file
    $dbc = new DB('localhost', 'srs', 'root', 'sunix');
    
	$dao = new LessonDAO($dbc);
	$lesson = new Lesson(null, $_POST["title"],$_POST["subject"],$_POST["document_url"],$_POST["course_id"]);
	$ok = $dao->insert($lesson);
	   
    $data = array( "ok" => $ok);
    $this->view->setData($data);
	
  }
  

  public function lessonIndex() {
  
  
    $course = new Course($_POST['id'], $_POST['title'], $_POST['description']); 
    $dbc = new DB('localhost', 'srs', 'root', 'sunix');
    $dao = new LessonDAO($dbc);
    
    $lessons = $dao->getByCourse($course);
    
    $data = array( "course" => $course, "lessons" => $lessons);
    $this->view->setData($data);
  }
  
 }


?>
