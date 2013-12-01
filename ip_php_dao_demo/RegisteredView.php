<?php
class RegisteredView {

  // for this view, expecting an array with one "ok" field containing true 
  // if the insert went alright.
  private $data;
  
  public function __construct($data = null) {
    $this->data = $data;
  }
  
  public function setData($data) {
    $this->data = $data;
  }
  
  
  public function output() {
    $okText = $this->displayOk();
        return '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head>
        <title>International project</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		
		<!-- CSS -->
		<link rel="stylesheet" href="./css/layout.css">
		<link rel="stylesheet" href="./css/register.css">
		
		<!-- Javascript -->
		<script src="./js/jquery.js"></script>
		<script src="./js/jquery.validate.js"></script>
		<script src="./js/register.js"></script>
		
    </head>
    <body>
	
		<div id="bloc_page">
			<div id="header">
				<img src="./css/images/small_globe.png" alt="International" />
				<h2>International project : registering</h2>
			</div>
			
			<div id="content">
				<div id="confirmation">
				  '. $okText .'
				</div>
			
			</div>
		</div>
		
    </body>
</html>';
  }
  
  private function displayOk() {
    if($this->data["ok"] == true) 
      return ("<h3>OK Captain, account created</h3>"); 
    else return ("<h3>Oops, can't create your account </h3>");
  }
}

?>

