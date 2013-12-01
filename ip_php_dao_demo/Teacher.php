
<?php

class Teacher {

  private $id;
  private $name;
  private $email;
  private $password;
  private $speciality;

  function __construct($id, $name, $email, $password, $speciality){
      $this->id=$id;
      $this->name=$name;
      $this->email=$email;
      $this->password=$password;
      $this->speciality=$speciality;
  }

  // Constructor from DB row
  /*
   * This is not possible, only one constructor per class in PHP
  function __construct($row) {
    $this->id=$row['id'];
    $this->name=$row['name'];
    $this->email=$row['email'];
    $this->password=$row['password'];
    $this->speciality=$row['speciality'];
  }
  */
  
  function getId() {
    return $this->id;
  }
  
  function getName() {
    return $this->name;
  }

  function getEmail() {
    return $this->email;
  }

  function getPassword() {
    return $this->password;
  }

  function getSpeciality() {
    return $this->speciality;
  }

}

?>
