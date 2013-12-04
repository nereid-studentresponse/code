<?php

require_once "LessonDAO.php";
require_once "CourseDAO.php"
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
    $dbc = new DB('localhost', 'srs', 'interpro', 'utGvWqeYyQb5rMZm');
    
	$dao = new LessonDAO($dbc)
	$lesson = new Lesson(null, $_POST["title"],$_POST["subject"],$_POST["document_url"],$_POST["course_id"]);
	$ok = $dao->insert($lesson);
	   
    $data = array( "ok" => $ok);
    $this->view->setData($data);
	
  }
  
}
?>
