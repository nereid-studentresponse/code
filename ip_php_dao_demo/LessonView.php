<?php
require_once "LayoutView.php";
require_once "Lesson.php";
require_once "Course.php";

class LessonView extends LayoutView {
  
  private $data;
  
  public function __construct($data = null) {
		print_r($data);
		parent::__construct("Internation Project : lessons", true);
		$this->data = $data;
  }
  
  public function setData($data) {
	$this->data = $data;
	// debug
	//error_log(print_r($data, true));
  }

  public function content() {
  
	$string = "";
	$counter = 1;
	foreach($this->data['lessons'] as &$lesson){
		
		$string = $string ."<table border = 1><tr><td>".$counter .".- <b>". $lesson->getTitle() . "</b></td></tr><tr><td>" . 
				  
				 $lesson->getSubject() . "<br/>" .
			     $lesson->getDocumentUrl() . "<br/>";
				 
		$counter++;
	
	}
  
  
	return $string;
	 
	
	
}

}
?>
