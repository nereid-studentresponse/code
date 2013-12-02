<?php
class LayoutView {

  protected $data;
  protected $title; //what is displayed on the header
  
  public function __construct($data = null) {
    $this->data = $data;
	$this->title = "Internation Project : student response"; //default title
  }
  
  public function setData($data) {
    $this->data = $data;
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
		
    </head>
    <body>
		<div id="bloc_page">
			<div id="header">
				<img src="./css/images/small_globe.png" alt="International" />
				<h2>'. $this->title .'</h2>
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


}
?>