
<?php

class Student {

  private $id;
  // why don't we have a first name and a last name?
  private $name;
  private $email;
  private $password;
  private $yearofstudy;
  private $confused;

  function __construct($id, $name, $email, $password, $yearofstudy){
      $this->id=$id;
      $this->name=$name;
      $this->email=$email;
      $this->password=$password;
      $this->yearofstudy=$yearofstudy;
  }

  /**
   * "Constructor" from DB row
   * Use it this way: Student::withRow($row) this will return a new Student
   */
  public static function withRow( array $row ) {
    $instance = new self($row['id'], $row['name'], $row['email'], 
                         $row['password'], $row['yearofstudy']);
    return $instance;
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
