<?php
	include('../includes/head.php');
	
?>


<?php
/*

	if(isset($_SESSION['resto_id']) && empty($_SESSION['resto_id']) && isset($_SESSION['nom_resto']) && empty($_SESSION['nom_resto']))
	{
		header('Location:main.php');
		
	}

*/


?>


<?php
	include('../includes/fonction.php');
	include('../includes/connexion_bd.php');
	


?>
<?php
	if(isset($_POST["envoyer"])){


		header('Location:merci_cmd.php');
		if(isset($_SESSION['liv_cmd']) && !empty($_SESSION['liv_cmd']))
		{
			//unset($_SESSION['liv_cmd']);
		}


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
				
				<?php
				
				?>
				
				
					<div class="form">
						<h2>Payement</h2>
						
						<form method= "POST" action= "payement.php">

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