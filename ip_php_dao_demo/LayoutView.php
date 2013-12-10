<?php
/**
 * Abstract view (not supposed to be used as is) to extend from so that every page has a header and footer.
 */
class LayoutView {

  protected $title; //what is displayed on the header
  protected $authenticated; // true if the user is authenticated, so that we display the menu
  
  public function __construct($title = "International Project : student response", $authenticated = null) {
    $this->title = $title; //default title
    if($authenticated != null) {
      $this->authenticated = $authenticated;
    } else {
      $this->authenticated = isset($_SESSION["user"]);
    }
    
  }
  
  
  public function content() {
  //nothing. Content in children
  }
  
  public function header() {
	 return '
	 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
		<head>
        <title>International project</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		
		<!-- CSS -->
		<link rel="stylesheet" href="./css/layout.css">
		<link rel="stylesheet" href="./css/index.css">
		<link rel="stylesheet" href="./css/courses.css">
		<link rel="stylesheet" href="./css/register.css">
		<link rel="stylesheet" href="./css/lessons.css">
		<link rel="stylesheet" href="./css/questions.css">
		
    </head>
    <body>
		<div id="bloc_page">
			<div id="header">
				<img src="./css/images/small_globe.png" alt="International" />
				<h2>'. $this->title .'</h2>
				'. $this->menu() .'
			</div> 
			
			<div id="content">
	';
  }
  
  public function footer() {
    return '
      </div> <!-- end of content -->
      <div id="footer">
        <span>&copy NEREID 2013</span>
      </div>
      </body>
    </html>
    ';
  }
  
  public function output() {
    return $this->header() . $this->content() .	$this->footer();
  }

  private function menu() {
    if($this->authenticated) {
      return '
      <div id="menu">
        <p id="logoutLink"><a href="index_router.php?page=logout">Log Out</a></p>
      </div>
      ';
    } else {
      return '';
    }
  }


}
?>
