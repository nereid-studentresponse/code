<?php

//include_once "Course.php";

class Lesson {

  private $id;
  private $title;
  private $subject;
  private $document_url;
  private $id_course; 

  function __construct($id, $title, $subject, $document_url, $id_course){
      $this->id=$id;
      $this->title=$title;
      $this->subject=$subject;
	  $this->document_url=$document_url;
	  $this->id_course= $id_course;
  }
  
  public static function withRow( array $row ) {
    $instance = new self($row['id'], $row['title'], $row['subject'], 
                         $row['document_url'], $row['id_course']);
    return $instance;
  }
  
  
  function getId() {
    return $this->id;
  }
  
  function getTitle() {
    return $this->title;
  }
  
  function getSubject() {
    return $this->subject;
  }
  
  function getDocumentUrl() {
    return $this->document_url;
  }
  
  function getCourseId() {
    return $this->id_course;
  }

}

?>