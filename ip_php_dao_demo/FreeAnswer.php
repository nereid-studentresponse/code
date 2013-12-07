
<?php

class FreeAnswer {

  private $id;
  private $text;
  private $id_student;
  private $id_question;

  function __construct($id, $text, $id_student, $id_question){
      $this->id=$id;
      $this->text=$text;
	  $this->id_student=$id_student;
	  $this->id_question=$id_question;
  }
  
  function getId() {
    return $this->id;
  }
  
  function getText() {
    return $this->text;
  }
  
  function getStudentId() {
    return $this->id_student;
  }
  
  function getQuestionId() {
    return $this->id_question;
  }

}

?>
