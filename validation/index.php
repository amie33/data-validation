<!-- This is the index page to my email and phone number validation--> 
<?php
#$_GET is grabbing from the url, you also need isset so the varible v exists 
	if(isset($_GET['v']) && $_GET['v'] == 'false')
	{
		$displayError = true; 
	}else{
		$displayError = false;
	}
	if(isset($_GET['p'])) $pvalue = $_GET['p']; else $pvalue = ""; 
	if(isset($_GET['e'])) $evalue = $_GET['e'];	else $evalue = "";
	if(isset($_GET['ec'])) $ecvalue = $_GET['ec']; else $ecvalue = 0; #is ecvalue = 0 no errors made 
#create an errorCode varible so you know what the user messed up on ec = 1 phone, ec = 2 email, ec = 4 both
	
?>

<!doctype html> 
<html lang ="en"> 
<head>
	<title>Validation Index</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Sigmar+One&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Press+Start+2P&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Rubik+Mono+One&display=swap" rel="stylesheet">
</head>
	<body> 
		<h1 class= "main-heading">Your Information Pretty Please</h1>
			<div class="wrapper">
				<form id="theForm" method ="post" action="process.php">
					<input id ="input1" name ="phoneNum" type ="text" value = "<?php echo $pvalue ?>" placeholder="Enter Your Phone Number Please">
					<input id ="input" name ="emailAdd" type ="text" value = "<?php echo $evalue ?>" placeholder="Enter Your Email Address Please">
					
					<input name ="register" type ="submit">
					</form>
					<?php
						#if displayError is true you will dispaly this warning
						#based on our errorCode we will display a different message to the user 
						switch($ecvalue)
						{
							case 3: echo '<p class="errorCode">You Really Though I was Gonna Let You Get Away With That? Try Again Fool!</p>'; echo '<img class ="pic" src="img/scream.jpg"/>'; break;
							case 2: echo '<p class="errorCode"> Wow, Lets Try Entering in Your Email Correctly!</p>'; echo'<img class ="pic" src ="img/puff.jpg"/>'; break; 
							case 1: echo '<p class="errorCode"> Ummm, Try to Enter Your Phone Number Again Correctly!</p>'; echo'<img class="pic" src="img/beet.jpg"/>'; break;
						}
					?>
			</div>
	</body>
</html>
