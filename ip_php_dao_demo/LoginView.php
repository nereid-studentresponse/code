<?php
require_once "LayoutView.php";

class LoginView extends LayoutView {
  
  public function __construct($data = null) {
    parent::__construct("Internation Project : welcome !");
  }
  
  public function setData($data) {
    $this->data = $data;
  }

  public function content() {
	return '
	<div id="loginView">
		<div id="error">
			<?php echo $error; ?>
		</div>
		
		<div id="authentication">
			<form action="index_router.php?page=login" method="post">
				<fieldset>
					<legend> Please login here : </legend>
					<label for="email" class="inline">Email :</label>
					<input type="text" name="email" />
					<label for="password" class="inline">Password :</label>
					<input type="password" name="password" />
					<input type="submit" value="Enter" />
				</fieldset>
			</form>
			<p>Not registered yet ? <a href="index_router.php?page=register">Create an account here</a> to explore this prototype !</p>
		</div>
		
		<div id="websitePresentation">
			<fieldset>
				<legend> About the website : </legend>
				<p>This website is a prototype realised by two chilean students and three french students, as part of their courses in the 
				Conception University and the INSA Lyon School.</p>
				<p>It is an <span class="bold">interactive web-based system</span> for helping teachers on engaging students on theirs courses. With this website, teachers can create and manage courses, 
				lessons and questions related to their program, and students can follow lessons, take notes and answer questions.</p>
				<p>Enjoy this new educational tool !</p>
			</fieldset>
		</div>
	</div>'
	;
}

}
?>
