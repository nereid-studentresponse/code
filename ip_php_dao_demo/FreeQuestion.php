
<?php

class FreeQuestion {

  private $id;
  private $title;
  private $correction;
  private $id_lesson;

  function __construct($id, $title, $correction, $id_lesson){
      $this->id=$id;
      $this->title=$title;
	  $this->correction=$correction;
	  $this->id_lesson=$id_lesson;
  }
  
  function getId() {
    return $this->id;
  }
  
  function getTitle() {
    return $this->title;
  }
  
  function getCorrection() {
    return $this->correction;
  }
  
  function getLessonId() {
    return $this->id_lesson;
  }

}

?>
