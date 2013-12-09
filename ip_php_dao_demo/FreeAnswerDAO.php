<?php

include_once "DB.php";
include_once "FreeAnswer.php";


class FreeAnswerDAO {

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
   $query=$dbConnection->prepare("SELECT * FROM freeanswer WHERE id = :id ");
   $query->bindParam(':id', $id);
   $query->execute();
   $result=$query->fetch(PDO::FETCH_ASSOC);
  
   $fanswer = new FreeAnswer($result['id'], $result['text'], $result['id_student'], $result['id_question']);
   
   return $fanswer;
   
  }

  function insert($fanswer) {
   
    $dbConnection=$this->dbConnect();
    $query=$dbConnection->prepare("INSERT INTO `freeanswer` (`text`, `id_student`, `id_question`) VALUES ( :text, :id_student, :id_question) ");
    $query->bindParam(':text', $fanswer->getText());
    $query->bindParam(':id_student', $fanswer->getStudentId());
    $query->bindParam(':id_question', $fanswer->getQuestionId());
    $count = $query->execute();
    
    return $count > 0;
  }
  
 function getByQuestion($questionId) {
    $dbConnection=$this->dbConnect();
    $query=$dbConnection->prepare("SELECT * FROM freeanswer WHERE id_question= :qid ");
    $query->bindParam(':qid', $questionId);
    $query->execute();
    $result=$query->fetchAll();
     
    $fanswerArray = array();
    $arrayCounter = 0;
    
    foreach ($result as &$row) {
      $tempFanswer = new FreeAnswer($row['id'], $row['text'], $row['id_student'], $row['id_question']);
      $fanswerArray[$arrayCounter] = $tempFanswer;
      $arrayCounter++;
    }

    return $fanswerArray;
  }
  
}

?>
