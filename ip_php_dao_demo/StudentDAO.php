
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

    return Student::withRow($result[0]);
  }

  function getByEmail($email) {
    $dbConnection=$this->dbConnect();
    $query=$dbConnection->prepare("SELECT * FROM student WHERE email=:email");
    $query->bindParam(":email", $email);
    $query->execute();
    $result=$query->fetchAll();

    return Student::withRow($result[0]);
  }

  function insert($student) {
    $dbConnection=$this->dbConnect();
    $sql = "INSERT INTO student (`name`,`email`,`password`,`yearofstudy`) VALUES (:name, :email, :password, :yearofstudy)";
    $query=$dbConnection->prepare($sql);
    $query->bindParam(":name", $student->getName());
    $query->bindParam(":email", $student->getEmail());
    $query->bindParam(":password", $student->getPassword());
    $query->bindParam(":yearofstudy", $student->getYearOfStudy());
    
    $count = $query->execute();
    
    return $count > 0;
    
  }

  function update($student) {
    $dbConnection=$this->dbConnect();
    $query=$dbConnection->prepare('UPDATE student SET name='.$student->getName().',email='.$teacher->getEmail().',password='.$teacher->getEmail().',yearofstudy='.$student->getYearOfStudy().'WHERE id='.$student->getId().';');
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
      $tempStudent = new Student($row['id'], $row['name'], $row['email'], $row['password'], $row['yearofstudy']);
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
