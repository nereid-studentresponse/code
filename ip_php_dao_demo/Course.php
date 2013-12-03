
<?php

class Course {

  private $id;
  private $title;
  private $description;

  function __construct($id, $title, $description){
      $this->id=$id;
      $this->title=$title;
      $this->description=$description;
  }
  
  function getId() {
    return $this->id;
  }
  
  function getTitle() {
    return $this->title;
  }
  
  function getDescription() {
    return $this->description;
  }

}

?>
