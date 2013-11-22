
<?php

include_once "DB.php";
include_once "Course.php";

class CourseDAO {

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
    $query=$dbConnection->prepare("SELECT * FROM courses ");
    $query->execute();
    $result=$query->fetchAll();
    
    
    $courseArray;
    $arrayCounter = 0;
    
    foreach ($result as &$row) {
      $tempCourse = new Course($row['id'], $row['name'], $row['description']);
      $courseArray[$arrayCounter] = $tempCourse;
      $arrayCounter++;
    }
    
    
    
    // echo print_r($result);
    // echo "<br><br>";
    // echo print_r($courseArray);
    return $courseArray;
  }

}

?>
