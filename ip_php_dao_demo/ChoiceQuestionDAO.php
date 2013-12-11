<?php

include_once "DB.php";
include_once "ChoiceQuestion.php";


class ChoiceQuestionDAO {

  private $dbh; // This is an instance of Class_DB to be injected in the functions.
  private $table=NULL;

  function __construct($dbh){
      $this->dbh=$dbh;
  }
  function dbConnect(){
      $dbConnection=$this->dbh->createConnexion();
      return $dbConnection;
  }

  function get($id) {
 
   $dbConnection=$this->dbConnect();
   $query=$dbConnection->prepare("SELECT * FROM choicequestion WHERE id = :id ");
   $query->bindParam(':id', $id);
   $query->execute();
   $result=$query->fetch(PDO::FETCH_ASSOC);
  
   $choicequestion = new ChoiceQuestion($result['id'], $result['title'], $result['id_correct_choice'], $result['id_lesson']);
   
   return $choicequestion;
   
  }

  function insert($choicequestion) {
    $dbConnection=$this->dbConnect();
    $query=$dbConnection->prepare("INSERT INTO `choicequestion` (`title`, `id_correct_choice`, `id_lesson`) VALUES ( :title, :correct, :id_lesson) ");
    $query->bindParam(':title', $choicequestion->getTitle());
    $query->bindParam(':correct', $choicequestion->getCorrectChoiceId());
	$query->bindParam(':id_lesson', $choicequestion->getLessonId());
    $count = $query->execute();
    
    return $count > 0;
  }
  
 function getByLesson($lessonId) {
    $dbConnection=$this->dbConnect();
    $query=$dbConnection->prepare("SELECT * FROM choicequestion WHERE id_lesson= :lid ");
    $query->bindParam(':lid', $lessonId);
    $query->execute();
    $result=$query->fetchAll();
     
    $choicequestionArray = array();
    $arrayCounter = 0;
    
    foreach ($result as &$row) {
      $tempChoicequestion = new ChoiceQuestion($row['id'], $row['title'], $row['id_correct_choice'], $row['id_lesson']);
      $choicequestionArray[$arrayCounter] = $tempChoicequestion;
      $arrayCounter++;
    }

    return $choicequestionArray;
  }
  
  function getUnansweredQuestions($studentId,$lessonId) {
    $dbConnection=$this->dbConnect();
    $query=$dbConnection->prepare("SELECT q.id, q.title, q.id_correct_choice, q.id_lesson FROM choicequestion q WHERE q.id NOT IN (SELECT a.id_question FROM choiceanswer a WHERE a.id_student = :sid) AND q.id_lesson = :lid ");
	$query->bindParam(':sid', $studentId);
    $query->bindParam(':lid', $lessonId);
    $query->execute();
    $result=$query->fetchAll();
     
    $choicequestionArray = array();
    $arrayCounter = 0;
    
    foreach ($result as &$row) {
      $tempChoicequestion = new ChoiceQuestion($row['id'], $row['title'], $row['id_correct_choice'], $row['id_lesson']);
      $choicequestionArray[$arrayCounter] = $tempChoicequestion;
      $arrayCounter++;
    }

    return $choicequestionArray;
  }
  
  function getAnsweredQuestions($studentId,$lessonId) {
    $dbConnection=$this->dbConnect();
    $query=$dbConnection->prepare("SELECT q.id, q.title, q.id_correct_choice, q.id_lesson FROM choicequestion q WHERE q.id IN (SELECT a.id_question FROM choiceanswer a WHERE a.id_student = :sid) AND q.id_lesson = :lid ");
	$query->bindParam(':sid', $studentId);
    $query->bindParam(':lid', $lessonId);
    $query->execute();
    $result=$query->fetchAll();
     
    $choicequestionArray = array();
    $arrayCounter = 0;
    
    foreach ($result as &$row) {
      $tempChoicequestion = new ChoiceQuestion($row['id'], $row['title'], $row['id_correct_choice'], $row['id_lesson']);
      $choicequestionArray[$arrayCounter] = $tempChoicequestion;
      $arrayCounter++;
    }

    return $choicequestionArray;
  }

}

?>
