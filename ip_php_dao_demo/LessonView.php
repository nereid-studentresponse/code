<?php
require_once "LayoutView.php";
require_once "Lesson.php";
require_once "Course.php";

class LessonView extends LayoutView {
  
  private $data;
  
	public function __construct($data = null) {
		print_r($data);
		parent::__construct("Internation Project : lessons", true);
		$this->data = $data;
	}
  
	public function setData($data) {
		$this->data = $data;
		// debug
		//error_log(print_r($data, true));
	}

	public function content() {
  
		$string = '<table id="lessonsTable" style="width: 100%" border="1"><tr><th>Name</th><th>Subject</th><th>Document</th><th>Questions</th></tr>';
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
				$string = $string . '<ul>';
				foreach ($this->data['questions'][$counter]['unanswered'] as &$question) {
					$string = $string . '<li>Question</li>';
				}
				$string = $string . '</ul>';
			} else {
				$string = $string . 'No question';
			}
			
			$string = $string . '</td>
				</tr>';
					 
			$counter++;
		
		}
		
		$string = $string . '</table>';
		return $string;
	}

}
?>
