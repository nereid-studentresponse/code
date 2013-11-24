<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head>
        <title>International project</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		
		<!-- CSS -->
		<link rel="stylesheet" href="./css/layout.css">
		
		<!-- Javascript -->
		
    </head>
    <body>
		<div id="bloc_page">
			<?php require_once("header.php"); ?>
			
			<div id="content">
			
				<div id="error">
					<?php echo $error; ?>
				</div>
				
				<div id="authentication">
					<form action="index.php" method="post">
						<fieldset>
							<legend> Please login here : </legend>
							<label for="login" class="inline">Login :</label>
							<input type="text" name="login" />
							<label for="password" class="inline">Password :</label>
							<input type="password" name="password" />
							<input type="submit" value="Enter" />
						</fieldset>
					</form>
					<p>Not registered yet ? <a href="register.php">Create an account here</a> to explore this fabulous prototype !</p>
				</div>
				
				<div id="websitePresentation">
					<fieldset>
						<legend> About the website : </legend>
						<p>This website is a prototype realised by three chilean students and two french students, as part of their courses in the 
						Conception University and the INSA Lyon School.</p>
						<p>It is an <span class="bold">interactive web-based system</span> for helping teachers on engaging students on theirs courses. With this website, teachers can create and manage courses, 
						lessons and questions related to their program, and students can follow lessons, take notes and answer questions.</p>
						<p>Enjoy this new educational tool !</p>
					</fieldset>
				</div>
			
			</div>
		</div>
		
    </body>
</html>