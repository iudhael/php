<?php
	include('../includes/head.php');
	
?>
<?php
	include('../includes/fonction.php');
	include('../includes/connexion_bd.php');
	


?>

<?php
	if(isset($_POST['jour']) && isset($_POST['mois']) && isset($_POST['anne']) && isset($_POST['heure']) && isset($_POST['table']))
	{
		$j= (int) securisation($_POST['jour']);
		$m= (int) securisation($_POST['mois']);
		$a= (int) securisation($_POST['anne']);
		$h= (int) securisation($_POST['heure']);
		$msg_date_error = verification_date($j,$m,$a);
		
		
		$date =  $a."-".$m."-".$j;
		$table_id=recup_table_id($_POST['table']);
		$msg_reserv_error=reservation_exite($date,$table_id);
		
		
		
		
		
		
		if(empty($msg_date_error) && empty($msg_reserv_error))
		{
			reservation($date,$h,$table_id);
			header('Location:merci.php');
			
		}
		
		
	}
	

	


?>

	<?php
	
			$insertion = "SELECT *  FROM table_resto WHERE  resto_id = :resto_id ";
			$requete = $bdd->prepare($insertion);
		
			$requete->bindParam(':resto_id', $_SESSION['resto_id']);
			$requete->execute();
			


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
				
				<?php
				
				?>
				
				
					<div class="form">
						<h2>Reservation</h2>
						<form method= "POST" action= "reservationform.php">
							
							
							<div class="inputbox">
								<input  type="number", min="<?php echo date('d');?>" max="31" name="jour", placeholder="num du jour  de la date de reservation..." required >
							</div>
							<div class="inputbox">
								<input  type="number", min="<?php echo date('m');?>" max="12" name="mois", placeholder="num du moi de la date de  la reservation..." required >
							</div>
							
							<div class="inputbox">
								<input  type="number", min="<?php echo date('Y');?>" name="anne", placeholder="annee de la date de  reservation..." required >
							</div>
							
							<div class="inputbox">
								<input  type="number", min="0" max="23" name="heure", placeholder="heure de debut de la reservation..." required >
							</div>
							
							<div class="inputbox">
							
							
								<select class ="form-selectt form-select-lg nb-3" name="table" id="table" class="form-control">
									<?php
	
			
										while($resultat = $requete->fetch())
										{

									?>
									<optgroup label="<?php echo $resultat['categori'];?>">
													
										<option value="<?php echo $resultat['type'];?>"><?php echo $resultat['type'];?></option>
														
														
									</optgroup>
											<?php
	
										}
									?>															
								
													
								</select>
								
											
							</div>

							<div class="inputbox">
								<input type="submit" name="reserver" value="reserver">
							</div>
							
						
								
								
						</form>	
						<?php

							if(!empty($msg_date_error) || !empty($msg_reserv_error))
								{
									echo "<h2>Error<h2>";
									echo "<div class=' alert alert-danger'>
											<div class=''>
												
												$msg_date_error
												$msg_reserv_error
																				
																					
											</div>
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