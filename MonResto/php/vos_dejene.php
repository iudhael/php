
<?php
	include('../includes/head.php');
	
	?>
	<link rel="stylesheet" type="text/css" href="../css/dej.css"/>



<?php



	if(isset($_SESSION['resto_id']) && empty($_SESSION['resto_id']) && isset($_SESSION['nom_resto']) && empty($_SESSION['nom_resto']))
	{
		header('Location:main.php');
		
	}






?>








	

	
			<?php
	
		include('../includes/connexion_bd.php');
	
	?>
				<?php
	
		include('../includes/fonction.php');
	
	?>
	

	
	
	
	
	

	 <div class="boxer text-center">

            <h2>
                <a href="main.php">Vos choix</a>
            </h2>

    </div>
	


<div class="container">
	<div class="row    ">
        <div class="box">
		
			<?php


	
	
	if(!isset($_POST['dej_choix']) || !isset($_POST['nbre_dej']) )
			{
				  /*revoir  */
				  
				  
					header('Location:dejene.php');
				
			
			}
			
			
		if(isset($_POST['nbre_dej']) && isset($_POST['envoye']))
											{	
												foreach( $_POST['nbre_dej'] as $valeu )
													
												{
														
														
														echo $valeu;
														foreach( $_POST['dej_choix'] as $valeur)
													
														{
															
														}
																
														echo $valeur;
												}	
											}
					
					
				
		?>

		
			<center>
				<form class="col-md-8 col-md-offset-6 text-center" action="search_dej.php" method="POST" accept-charset="utf-8">
						<div class="form-group">
							
							<input  id="searchForm" class="form-control" name="query" placeholder="Trouvez les saveurs de vos rêves..." style="text-align:center; color:black;">
						</div>
					
				</form>
			</center>
			
			<center>

					<div class="section">
						
						<div class="box">
							<div class="square" style="--i:0;"></div>
							<div class="square" style="--i:1;"></div>
							<div class="square" style="--i:2;"></div>
							<div class="square" style="--i:3;"></div>
							<div class="square" style="--i:4;"></div>
							<div class="content">
							
					
							
							
								<div class="form table-responsive">
									<form method= "POST" action= "login.php" class="">
										<table class="table">
											<thead class="color_head">
												<tr class="text-center tr_head">
													<th>Num</th>
													<th>Nom</th>
													<th>Nbre</th>
													<th>Prix</th>
													
												</tr>
										
											</thead> 
											<tbody>
											<?php
											
											$i=1;
											$total = 0;
											if(isset($_POST['dej_choix']) && isset($_POST['envoye']) && !empty($_POST['envoye']))
											{	
												foreach( $_POST['dej_choix'] as $valeur)
													
												{
														

													$insertion = "SELECT *,SUM(prix) AS total_prix FROM mes_resto,dejene WHERE dejene.resto_id = :resto_id AND mes_resto.nom_resto = :nom_resto AND nom = :valeur ";
											
													$requete = $bdd->prepare($insertion);
													
													$nom_resto=securisation($_SESSION['nom_resto']);
													$resto_id=$_SESSION['resto_id'];
													
													$requete->bindParam(':resto_id', $resto_id);
													$requete->bindParam(':nom_resto', $nom_resto);
													$requete->bindParam(':valeur', $valeur);
											
													$requete->execute();
											
											
												
											while($resultat=$requete->fetch())
						
											{
													$total += $resultat['total_prix'];
												//echo $resultat['nom'];
												
												
											?>
											
											
											
												<tr class="text-center text-white">
													<th><?php echo $i;?></th>
													<th><?php echo $resultat['nom'];?></th>
													<th><?php echo "nbre";?></th>
													<th><?php echo $resultat['prix'];?></th>
													
												</tr>
												
											
											<?php
														$i++;
														}
													}
												}


											?>
											
					
											</tbody>
										</table>
									
							
										<h2 class="text-white">Prix Total: <?php echo $total;?> fcfa</h2>
										<div class="inputbox">
											<input type="submit" name="envoye" value="Envoyer à la cuisine">
										</div>
									</form>
										
										
										
									
								
									

								</div>
							

							</div>
						</div>
			</center>
		</div>
					
	</div>	

</div>

		

	<?php
	include('../includes/foot.php');
	
	?>
