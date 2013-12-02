<?php
require_once "LayoutView.php";

class CourseView extends LayoutView {
  
  public function __construct($data = null) {
		parent::__construct();
		$this->title = "Internation Project : my courses !";
  }
  
  public function setData($data) {
	$this->data = $data;
  }

  public function content() {
	return '
		<div id="coursesBlock">
			<div id="menu">
				<p class="title bold">My courses</p>
				<ul class="list">
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