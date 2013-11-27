<?php

include_once "DB.php";
include_once "Lesson.php";

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
   // i'll add the getter soon...
  }

  function insert($lesson) {
    $dbConnection=$this->dbConnect();
    $query=$dbConnection->prepare('INSERT INTO lesson (\'title\',\'subject\',\'nblesson\',\'id_course\') VALUES ('.$lesson->getTitle().', '.$lesson->getSubject().', '.$lesson->getLessonNumber().', '.$lesson->getCourse()->getId().');');
    $query->execute(); 
  }

  function update($lesson) {
    $dbConnection=$this->dbConnect();
    $query=$dbConnection->prepare('UPDATE lesson SET title='.$lesson->getTitle().',subject='.$lesson->getSubject().', nblesson='.$lesson->getLessonNumber().' WHERE id='.$lesson->getId().';');
    $query->execute(); 
  }

  function delete($lesson) {
    $dbConnection=$this->dbConnect();
    $query=$dbConnection->prepare('DELETE FROM lesson WHERE id='.$lesson->getId().';');
    $query->execute(); 
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
		/*
		//Giving the entire object Course to lesson -> Maybe not neccesary, maybe lesson should only conain the id of course
		
		$sub_query=$dbConnection->prepare("SELECT * FROM course WHERE id='".$row['id_course']."' ");
		$sub_query->execute();
		$sub_result=$sub_query->fetchAll();
		$tempCourse = new Course($sub_result['id'], $sub_result['name'], $sub_result['description']);
		*/
		$tempCourse = $row['id_course'];
	
		$tempLesson = new Lesson($row['id'], $row['title'], $row['subject'], $row['nblesson'], $tempCourse);
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
