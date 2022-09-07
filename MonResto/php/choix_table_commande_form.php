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

	$num_table_error="";
	if(isset($_POST['num_table']))
	{
					
					$new_num = securisation($_POST['num_table']);
					$num_table_error=num_tab($new_num,$_SESSION['resto_id']);
					
					if(empty($num_table_error))
					{
						
						update_num_tab_occupe($new_num);
						header('Location:commande.php');die();
					}
				
					
	}



?>







<link rel="stylesheet" type="text/css" href="../css/choix_table.css"/>



	
	
		<?php
		

		?>
	
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
						<h2>Table</h2>
						<form method= "POST" action= "choix_table_commande_form.php">
							
							

							<div class="inputbox">
								<input  min="0" type="number", name="num_table", placeholder="Entrez le nummero de votre table..." required >
							</div>

							<div class="inputbox">
								<input type="submit" name="envoyer" value="Envoyer">
							</div>
							
						
								
								
						</form>	
						
						<?php

							if(!empty($num_table_error))
								{
									echo "<h2>Error<h2>";
									echo "<div class=' alert alert-danger'>
											<div class=''>
												
												$num_table_error
																				
																					
											</div>";
								}
											
			?>

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