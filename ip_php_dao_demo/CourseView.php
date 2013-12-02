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
		<div id="menu">
			my courses
		</div>'
	;
}

}
?>