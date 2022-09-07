
	<?php 
	
			$server = "localhost";
			$login = "root";
			$pass = "";
			try 
			{ 
			  $bdd = new PDO("mysql:host=$server;dbname=mon_resto_db",$login,$pass); 
			  $bdd-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			  //echo "connexion a la base de donnée réussi<br/>";
			} 
			catch(PDOException $e) 
			{ 
			  echo 'Echec de la connexion : ' .$e->getMessage();
			} 
			
			
				
		?>

