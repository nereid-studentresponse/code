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
    // nothing to do here, just displaying the page
  }
}
?>
