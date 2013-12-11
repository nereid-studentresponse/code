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
	$user = $_SESSION['user'];
	
	$dbc = DB::withConfig();
    $dao = new LessonDAO($dbc);
    $questionController = new QuestionController(null);
    
    $lessons = $dao->getByCourse($courseId);
	
	$questions = array();
	
	// if the current logged in user is a student
    if ($user instanceof Student) {
		$userType = "student";
		
		$counter = 0;
		foreach ($lessons as &$lesson) {
			$questions[$counter] = $questionController->studentQuestions($lesson->getId(), $user->getId());
			$counter++;
		}
    } else {
		$userType = "teacher";
		$counter = 0;
		foreach ($lessons as &$lesson) {
			$questions[$counter] = $questionController->lessonQuestions($lesson->getId());
			$counter++;
		}
	}
    
    $data = array( "lessons" => $lessons, "questions" => $questions, "userType" => $userType );
    $this->view->setData($data);
  }
  
  	//displays the lessonCreateView
	public function lessonCreate() {

	}
	
  public function lessonCreatePost() {
    // debug
    //error_log(print_r($_POST, true));

	$dbc = DB::withConfig();
	$ldao = new LessonDAO($dbc);
		
	// handle file
	$new_name = 'document_' . date('Y-m-d-H-i-s') . '_' . uniqid();
	$extension = substr(strrchr($_FILES["file"][name], "."),1);
    move_uploaded_file($_FILES["file"]["tmp_name"], "files/" . $new_name . "." . $extension);
		
	$newLesson = new Lesson(null, $_POST["title"], $_POST["subject"], "files/". $new_name . "." .$extension, $_GET["id"]);
	
	$ldao->insert($newLesson);

    //redirection towards the lessons page related to the course
	header('Location: index_router.php?page=lessons&id='.$_GET["id"]);
  }
  
 }


?>
