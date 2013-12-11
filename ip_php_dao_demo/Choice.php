
<?php

class Choice {

  private $id;
  private $option_text;
  private $id_question;

  function __construct($id, $option_text, $id_question){
      $this->id=$id;
      $this->option_text=$text;
	  $this->id_question=$id_question;
  }
  
  function getId() {
    return $this->id;
  }
  
  function getOptionText() {
    return $this->option_text;
  }
  
  function getQuestionId() {
    return $this->id_question;
  }

}

?>
