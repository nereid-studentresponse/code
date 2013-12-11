<?php

include_once "DB.php";
include_once "ChoiceAnswer.php";


class ChoiceAnswerDAO {

  private $dbh; // This is an instance of Class_DB to be injected in the functions.
  private $table=NULL;

  function __construct($dbh){
      $this->dbh=$dbh;
  }
  function dbConnect(){
      $dbConnection=$this->dbh->createConnexion();
      return $dbConnection;
  }

  function insert($choiceanswer) {
   
    $dbConnection=$this->dbConnect();
    $query=$dbConnection->prepare("INSERT INTO `choiceanswer` (`id_choice`, `id_student`) VALUES ( :id_choice, :id_student) ");
	$query->bindParam(':id_choice', $choiceanswer->getChoiceId());
    $query->bindParam(':id_student', $choiceanswer->getStudentId());
    
    $count = $query->execute();
    
    return $count > 0;
  }
  
  
}

?>
