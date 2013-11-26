
<?php

include_once "DB.php";
include_once "Teacher.php";

class TeaherDAO {

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
    $query=$dbConnection->prepare("SELECT * FROM teacher ");
    $query->execute();
    $result=$query->fetchAll();
    
    
    $teacherArray;
    $arrayCounter = 0;
    
    foreach ($result as &$row) {
      $tempTeacher = new Teacher($row['id'], $row['name'], $row['speciality']);
      $teacherArray[$arrayCounter] = $tempTeacher;
      $arrayCounter++;
    }
    
    
    
    // echo print_r($result);
    // echo "<br><br>";
    // echo print_r($teacherArray);
    return $teacherArray;
  }

}

?>
