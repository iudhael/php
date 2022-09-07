
	<?php 
	
			$server = "localhost";
			$login = "root";
			$pass = "";
			try 
			{ 
			  $bdd = new PDO("mysql:host=$server;dbname=pagination",$login,$pass); 
			  $bdd-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			  //echo "connexion a la base de donnée réussi<br/>";
			} 
			catch(PDOException $e) 
			{ 
			  echo 'Echec de la connexion : ' .$e->getMessage();
			} 
			
			
				
		?>

