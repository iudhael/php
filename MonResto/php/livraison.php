<?php
	include('../includes/head.php');
	
?>


<?php


	if(isset($_SESSION['resto_id']) && empty($_SESSION['resto_id']) && isset($_SESSION['nom_resto']) && empty($_SESSION['nom_resto']))
	{
		header('Location:main.php');
		
	}




?>


<?php
	include('../includes/fonction.php');
	include('../includes/connexion_bd.php');
	


?>
<?php
	if(isset($_POST['position_vile']))
	{
		
		$new_position=securisation($_POST['position_vile']);
		livraison_update_position($new_position);
		header('Location:commande.php');
		$_SESSION['liv_cmd']=livraison;
		 unset($_SESSION['panier']);

		
	}
//unset($_SESSION['liv_cmd']);
	

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
				
				<?php
				
				?>
				
				
					<div class="form">
						<h2>Livraison</h2>
						<form method= "POST" action= "livraison.php">
							
							
							
							<div class="inputbox">
								<input  type="text", name="position_vile", placeholder="Entrez votre position..." required >
							</div>

							<div class="inputbox">
								<input type="submit" name="envoyer" value="Envoyer">
							</div>
							
						
								
								
						</form>	
						

					</div>
					
					<?php
				
				
				
				?>

				</div>
			</div>
		</div>
		</center>
		



<?php
	include('../includes/foot.php');
	
	?>