<?php
require_once "LayoutView.php";

class RegisteredView extends LayoutView{

  // for this view, expecting an array with one "ok" field containing true 
  // if the insert went alright.
  private $data;
  
  public function __construct($data = null) {
    parent::__construct("Internation Project : registered");
    $this->data = $data;
  }
  
  public function setData($data) {
    $this->data = $data;
  }
  
  
  public function content() {
    $okText = $this->displayOk();
    return '
      <div id="confirmation">
        '. $okText .'
      </div>
      ';
  }
  
  private function displayOk() {
    if($this->data["ok"] == true) 
      return ("<h3>OK Captain, account created</h3>"); 
    else return ("<h3>Oops, can't create your account </h3>");
  }
}

?>

