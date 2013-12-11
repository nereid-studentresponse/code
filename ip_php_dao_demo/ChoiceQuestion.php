
<?php

class ChoiceQuestion {

  private $id;
  private $title;
  private $id_correct_choice;
  private $id_lesson;

  function __construct($id, $title, $id_correct_choice, $id_lesson){
      $this->id=$id;
      $this->title=$title;
	  $this->id_correct_choice=$id_correct_choice;
	  $this->id_lesson=$id_lesson;
  }
  
  function getId() {
    return $this->id;
  }
  
  function getTitle() {
    return $this->title;
  }
  
  function getCorrectChoiceId() {
    return $this->id_correct_choice;
  }
  
  function getLessonId() {
    return $this->id_lesson;
  }

}

?>
