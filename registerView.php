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
				<div id="authentication">
					<form action="register.php" method="post" id="registrationForm">
						<fieldset id="globalInformation">
							<legend>Registering</legend>
							<div id="mailLabel" class="formBlock">
								<label for="mail">Email :</label>
								<input type="text" name="mail" />
							</div>
							<div id="passwordLabel" class="formBlock">
								<label for="password">Password :</label>
								<input type="password" name="password" />
							</div>
							<div id="password2Label" class="formBlock">
								<label for="password2">Confirm password :</label>
								<input type="password" name="password2" />
							</div>
						</fieldset>
						<fieldset id="globalInformation">
							<legend>Personal information</legend>
							<div id="fistNameLabel" class="formBlock">
								<label for="fistName">First name :</label>
								<input type="text" name="fistName" />
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
							<legend>School information</legend>
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
			
			</div>
		</div>
		
    </body>
</html>