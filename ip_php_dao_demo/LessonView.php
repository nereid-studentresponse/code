<?php
require_once "LayoutView.php";
require_once "Lesson.php";
require_once "Course.php";
require_once "FreeQuestion.php";

class LessonView extends LayoutView {
  
  private $data;
  
	public function __construct($data = null) {
		print_r($data);
		parent::__construct("International Project : lessons", true);
		$this->data = $data;
	}
  
	public function setData($data) {
		$this->data = $data;
		// debug
		error_log(print_r($data, true));
	}

	public function content() {
  
		$string = '<div id="lessonView"><a href="index_router.php?page=myCourses" class="button">Return on my courses</a>';
		
		if ( $this->data['lessons'] ) {
		
			$string = $string . '<table id="lessonsTable" style="width: 100%" border="1"><tr><th>Name</th><th>Subject</th><th>Document</th><th>Questions you can answer</th></tr>';
			
			$counter = 0;

			foreach($this->data['lessons'] as &$lesson) {
				
				$string = $string . 
					'<tr>
						<td><b>'. $lesson->getTitle() . '</b></td>
						<td>'. $lesson->getSubject() . '</td>
						<td>';
						
				if ($lesson->getDocumentUrl()) { 
					$string = $string . '<a href='. $lesson->getDocumentUrl() . '>Document</a>';
				} else { 
					$string = $string . 'No document';
				} 
				
				$string = $string . '</td>
						<td>';
				
				if ( $this->data['questions'][$counter]['unanswered'] ) {
					$string = $string . '<ul class="questions">';
					foreach ($this->data['questions'][$counter]['unanswered'] as &$question) {
						$string = $string . '<li><a href="index_router.php?page=fQuestion&qid='.$question->getId().'">'.$question->getTitle().'</a></li>';
					}
					$string = $string . '</ul>';
				} else {
					$string = $string . 'No question';
				}
				
				$string = $string . '</td>
					</tr>';
						 
				$counter++;
			
			}
		} else {
			$string = $string . '<p>There is no lesson in this course for now</p>';
		}
		
		$string = $string . '</table>';
		
		if ( $this->data['userType'] === 'teacher') {
			//a teacher can create lessons in the course
			$string = $string . '<a href="index_router.php?page=createLesson" class="button">Add a lesson</a>';
		}
		
		$string = $string . '</div>';
		return $string;
	}

}
?>
