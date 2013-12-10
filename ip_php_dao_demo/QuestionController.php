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
  // the data to give to the view
  private $data;
  
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
 
  public function submitAnswer() {
    //answering a question
    $dbc = DB::withConfig();
    $type = $_GET["type"];
    $qid = $_GET["qid"];
    $user = $_SESSION["user"];
    
    if ($type == "free") {
      $dao = new FreeAnswerDAO($dbc);
      $answer = new FreeAnswer(null, 
                                $_POST["freeAnswer"],
                                $user->getId(),
                                $_GET["qid"]);
      $this->fQuestionIndex();
    } else {
      //TODO for the choice answers
    }
    $ok = $dao->insert($answer);
    
#    $this->data["answer"] = $answer;
    $this->data["ok"] = $ok;
    $this->view->setData($this->data);
	
	//redirection
    //header('Location: index_router.php?page=lessons&id='.$_GET["cid"]);
  }

  public function fQuestionIndex() {
    $dbc = DB::withConfig();
    $qid = $_GET["qid"];

    $dao = new FreeQuestionDAO($dbc);
    $question = $dao->get($qid);
    $this->data["question"] = $question;
    $this->view->setData($this->data);
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
  
  /**
  * Returns all the questions created in the lesson on an array
  **/
  public function lessonQuestions($lessonId) {
    $dbc = DB::withConfig();
    $dao = new FreeQuestionDAO($dbc);
    
    $questions = $dao->getByLesson($lessonId);
    
    return $questions;
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
  
  //return all the questions related to a lesson and a student, seperating answered and unanswered questions
  public function studentQuestions($lessonId, $studentId) {
    $dbc = DB::withConfig();
    $dao = new FreeQuestionDAO($dbc);
    
    $answered = $dao->getAnsweredQuestions($studentId, $lessonId);
    $unanswered = $dao->getUnansweredQuestions($studentId, $lessonId);
    
    $data = array( "answered" => $answered, "unanswered" => $unanswered);
    return $data;
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
  
  public function questionCreate() {
	//displays the page questionCreateView
  }	
  
  public function questionCreatePost() {
	//handles the post request
	
	$dbc = DB::withConfig();
    
    $dao = new FreeQuestionDAO($dbc);
    $fquestion = new FreeQuestion(null, $_POST["title"],$_POST["correction"],$_GET["lid"]);
    $ok = $dao->insert($fquestion);
       
    $data = array( "ok" => $ok);
    $this->view->setData($data);
	
	//redirection towards the lessons page related to the course
	header('Location: index_router.php?page=lessons&id='.$_GET["cid"]);
  }

	public function questionDetails() {
		//displays the page questionDetailsView
		$questionId = $_GET["qid"];
		
		
		$dbc = DB::withConfig();
		$qdao = new FreeQuestionDAO($dbc);
		$adao = new FreeAnswerDAO($dbc);
		
		//info on question
		$question = $qdao->get($questionId);
		$answers = $adao->getByQuestion($questionId);
		
		$data = array("question" => $question, "answers" => $answers);
		$this->view->setData($data);
	}
  
 }

?>
