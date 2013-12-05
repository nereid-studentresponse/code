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
	return '
		<div id="courseEnrollBlock">
			<form name="enroll" action="index_router.php?page=enroll" method="POST">
				<div id="coursesAvailable">
					<ul class="list">
						<li>
							<input type="checkbox" name="enroll[]" value="1">
							<p class="title">Course 1</p>
							<p class="teacher">Teacher : M. Blabla</p>
							<p class="other"></p>
							
						</li>
						<li>
							<input type="checkbox" name="enroll[]" value="2">
							<p class="title">Course 2</p>
							<p class="teacher">Teacher : M. Bleble</p>
							<p class="other"></p>
						</li>
						<li>
							<p class="other"></p>
							<input type="checkbox" name="enroll[]" value="3">
							<p class="title">Course 3</p>
							<p class="teacher">Teacher : M. Blibli</p>
						</li>
					</ul>
					<input type="submit" value="Enroll" />
				</div>
			</form>
		</div>
	'
	;
}

}
?>
