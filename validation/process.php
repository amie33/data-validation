<?php ob_start(); ?>
<!--this is the proccess page of my email/phone number validaton-->
<!doctype html> 
<html lang ="en"> 
<head> 
	<title>Validation Proccess Page</title> 
	<link rel="stylesheet" href="css/styleprocess.css" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Amatic+SC&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Cinzel&display=swap" rel="stylesheet">
</head>
	<body> 
		<h1 class="pHeading">Your Information Validation</h1>
		<div = "pWrapper"> 
		<?php
			#check to see if submit has been pressed, Then take the phoneNum from the index form page and post it to pNumber in the process page
			#if the users phone number does NOT match the regular expression format send an error code 
			#just for reference you want the phone number to look like so (xxx)xxx-xxxx
			#/d matches a digit and the number is how many digits 
			#^matches at the begining of a line,/.../ begining and end of regular expression  
			#\s matches whitespace
			#if(isset($_POST['phoneNum']) && isset($_POST['emailAdd']))//if the varibles are set 
			#if(!empty($_POST['phoneNum']) && !empty($_POST['emailAdd']))//make sure phoneNum isnt empty and emailAdd isnt empty 
			
//SO FAR ALL THIS IS SAYING IS IF THE PHONE NUMBER AND EMAIL ADDRESS INPUT BOXES ARE FILLED OUT CORRECTLY AND THEY MATCH THE REGULAR EXPRESSION POST THEM TO THE PROCESS PAGE AND IF THEY DO NOT MATCH THE REGULAR EXPRESS REDIRECT TO THE IDEX PAGE 
			$ec = 0; 
			if(isset($_POST['phoneNum'])) $phoneNum = $_POST['phoneNum']; else $phoneNum = "";
			if(isset($_POST['emailAdd'])) $emailAdd = $_POST['emailAdd']; else $emailAdd = "";
			if(!empty($_POST['phoneNum']) && !empty($_POST['emailAdd']))//if the input boxes phoneNum and emailAdd ARE NOT EMPTY 
			{
				#$phoneNum = $_POST['phoneNum'];#initialize and set variables
				#$emailAdd = $_POST['emailAdd'];#initialize and set variables 
				if(preg_match('#^\(?\d{3}\)?\s*\d{3}-\d{4}#', $_POST['phoneNum']))
					{
						echo "<p class='infoDisplayed1'> Good Job, Your Phone Number is correct: " .ucfirst($phoneNum) . "</p>";
						
					}else{
						$ec += 1;
						#header ("Location: index.php?p=&ec=");
					}
				if(preg_match("/^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+$/", $_POST['emailAdd']))
					{
						echo "<p class='infoDisplayed2'> Good Job, Your Email Address is correct: " . ($emailAdd) . "</p>";
						echo "<img class = 'it' src='img/it.jpg'>";
						
					}else{
						$ec += 2;
						#header("Location: index.php?e=&ec=");
					}
			}
			else{
				if(empty($_POST['phoneNum']))
				{
					$ec += 1;
					
				}
				if(empty($_POST['emailAdd']))
				{
					$ec += 2;
				}
				
			}
			if($ec > 0){
				header ("location: index.php?ec=$ec&p=$phoneNum&e=$emailAdd"); 
				ob_enf_fluch();
			}
			
		?>
		</div> 
	</body> 
</html>
