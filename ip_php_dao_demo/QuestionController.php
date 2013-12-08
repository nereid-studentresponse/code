<?php

require_once "FreeQuestionDAO.php";
require_once "FreeAnswerDAO.php";
require_once "DB.php";

require_once "FreeQuestion.php";
require_once "FreeAnswer.php";

require_once "Student.php";

/**
 * Controller for questions
 */
class QuestionController {

  private $view;
  
  public function __construct($view) {
    $this->view = $view;
  }
  
  public function createFreeQuestion() {
   
    $dbc = DB::withConfig();
    
	$dao = new FreeQuestionDAO($dbc);
	$fquestion = new FreeQuestion(null, $_POST["title"],$_POST["correction"],$_POST["id_lesson"]);
	$ok = $dao->insert($fquestion);
	   
    $data = array( "ok" => $ok);
    $this->view->setData($data);
	
  }
 
  public function createFreeAnswer() {
	//answering a question
    $dbc = DB::withConfig();
    
	$dao = new FreeAnswerDAO($dbc);
	$fanswer = new FreeAnswer(null, $_POST["text"],$_POST["id_student"],$_POST["id_question"]);
	$ok = $dao->insert($fanswer);
	   
    $data = array( "ok" => $ok);
    $this->view->setData($data);
	
  }

  public function teacherQuestionsIndex() {
  //This function displays all the questions that the teacher has written in a certain lesson
	$lessonId = $_GET["lesson_id"];
    $dbc = DB::withConfig();
    $dao = new FreeQuestionDAO($dbc);
    
    $questions = $dao->getByLesson($lessonId);
    
    $data = array( "questions" => $questions);
    $this->view->setData($data);
  }
  
  public function studentQuestionsIndex() {
	$lessonId = $_GET["lesson_id"];
	$studentId = $_SESSION['user']->getId();
	
    $dbc = DB::withConfig();
    $dao = new FreeQuestionDAO($dbc);
    
    $answered = $dao->getAnsweredQuestions($studentId, $lessonId);
	$unanswered = $dao->getUnansweredQuestions($studentId, $lessonId);
    
    $data = array( "answered" => $answered, "unanswered" => $unanswered);
    $this->view->setData($data);
  }
  
  public function teacherAnswersIndex() {
  //This function displays all the answers that the teacher has received from a certain question
	$questionId = $_GET["question_id"];
    $dbc = DB::withConfig();
    
	$dao = new FreeAnswerDAO($dbc);
    
    $answers = $dao->getByQuestion($questionId);
    
    $data = array( "answers" => $answers);
    $this->view->setData($data);
  }
  
 }

?>
