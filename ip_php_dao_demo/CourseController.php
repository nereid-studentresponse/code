<?php

require_once "DB.php";

/**
 * Controller for both student and teacher
 */
class CourseController {
  
  private $view;
  
  public function __construct($view) {
    $this->view = $view;
  }
  
  public function courseIndex() {
    // TODO : put the list of courses of the user in $data, as well as the details of the first course in the list
  }
}
?>
