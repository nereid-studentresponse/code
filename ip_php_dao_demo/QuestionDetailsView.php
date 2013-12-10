<?php
require_once "LayoutView.php";

class QuestionDetailsView extends LayoutView {
  
  private $data;
  public function __construct($data = null) {
		parent::__construct("International Project : question", true);
		$this->data = $data;
  }
  
  public function setData($data) {
	$this->data = $data;
	// debug
	//error_log(print_r($data, true));
  }
  
  public function content() {
	
	//enroll course + general structure
	$string = '<div id="questionDetails">Coucou';
	
	
					
	$string = $string . '</div>';
	return $string;
	
  }


}
?>
