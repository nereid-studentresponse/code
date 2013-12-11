<?php

include_once "DB.php";
include_once "Choice.php";


class ChoiceDAO {

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
   $query=$dbConnection->prepare("SELECT * FROM choice WHERE id = :id ");
   $query->bindParam(':id', $id);
   $query->execute();
   $result=$query->fetch(PDO::FETCH_ASSOC);
  
   $choice = new Choice($result['id'], $result['option_text'], $result['id_question']);
   
   return $choice;
   
  }

  function insert($choice) {
   
    $dbConnection=$this->dbConnect();
    $query=$dbConnection->prepare("INSERT INTO `choice` (`option_text`, `id_question`) VALUES ( :text, :id_question) ");
    $query->bindParam(':text', $fanswer->getOptionText());
    $query->bindParam(':id_question', $fanswer->getQuestionId());
    $count = $query->execute();
    
    return $count > 0;
  }
  
 function getByQuestion($questionId) {
    $dbConnection=$this->dbConnect();
    $query=$dbConnection->prepare("SELECT * FROM choice WHERE id_question= :qid ");
    $query->bindParam(':qid', $questionId);
    $query->execute();
    $result=$query->fetchAll();
     
    $choiceArray = array();
    $arrayCounter = 0;
    
    foreach ($result as &$row) {
      $tempChoice = new Choice($row['id'], $row['option_text'], $row['id_question']);
      $choiceArray[$arrayCounter] = $tempChoice;
      $arrayCounter++;
    }

    return $choiceArray;
  }
  
}

?>
