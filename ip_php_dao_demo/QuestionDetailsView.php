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
	
	$question = $this->data["question"];
	$answers = $this->data["answers"];
	
	$string = '<div id="questionDetails">
		<a href="index_router.php?page=lessons&id='.$_GET["cid"].'" class="return">Return on lessons</a>
		<div id="globalInformation">
			<h3>Information on the question</h3>
			<p>Title : '. $question->getTitle() .'</p>
			<p>Correction : ';
			if ( $question->getCorrection() ) {
				$string = $string . $question->getCorrection();
			} else {
				$string = $string . 'You provided no correction for this question';
			}
			$string = $string .' </p>
			<p>Answers : ' . count($answers) . '</p> 
		</div>
		<div id="Answers">
			<h3>Answers</h3>';
		
			if ( count($answers) == 0 ) {
				$string = $string . 'There is no answer yet.';
			} else {
				$string = $string . '<ul>';
				foreach ($answers as &$answer) {
					$string = $string . '<li><span class="studentAnswer">'.$answer->getStudentId().' : </span><span class="textAnswer">'.$answer->getText().'</span></li>';
				}
				$string = $string . '</ul>';
			}
		
		
		$string = $string . '</div>';
	
					
	$string = $string . '</div>';
	return $string;
	
  }


}
?>
