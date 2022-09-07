
<?php
	include('../includes/head.php');
	
?>


<?php


	if(isset($_SESSION['resto_id']) && empty($_SESSION['resto_id']) && isset($_SESSION['nom_resto']) && empty($_SESSION['nom_resto']))
	{
		header('Location:main.php');
		
	}




?>









<link rel="stylesheet" type="text/css" href="../css/choix_table.css"/>



	
	
		<?php
		
	

		
	?>
	<center>

		<div class="section">
			
			<div class="box">
				<div class="square" style="--i:0;"></div>
				<div class="square" style="--i:1;"></div>
				<div class="square" style="--i:2;"></div>
				<div class="square" style="--i:3;"></div>
				<div class="square" style="--i:4;"></div>
				<div class="content">
				
			
				
				
					<div class="form">
						<h2>MERCI</h2>
						<div class="container" style="margin: 10% auto;">
			<div style="margin:auto;"  class="text-white" role="alert">
				
				<hr>
				
					Merci pour votre reservation !
					<a href="main.php">
						<button type="button" class="btn btn-outline-warning"> Acceuil </button>

					</a>
					<br/>
					Ah n'oubliez pas de venir 30 minutes avant l'heure .
				
			</div>
		</div>
						

					</div>
					
					

				</div>
			</div>
		</div>
		</center>
		



<?php
	include('../includes/foot.php');
	
	?>