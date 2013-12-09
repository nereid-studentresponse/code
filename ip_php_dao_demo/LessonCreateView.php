<?php
require_once "LayoutView.php";

class LessonCreateView extends LayoutView {
  
  private $data;
  public function __construct($data = null) {
		parent::__construct("International Project : lesson creation", true);
		$this->data = $data;
  }
  
  public function setData($data) {
	$this->data = $data;
	// debug
	//error_log(print_r($data, true));
  }
  
  public function content() {
	
	//enroll course + general structure
	$string = '<div id="lessonCreate">
					<form name="create" action="index_router.php?page=createLesson&id='.$_GET["id"].'" method="post" id="lessonCreationForm" class="form">
						<fieldset id="globalInformation">
							<legend>Course creation : </legend>
							<div id="title" class="formBlock">
								<label for="title">Title :</label>
								<input type="text" name="title" />
							</div>
							<div id="subject" class="formBlock">
								<label for="subject">Subject :</label>
								<textarea cols="40" rows="5" name="subject" id="subject"></textarea>
							</div>
						</fieldset>

						<a href="index_router.php?page=lessons&id='.$_GET['id'].'"><input id="back" type="button" value="Cancel"/></a>
						<input type="submit" value="Confirm"/>
					</form>
				</div>';
	return $string;
	
  }


}
?>
