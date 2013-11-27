
<?php

include_once "DB.php";
include_once "School.php";

class SchoolDAO {

  private $dbh; // This is an instance of Class_DB to be injected in the functions.
  private $table=NULL;

  function __construct($dbh){
      $this->dbh=$dbh;
  }
  function dbConnect(){
      $dbConnection=$this->dbh->createConnexion();
      return $dbConnection;
  }

  function get($id) {
    // i'll add the getter soon...
  }

  function insert($school) {
    $dbConnection=$this->dbConnect();
    $query=$dbConnection->prepare('INSERT INTO school (\'name\',\'address\',\'city\') VALUES ('.$school->getName().', '.$school->getAddress().', '.$school->getCity().');');
    $query->execute(); 
  }

  function update($school) {
    $dbConnection=$this->dbConnect();
    $query=$dbConnection->prepare('UPDATE school SET name='.$school->getName().',address='.$school->getAddress().', city= '.$school->getCity().' WHERE id='.$school->getId().';');
    $query->execute(); 
  }

  function delete($school) {
    $dbConnection=$this->dbConnect();
    $query=$dbConnection->prepare('DELETE FROM school WHERE id='.$school->getId().';');
    $query->execute(); 
  }

  function listAll() {
    echo "<br>Listiiiiing<br>";
    
    $dbConnection=$this->dbConnect();
    $query=$dbConnection->prepare("SELECT * FROM school ");
    $query->execute();
    $result=$query->fetchAll();
    
    
    $schoolArray;
    $arrayCounter = 0;
    
    foreach ($result as &$row) {
	
      $tempSchool = new School($row['id'], $row['name'], $row['address'], $row['city']);
      $schoolArray[$arrayCounter] = $tempTeacher;
      $arrayCounter++;
    }
    
    
    
    // echo print_r($result);
    // echo "<br><br>";
    // echo print_r($schoolArray);
    return $schoolArray;
  }

}

?>
