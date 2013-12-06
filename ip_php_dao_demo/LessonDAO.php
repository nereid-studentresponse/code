<?php

include_once "DB.php";
include_once "Lesson.php";
include_once "Course.php";

class LessonDAO {

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
    $query=$dbConnection->prepare("SELECT * FROM lesson WHERE id=".$id);
    $query->execute();
    $result=$query->fetchAll();
	return Lesson::withRow($result[0]);
  }

  function insert($lesson) {
    $dbConnection=$this->dbConnect();
    $query=$dbConnection->prepare('INSERT INTO lesson (\'title\',\'subject\',\'document_url\',\'id_course\') VALUES ('.$lesson->getTitle().', '.$lesson->getSubject().', '.$lesson->getDocumentUrl().', '.$lesson->getCourseId().');');
    $count = $query->execute();
    
    return $count > 0;
  }

  function update($lesson) {
    $dbConnection=$this->dbConnect();
    $query=$dbConnection->prepare('UPDATE lesson SET title='.$lesson->getTitle().',subject='.$lesson->getSubject().', document_url='.$lesson->getDocumentUrl().' WHERE id='.$lesson->getId().';');
    $query->execute(); 
  }

  function delete($lesson) {
    $dbConnection=$this->dbConnect();
    $query=$dbConnection->prepare('DELETE FROM lesson WHERE id='.$lesson->getId().';');
    $query->execute(); 
  }
  
 function getByCourse($course) {
    $dbConnection=$this->dbConnect();
    $query=$dbConnection->prepare("SELECT * FROM lesson WHERE id_course= :cid ");
    $query->bindParam(':cid', $course->getId());
    $query->execute();
    $result=$query->fetchAll();
     
    $lessonArray;
    $arrayCounter = 0;
    
    foreach ($result as &$row) {
      $tempLesson = new Lesson($row['id'], $row['title'], $row['subject'], $row['document_url'], $row['id_course']);
      $lessonArray[$arrayCounter] = $tempLesson;
      $arrayCounter++;
    }

    return $lessonArray;
  }

  function listAll() {
	echo "<br>Listiiiiing<br>";
    
    $dbConnection=$this->dbConnect();
    $query=$dbConnection->prepare("SELECT * FROM lesson ");
    $query->execute();
    $result=$query->fetchAll();
    
    $teacherArray;
    $arrayCounter = 0;
    
    foreach ($result as &$row) {
		
		$tempLesson = new Lesson($row['id'], $row['title'], $row['subject'], $row['document_url'], $row['id_course']);
		$lessonArray[$arrayCounter] = $tempLesson;
		$arrayCounter++;
    }
    
    // echo print_r($result);
    // echo "<br><br>";
    // echo print_r($lessonArray);
    return $lessonArray;
  }

}

?>
