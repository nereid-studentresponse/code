
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
    $dbConnection=$this->dbConnect();
    $query=$dbConnection->prepare("SELECT * FROM teacher WHERE id=".$id);
    $query->execute();
    $result=$query->fetchAll();

    return new Teacher($result[0]);
  }

  function insert($teacher) {
    $dbConnection=$this->dbConnect();
    $query=$dbConnection->prepare('INSERT INTO teacher (\'id\',\'name\',\'speciality\') VALUES ('.$teacher->getId().', '.$teacher->getName().', '.$teacher->getSpeciality().');');
    $query->execute(); 
  }

  function update($teacher) {
    $dbConnection=$this->dbConnect();
    $query=$dbConnection->prepare('UPDATE teacher SET name='.$teacher->getName().',speciality='.$teacher->getSpeciality().'WHERE id='.$teacher->getId().';');
    $query->execute(); 
  }

  function delete($teacher) {
    $dbConnection=$this->dbConnect();
    $query=$dbConnection->prepare('DELETE FROM teacher WHERE id='.$teacher->getId().';');
    $query->execute(); 
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
