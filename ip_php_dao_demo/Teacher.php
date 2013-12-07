
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

  /**
   * "Constructor" from DB row
   * Use it this way: Teacher::withRow($row) this will return a new Teacher
   */
  public static function withRow( array $row ) {
    $instance = new self($row['id'], $row['name'], $row['email'], 
                         $row['password'], $row['speciality']);
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

  function getSpeciality() {
    return $this->speciality;
  }

}

?>
