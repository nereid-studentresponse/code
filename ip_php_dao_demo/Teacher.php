
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

  // Constructor from DB row
  function __construct($row) {
    $this->id=$row['id'];
    $this->name=$row['name'];
    $this->speciality=$row['speciality'];
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
