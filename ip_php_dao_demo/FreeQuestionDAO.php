<?php

include_once "DB.php";
include_once "FreeQuestion.php";


class FreeQuestionDAO {

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
   $query=$dbConnection->prepare("SELECT * FROM freequestion WHERE id = :id ");
   $query->bindParam(':id', $id);
   $query->execute();
   $result=$query->fetch(PDO::FETCH_ASSOC);
  
   $fquestion = new FreeQuestion($result['id'], $result['title'], $result['correction'], $result['id_lesson']);
   
   return $fquestion;
   
  }

  function insert($fquestion) {
   

    $dbConnection=$this->dbConnect();
    $query=$dbConnection->prepare("INSERT INTO `freequestion` (`title`, `correction`, `id_lesson`) VALUES ( :title, :correction, :id_lesson) ");
    $query->bindParam(':title', $fquestion->getTitle());
    $query->bindParam(':correction', $fquestion->getCorrection());
	$query->bindParam(':id_lesson', $fquestion->getLessonId());
    $count = $query->execute();
    
    return $count > 0;
  }
  
 function getByLesson($lessonId) {
    $dbConnection=$this->dbConnect();
    $query=$dbConnection->prepare("SELECT * FROM freequestion WHERE id_lesson= :lid ");
    $query->bindParam(':lid', $lessonId);
    $query->execute();
    $result=$query->fetchAll();
     
    $fquestionArray = array();
    $arrayCounter = 0;
    
    foreach ($result as &$row) {
      $tempFquestion = new FreeQuestion($row['id'], $row['title'], $row['correction'], $row['id_lesson']);
      $fquestionArray[$arrayCounter] = $tempFquestion;
      $arrayCounter++;
    }

    return $fquestionArray;
  }
  
  function getUnansweredQuestions($studentId,$lessonId) {
    $dbConnection=$this->dbConnect();
    $query=$dbConnection->prepare("SELECT q.id, q.title, q.correction, q.id_lesson FROM freequestion q WHERE q.id NOT IN (SELECT a.id_question FROM freeanswer a WHERE a.id_student = :sid) AND q.id_lesson = :lid ");
	$query->bindParam(':sid', $studentId);
    $query->bindParam(':lid', $lessonId);
    $query->execute();
    $result=$query->fetchAll();
     
    $fquestionArray = array();
    $arrayCounter = 0;
    
    foreach ($result as &$row) {
      $tempFquestion = new FreeQuestion($row['id'], $row['title'], $row['correction'], $row['id_lesson']);
      $fquestionArray[$arrayCounter] = $tempFquestion;
      $arrayCounter++;
    }

    return $fquestionArray;
  }
  
  function getAnsweredQuestions($studentId,$lessonId) {
    $dbConnection=$this->dbConnect();
    $query=$dbConnection->prepare("SELECT q.id, q.title, q.correction, q.id_lesson FROM freequestion q WHERE q.id IN (SELECT a.id_question FROM freeanswer a WHERE a.id_student = :sid) AND q.id_lesson = :lid ");
	$query->bindParam(':sid', $studentId);
    $query->bindParam(':lid', $lessonId);
    $query->execute();
    $result=$query->fetchAll();
     
    $fquestionArray = array();
    $arrayCounter = 0;
    
    foreach ($result as &$row) {
      $tempFquestion = new FreeQuestion($row['id'], $row['title'], $row['correction'], $row['id_lesson']);
      $fquestionArray[$arrayCounter] = $tempFquestion;
      $arrayCounter++;
    }

    return $fquestionArray;
  }

}

?>
