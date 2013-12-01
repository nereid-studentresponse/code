
<?php

include_once "DB.php";
include_once "Course.php";

class CourseDAO {

  private $dbh; // This is an instance of Class_DB to be injected in the functions.

  function __construct($dbh){
      $this->dbh=$dbh;
  }
  function dbConnect(){
      $dbConnection=$this->dbh->createConnexion();
      return $dbConnection;
  }

  function get($id) {
   echo "<br>Getting course id= $id<br>";
   
   $dbConnection=$this->dbConnect();
   $query=$dbConnection->prepare("SELECT * FROM course WHERE id = :id ");
   $query->bindParam(':id', $id);
   $query->execute();
   $result=$query->fetch(PDO::FETCH_ASSOC);
   
   $course = new Course($result['id'], $result['title'], $result['description']);
   
   
   return $course;
   
  }

  function listAll() {
    echo "<br>Listiiiiing<br>";
    
    $dbConnection=$this->dbConnect();
    $query=$dbConnection->prepare("SELECT * FROM course ");
    $query->execute();
    $result=$query->fetchAll();
    
    
    $courseArray;
    $arrayCounter = 0;
    
    foreach ($result as &$row) {
      $tempCourse = new Course($row['id'], $row['title'], $row['description']);
      $courseArray[$arrayCounter] = $tempCourse;
      $arrayCounter++;
    }
    
    
    
    // echo print_r($result);
    // echo "<br><br>";
    // echo print_r($courseArray);
    return $courseArray;
  }
  
  function insert($course) {
    echo "<br>Inserting course id=". $course->getId() . " <br>";

    $dbConnection=$this->dbConnect();
    $query=$dbConnection->prepare("INSERT INTO `course` (`id`, `title`, `description`) VALUES ( :id, :title, :description) ");
    $query->bindParam(':id', $course->getId());
    $query->bindParam(':title', $course->getTitle());
    $query->bindParam(':description', $course->getDescription());
    $count = $query->execute();
    
    return $count > 0;
  
  }

}

?>
