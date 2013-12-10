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
				
				//questions
				if ( $this->data['userType'] == 'student' ) {
					//student : only unanswered questions. Each question links to the answer page
					if ( $this->data['questions'][$counter]['unanswered'] ) {
						$string = $string . '<ul class="questions">';
						foreach ($this->data['questions'][$counter]['unanswered'] as &$question) {
							$string = $string . '<li><a href="index_router.php?page=fQuestion&qid='.$question->getId().'">'.$question->getTitle().'</a></li>';
						}
						$string = $string . '</ul>';
					} else {
						$string = $string . 'No question';
					}
					
				} else {
					//teacher : all questions. Each question links to a page displaying information such as number of answers and answsers' details
					$string = $string . '<ul class="questions">';
					if ( $this->data['questions'][$counter] ) {
						foreach ($this->data['questions'][$counter] as &$question) {
							$string = $string . '<li><a href="index_router.php?page=questionDetails&cid='.$_GET['id'].'&qid='.$question->getId().'">'.$question->getTitle().'</a></li>';
						}
						
					} else {
						$string = $string . 'No question yet';
					}
					
					// question creation
					$string = $string . '<a href="index_router.php?page=createQuestion&cid='.$_GET['id'].'&lid='.$lesson->getId().'" class="createQuestionA"><li class="createQuestion">Add a question</li></a>';
					$string = $string . '</ul>';
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
			$string = $string . '<a href="index_router.php?page=createLesson&id='.$_GET['id'].'" class="button">Add a lesson</a>';
		}
		
		$string = $string . '</div>';
		return $string;
	}

}
?>
