<?php
	include('../includes/head.php');
	
?>
		
		<?php
	
		include('../includes/connexion_bd.php');
	
	?>



	<?php
	
	$_SESSION = array();
	session_destroy();
	// Suppression des cookies de connexion automatique
	setcookie('username', '');
	setcookie('pass', '');
	
		header('Location:login.php');
		
	
	
	
	?>












<?php
	include('../includes/foot.php');
	
	?>