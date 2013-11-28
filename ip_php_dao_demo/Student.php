
<?php

class Student {

  private $id;
  private $name;
  private $email;
  private $password;
  private $yearofstudy;
  private $confused

  function __construct($id, $name, $email, $password, $yearofstudy){
      $this->id=$id;
      $this->name=$name;
      $this->email=$email;
      $this->password=$password;
      $this->yearofstudy=$yearofstudy;
  }

  // Constructor from DB row
  function __construct($row) {
    $this->id=$row['id'];
    $this->name=$row['name'];
    $this->email=$row['email'];
    $this->password=$row['password'];
    $this->yearofstudy=$row['yearofstudy'];
  }
  
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

  function getYearOfStudy() {
    return $this->yearofstudy;
  }

  function isConfused() {
    return $this->confused;
  }

}

?>
