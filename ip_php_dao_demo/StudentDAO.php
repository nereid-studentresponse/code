
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
    $dbConnection=$this->dbConnect();
    $query=$dbConnection->prepare("SELECT * FROM student WHERE id=".$id);
    $query->execute();
    $result=$query->fetchAll();

    return new Student($result[0]);
  }

  function insert($student) {
    $dbConnection=$this->dbConnect();
    $query=$dbConnection->prepare('INSERT INTO student (\'name\',\'yearofstudy\',\'confused\') VALUES ('.$student->getName().', '.$student->getYearOfStudy().');');
    $query->execute(); 
  }

  function update($student) {
    $dbConnection=$this->dbConnect();
    $query=$dbConnection->prepare('UPDATE student SET name='.$student->getName().',yearofstudy='.$student->getYearOfStudy().'WHERE id='.$student->getId().';');
    $query->execute(); 
  }

  function delete($student) {
    $dbConnection=$this->dbConnect();
    $query=$dbConnection->prepare('DELETE FROM student WHERE id='.$student->getId().';');
    $query->execute(); 
  }

  function listAll() {
    echo "<br>Listiiiiing<br>";
    
    $dbConnection=$this->dbConnect();
    $query=$dbConnection->prepare("SELECT * FROM student ");
    $query->execute();
    $result=$query->fetchAll();
    
    
    $studentArray;
    $arrayCounter = 0;
    
    foreach ($result as &$row) {
      $tempStudent = new Student($row['id'], $row['name'], $row['yearofstudy'], $row['confused']);
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
