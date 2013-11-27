<?php

class School {

  private $id;
  private $name;
  private $address;
  private $city;
  
  function __construct($id, $name, $address, $city, $teacherArray, $studentArray){
      $this->id=$id;
      $this->name=$name;
      $this->address=$address;
	  $this->city=$city;
	
  }
  
  // Constructor from DB row
	function __construct($row) {
		$this->id=$row['id'];
		$this->name=$row['name'];
		$this->address=$row['address'];
		$this->city=$row['city'];
	}
  
  function getId() {
    return $this->id;
  }
  
  function getName() {
    return $this->name;
  }
  
  function getAddress() {
    return $this->address;
  }
  
  function getCity() {
    return $this->city;
  }
  

}

?>