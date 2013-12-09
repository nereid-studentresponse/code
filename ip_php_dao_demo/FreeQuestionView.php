<?php
require_once "LayoutView.php";
require_once "FreeQuestion.php";
require_once "FreeAnswer.php";

class FreeQuestionView extends LayoutView
{

  // expecting a FreeQuestion at the "question" index
  private $data;

  function __construct ($data = null) {
    parent::__construct("Internation Project : Question", true);
    $this->data = $data;
  }

  public function setData($data) {
    $this->data = $data;
    // debug
    error_log(print_r($data, true));
  }

  public function content() {
#    $withAnswer = false;
    $q = $this->data["question"];
#    if(isset($this->data["answer"])) {
#      $withAnswer = true;
#      $a = $this->data["answer"];
#    }
    
    $form = '<form action="index_router.php?page=answer&type=free&qid='.$q->getId();
#    if($withAnswer) {
#      $form = $form . '&aid=' . $a->getId();
#    }
    $form = $form . '" method="post" id="freeAnswerForm">';
    
    $answerText = "";
#    if ($withAnswer) {
#      $answerText = $a->getText();
#    }
    
    $content = 
      '<div id="question">
        <p>'.$q->getTitle().'</p>
        <p>'.$q->getId().'</p>
        '.$form.'
          <textarea name="freeAnswer" rows="20" cols="80">
            '.$answerText.'
          </textarea>
          <input type="submit" value="Submit">
        </form>
      </div>';
      return $content;
  }

}

?>
