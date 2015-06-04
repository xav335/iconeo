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
</head>
<body>	
	<?php require_once 'inc-menu.php';?>
  	
	<div class="row">
		<div class="col-md-10">
			<h3>Statistiques</h3>
			<iframe id="laframe" src="http://www.iconeo.fr/awstats/awstats.pl?config=www.iconeo.fr&framename=mainright" style="width:720px;height:500px;" frameborder="1" ></iframe>
		</div>
		
	</div>	
		
</body>
</html>


