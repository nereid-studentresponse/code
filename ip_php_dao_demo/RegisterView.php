<?php
require_once "LayoutView.php";

class RegisterView extends LayoutView{

  // expecting nothing here
  private $data;
  
  public function __construct($data = null) {
    parent::__construct("Internation Project : registering");
    $this->data = $data;
  }
  
  public function setData($data) {
    $this->data = $data;
  }
  
  public function content() {
        return '
				<div id="authentication">
					<form action="index_router.php?page=register" method="post" id="registrationForm">
						<fieldset id="globalInformation">
							<legend>Registering : </legend>
							<div id="mailLabel" class="formBlock">
								<label for="mail">Email :</label>
								<input type="text" name="mail" />
							</div>
							<div id="passwordLabel" class="formBlock">
								<label for="password">Password :</label>
								<input type="password" name="password" id="password" />
							</div>
							<div id="passwordLabel2" class="formBlock">
								<label for="password2">Confirm password :</label>
								<input type="password" name="password2" />
							</div>
						</fieldset>
						<fieldset id="globalInformation">
							<legend>Personal information : </legend>
							<div id="firstNameLabel" class="formBlock">
								<label for="firstName">First name :</label>
								<input type="text" name="firstName" />
							</div>
							<div id="lastNameLabel" class="formBlock">
								<label for="lastName">Last name :</label>
								<input type="text" name="lastName" />
							</div>
							<div id="statusLabel" class="formBlock">
								<label for="status">You are :</label>
								<div class="radio">
									<input type="radio" name="status" value="student">a student</br>
									<input type="radio" name="status" value="teacher">a teacher
								</div>
							</div>
							<div id="yearLabel" class="formBlock">
								<label for="year">Year :</label>
								<select name="year" id="year" size="1"> 
									<option value="1">First year</option> 
									<option value="2">Second year</option> 
									<option value="3">Third year</option> 
									<option value="4">Fourth year</option> 
									<option value="5">Fifth year</option> 
								</select>
							</div>
							<div id="specialityLabel" class="formBlock">
								<label for="speciality">Your speciality :</label>
								<input type="text" name="speciality" />
							</div>
						</fieldset>
						<fieldset id="globalInformation">
							<legend>School information : </legend>
							<div id="countryLabel" class="formBlock">
								<label for="country">Country :</label>
								<select name="country" id="country" size="1"> 
									<option value="chile">Chile</option> 
									<option value="france">France</option> 
								</select>
							</div>
							<div id="cityLabel" class="formBlock">
								<label for="city">City :</label>
								<select name="city" id="city" size="1"> 
									<option value="concepcion">Concepcion</option> 
									<option value="lyon">Lyon</option> 
								</select>
							</div>
							<div id="nameLabel" class="formBlock">
								<label for="name">Name :</label>
								<select name="name" id="name" size="1"> 
									<option value="conception">Concepcion University</option> 
									<option value="insa">INSA Lyon</option> 
								</select>
							</div>
						</fieldset>
						<input type="submit" value="Confirm"/>
					</form>
				</div>
				
        <!-- Javascript -->
		    <script src="./js/jquery.js"></script>
		    <script src="./js/jquery.validate.js"></script>
		    <script src="./js/register.js"></script>';
  }
}

?>

