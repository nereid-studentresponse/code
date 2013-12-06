<?php
require_once "LayoutView.php";

class CourseView extends LayoutView {
  
  private $data;
  public function __construct($data = null) {
		parent::__construct("Internation Project : my courses !", true);
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
	foreach($this->data['courses'] as &$course){
		
		$string = $string ."<table border = 1><tr><td>".$counter .".-  <b>". $course->getTitle() . "</b></td></tr><tr><td>" . $course->getDescription() . "" .
		          '<form action="index_router.php?page=lessons" method="post" id="registrationForm">
					<input type="hidden" name="id" value ="'.$course->getId().'" />
					<input type="hidden" name="title" value ="'.$course->getTitle().'" />
					<input type="hidden" name="description" value ="'.$course->getDescription().'" />
					<input type="submit" value="Lessons"/>
				   </form> </td></tr></table><br/>
				  
				  ' ;
		$counter++;
	
	}
  
  
	return $string;
	
  }

  public function previous_content() {
	return '
		<div id="coursesBlock">
			<div id="menu">
				<p class="title bold">My courses</p>
				<ul class="list">
					<a href="index_router.php?page=enroll">
						<li class="add">
							<img src="./css/images/add-icon.png" height="15" width="16" />
							Enroll a new course
						</li>
					</a>
					<li>Course 1</li>
					<li>Course 2</li>
					<li>Course 3</li>
				</ul>
			</div>
			<div id="courseDetails">
				a course\'s details
			</div>
		</div>
	'
	;
}

}
?>
