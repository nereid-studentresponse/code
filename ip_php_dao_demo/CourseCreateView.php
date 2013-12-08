<?php
require_once "LayoutView.php";

class CourseCreateView extends LayoutView {
  
  private $data;
  public function __construct($data = null) {
		parent::__construct("Internation Project : course creation", true);
		$this->data = $data;
  }
  
  public function setData($data) {
	$this->data = $data;
	// debug
	//error_log(print_r($data, true));
  }
  
  public function content() {
	
	//enroll course + general structure
	$string = '<div id="courseCreate">
					<form action="index_router.php?page=courseCreate" method="post" id="courseCreationForm" class="form">
						<fieldset id="globalInformation">
							<legend>Course creation : </legend>
							<div id="title" class="formBlock">
								<label for="title">Title :</label>
								<input type="text" name="title" />
							</div>
							<div id="description" class="formBlock">
								<label for="descritpion">Description :</label>
								<textarea cols="40" rows="5" name="description" id="description"></textarea>
							</div>
						</fieldset>

						<a href="index_router.php?page=myCourses"><input id="back" type="button" value="Cancel"/></a>
						<input type="submit" value="Confirm"/>
					</form>
				</div>';
	return $string;
	
  }


}
?>
