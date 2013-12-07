
<?php

include_once "DB.php";
include_once "Teacher.php";

class TeacherDAO {

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

  /**
   * Returns the teacher if found, false otherwise
   */
  function getByEmail($email) {
    $dbConnection=$this->dbConnect();
    $query=$dbConnection->prepare("SELECT * FROM teacher WHERE email=:email;");
    $query->bindParam(":email", $email);
    $query->execute();
    $result=$query->fetch();

    //debug
    error_log(print_r($result, true));
    if(!$result) {
      return $result;
    } else  {
      return Teacher::withRow($result);
    }
  }

  function insert($teacher) {
    $dbConnection=$this->dbConnect();
    $sql = "INSERT INTO teacher (`name`,`email`,`password`,`speciality`) VALUES (:name, :email, :password, :speciality)";
    $query=$dbConnection->prepare($sql);
    $query->bindParam(":name", $teacher->getName());
    $query->bindParam(":email", $teacher->getEmail());
    $query->bindParam(":password", $teacher->getPassword());
    $query->bindParam(":speciality", $teacher->getSpeciality());
    $count = $query->execute();
    
    return $count > 0;
  }

  function update($teacher) {
    $dbConnection=$this->dbConnect();
    $query=$dbConnection->prepare('UPDATE teacher SET name='.$teacher->getName().',email='.$teacher->getEmail().',password='.$teacher->getEmail().',speciality='.$teacher->getSpeciality().'WHERE id='.$teacher->getId().';');
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
      $tempTeacher = new Teacher($row['id'], $row['name'],$row['email'], $row['password'], $row['speciality']);
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
