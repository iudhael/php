
<?php
	session_start();
	
	
	
	
	
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Search resto</title>
	
	<link rel="stylesheet" type="text/css" href="../css/navbar.css"/>
		<link rel="stylesheet" type="text/css" href="../css/footer.css"/>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css"/>

</head>

<body>
		
	<?php
		include('connexion_bd.php');
	$insertion = "SELECT * FROM user WHERE user_id=:id";
			
			$requete = $bdd->prepare($insertion);
			
			$requete->bindParam(':id', $_SESSION['user_id']);
					
			$requete->execute();
			$resultat=$requete->fetch();
			$_SESSION['permission']=$resultat['permission'];
	if($_SESSION['permission'] == 0)
	{
		
		include('menu.php');
	}
	/*if($resultat['permission'] == 2)
	{
		
		include('menu_admin.php');
	}*/
	if($_SESSION['permission']  == 2)
	{
		
		include('menu_super_admin.php');
	}
	
	
	?>
	