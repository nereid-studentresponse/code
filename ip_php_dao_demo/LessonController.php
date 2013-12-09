<?php

require_once "LessonDAO.php";
require_once "CourseDAO.php";
require_once "DB.php";
require_once "QuestionController.php";

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
    $dbc = DB::withConfig();
    
    $dao = new LessonDAO($dbc);
    $lesson = new Lesson(null, $_POST["title"],$_POST["subject"],$_POST["document_url"],$_POST["course_id"]);
    $ok = $dao->insert($lesson);
       
    $data = array( "ok" => $ok);
    $this->view->setData($data);
    
  }
  

  public function lessonIndex() {
    $courseId = $_GET["id"];
    $studentId = $_SESSION['user']->getId();
    
    $dbc = DB::withConfig();
    $dao = new LessonDAO($dbc);
    $questionController = new QuestionController(null);
    
    $lessons = $dao->getByCourse($courseId);
    
    $questions = array();
    $counter = 0;
    foreach ($lessons as &$lesson) {
        $questions[$counter] = $questionController->studentQuestions($lesson->getId(), $studentId);
        $counter++;
    }
    
    $data = array( "lessons" => $lessons, "questions" => $questions);
    $this->view->setData($data);
  }
  
 }


?>
