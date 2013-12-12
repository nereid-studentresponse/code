<?php
require_once "LayoutView.php";

class CourseEnrollView extends LayoutView {
  
  public function __construct($data = null) {
		parent::__construct("Internation Project : enroll new course", true);
  }
  
  public function setData($data) {
  // array containing an array containing the courses at the index "courses"
	$this->data = $data;
	// debug
	//error_log(print_r($data, true));
  }

  public function content() {
	$string = '
		<div id="courseEnrollBlock">
			<form name="enroll" action="index_router.php?page=enroll" method="POST">
				<div id="coursesAvailable">
					<ul class="list">';
					
					foreach ($this->data["courses"] as &$course) {
					
						$string = $string . '
							<li>
								<input type="checkbox" name="enroll[]" value="'.$course->getId().'">
								<p class="title">' . $course->getTitle(). '</p>
							</li>
						';
						
					}
						
					$string = $string . '</ul>
					<input type="submit" value="Enroll" />
				</div>
			</form>
		</div>
	';
	
	
	return $string;
}

}
?>
