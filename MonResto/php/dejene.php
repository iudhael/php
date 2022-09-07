<?php



	if(isset($_SESSION['resto_id']) && empty($_SESSION['resto_id']) && isset($_SESSION['nom_resto']) && empty($_SESSION['nom_resto']))
	{
		header('Location:main.php');
		
	}






?>





<link rel="stylesheet" type="text/css" href="../css/dej.css"/>
	
	
<?php
	include('../includes/head.php');
	
	?>
	
			<?php
	
		include('../includes/connexion_bd.php');
	
	?>
				<?php
	
		include('../includes/fonction.php');
	
	?>
	
	
	<?php
	
		
			$insertion = "SELECT * FROM mes_resto,dejene WHERE dejene.resto_id = :resto_id AND mes_resto.nom_resto = :nom_resto  ";
			
			$requete = $bdd->prepare($insertion);
			
			$nom_resto=securisation($_SESSION['nom_resto']);
			$resto_id=$_SESSION['resto_id'];
			
			$requete->bindParam(':resto_id', $resto_id);
			$requete->bindParam(':nom_resto', $nom_resto);
			
			$requete->execute();
		
		
	?>


	
	 <div class="boxer text-center">

            <h2>
                <a href="dejene.php?commande=dejene">Déjené</a>
            </h2>

    </div>
	

<div class="container">
	<div class="row    ">
        <div class="box">
		
		
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
									<form method= "POST" action= "vos_dejene.php" class="">
										<table class="table">
											<thead class="color_head">
												<tr class="text-center tr_head">
													<th>Num</th>
													<th>Nom</th>
													<th>Prix</th>
													<th>Nbre</th>
													<th>Choix</th>
												</tr>
										
											</thead> 
											<tbody>
											<?php
											$i=1;
												while($resultat = $requete->fetch())
												{
											
											?>
												<tr class="text-center text-white">
													<th><?php echo $i;?></th>
													<th><?php echo $resultat['nom'];?></th>
													<th><?php echo $resultat['prix'];?></th>
													<th><input value="<?php echo $resultat['nom'];?>"  min ="1" type="number" name="nbre_dej[]"  class="text-center"/></th>
													<th><input value="<?php echo $resultat['nom'];?>"  type="checkbox" name="dej_choix[]" id="flexCheckChecked" class="form-check-input"/></th>
												</tr>
												
												<?php
												$i++;
												}
											
											?>
					
											</tbody>
										</table>
									
										<div class="inputbox">
											<input type="submit" name="envoye" value="Envoyer">
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
