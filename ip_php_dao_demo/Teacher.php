
<?php

class Teacher {

  private $id;
  private $name;
  private $speciality;

  function __construct($id, $name, $speciality){
      $this->id=$id;
      $this->name=$name;
      $this->speciality=$speciality;
  }
  
  function getId() {
    return $this->id;
  }
  
  function getName() {
    return $this->name;
  }

  function getSpeciality() {
    return $this->speciality;
  }

}

?>
