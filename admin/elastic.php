<?php 
require 'classes/Authentication.php';
require 'classes/Goldbook.php';
session_start();

$authentication = new Authentication();
if (!isset($_SESSION['accessGranted']) || !$_SESSION['accessGranted']) {
	$result = $authentication->grantAccess($_POST['login'], $_POST['mdp']);
	if (!$result){
		header('Location: /admin/?action=error');
	} else {
		$_SESSION['accessGranted'] = true;
	}
}

?>
<!doctype html>
<html class="no-js" lang="en">
<head>
	<?php include_once 'inc-meta.php';?>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script src="http://emailinterface.s3.amazonaws.com/1.0/emailinterface.js" type="text/javascript"></script>
<link href="http://emailinterface.s3.amazonaws.com/1.0/emailinterface.css" rel="stylesheet" type="text/css" />
</head>
<body>	
	<?php require_once 'inc-menu.php';?>
  	
<!--SETUP A DIV ELEMENT TO LOAD THE DASHBOARD INTO, PLACE ANYWHERE YOU WOULD LIKE ON THE PAGE. STYLE IS BEST IF AT LEAST 1024px WIDE-->
<div id="mycontainer"></div>

<!--CALL INIT TO LOAD THE DASHBOARD-->
<script type="text/javascript">
ee.lang["fr"].teasertext = "<h1>Email Marketing</h1>";
ee.init("mycontainer", true);
ee.api.path = "https://api.elasticemail.com";
</script>

<script>
			
			$(document).ready(function() {
				$('#eusername').val("jgonzalez@iconeo.fr");
				$('#epassword').val("iconeo33");					
			});
		</script>

		
</body>
</html>


