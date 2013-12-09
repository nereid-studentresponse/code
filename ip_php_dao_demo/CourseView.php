<?php
require_once "LayoutView.php";

class CourseView extends LayoutView {
  
  private $data;
  public function __construct($data = null) {
		parent::__construct("International Project : my courses", true);
		$this->data = $data;
  }
  
  public function setData($data) {
	$this->data = $data;
	// debug
	//error_log(print_r($data, true));
  }
  
  public function content() {
  
	$counter = 1;
	
	if ( $this->data['userType'] === 'student') {
		//for a student
		$string = '<div id="coursesBlock">
			<div id="menu">
				<p class="title bold">My courses</p>
				<ul class="list">
					<a href="index_router.php?page=enroll">
						<li class="add">
							<img src="./css/images/add-icon.png" height="15" width="16" />
							Enroll a new course
						</li>
					</a>';
		
		//courses the student is enrolled in
		foreach($this->data['courses'] as $course){
			$string = $string .
				'<a href="index_router.php?page=lessons&id='.$course->getId().'"><li>
					<p class="title">'.$counter .'.  <b>'. $course->getTitle() . '</b></p>
					<p class="description">' . $course->getDescription() . '</p>
				</li></a>' ;
			
			$counter++;
		}
		
		// end of general structure
		$string = $string . '</ul>
			</div>
		</div>';
		
	} else {
		// for a teacher
		$string = '<div id="coursesBlock">
			<div id="menu">
				<p class="title bold">My courses</p>
				<ul class="list">
					<a href="index_router.php?page=createCourse">
						<li class="add">
							<img src="./css/images/add-icon.png" height="15" width="16" />
							Create a new course
						</li>
					</a>';
					
		//courses the teacher has created
		foreach($this->data['courses'] as $course){
			$string = $string .
				'<a href="index_router.php?page=lessons&id='.$course->getId().'"><li>
					<p class="title">'.$counter .'.  <b>'. $course->getTitle() . '</b></p>
					<p class="description">' . $course->getDescription() . '</p>
				</li></a>' ;
			
			$counter++;
		}
		
		// end of general structure
		$string = $string . '</ul>
			</div>
		</div>';
	}
	
	return $string;
	
  }


}
?>
