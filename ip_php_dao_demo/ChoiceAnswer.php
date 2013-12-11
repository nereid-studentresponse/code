
<?php

class ChoiceAnswer {

  private $id_choice;
  private $id_student;

  function __construct($id_choice, $id_student){
      $this->id_choice=$id_choice;
	  $this->id_student=$id_student;
  }
  
  function getChoiceId() {
    return $this->id_choice;
  }
  
  function getStudentId() {
    return $this->id_student;
  }
  

}

?>
