<?php
require_once "LayoutView.php";

class CourseEnrollView extends LayoutView {
  
  public function __construct($data = null) {
		parent::__construct("Internation Project : enroll new course", true);
  }
  
  public function setData($data) {
	$this->data = $data;
  }

  public function content() {
	return '
		<div id="courseEnrollBlock">
			<form name="enroll" action="index_router.php?page=enroll" method="POST">
				<div id="coursesAvailable">
					<ul class="list">
						<li>
							<input type="checkbox" name="1" value="enroll">
							<p class="title">Course 1</p>
							<p class="teacher">Teacher : M. Blabla</p>
							<p class="other"></p>
							
						</li>
						<li>
							<input type="checkbox" name="2" value="enroll">
							<p class="title">Course 2</p>
							<p class="teacher">Teacher : M. Bleble</p>
							<p class="other"></p>
						</li>
						<li>
							<p class="other"></p>
							<input type="checkbox" name="3" value="enroll">
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