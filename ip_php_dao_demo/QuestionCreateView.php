<?php
require_once "LayoutView.php";

class QuestionCreateView extends LayoutView {
  
  private $data;
  public function __construct($data = null) {
		parent::__construct("International Project : question creation", true);
		$this->data = $data;
  }
  
  public function setData($data) {
	$this->data = $data;
	// debug
	//error_log(print_r($data, true));
  }
  
  public function content() {
	
	//enroll course + general structure
	$string = '<div id="questionCreate">
					<form name="create" action="index_router.php?page=createQuestion&cid='.$_GET['cid'].'&lid='.$_GET["lid"].'" method="post" id="questionCreationForm" class="form">
						<fieldset id="globalInformation">
							<legend>Question creation : </legend>
							<div id="title" class="formBlock">
								<label for="title">Title :</label>
								<input type="text" name="title" />
							</div>
							<div id="correction" class="formBlock">
								<label for="correction">Correction :</label>
								<textarea cols="40" rows="5" name="correction" id="correction"></textarea>
							</div>
						</fieldset>
						
						<a href="index_router.php?page=lessons&id='.$_GET['cid'].'"><input id="back" type="button" value="Cancel"/></a>
						<input type="submit" value="Confirm"/>
					</form>
				</div>';
	return $string;
	
  }


}
?>
