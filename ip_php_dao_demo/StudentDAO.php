
<?php

include_once "DB.php";
include_once "Student.php";

class StudentDAO {

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
   //> EXECUTE HERE PDO
  }

  function listAll() {
    echo "<br>Listiiiiing<br>";
    
    $dbConnection=$this->dbConnect();
    $query=$dbConnection->prepare("SELECT * FROM students ");
    $query->execute();
    $result=$query->fetchAll();
    
    
    $studentArray;
    $arrayCounter = 0;
    
    foreach ($result as &$row) {
      $tempStudent = new Student($row['id'], $row['name']);
      $studentArray[$arrayCounter] = $tempStudent;
      $arrayCounter++;
    }
    
    
    
    // echo print_r($result);
    // echo "<br><br>";
    // echo print_r($studentArray);
    return $studentArray;
  }

}

?>
