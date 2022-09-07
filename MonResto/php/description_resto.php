
<?php






?>
<link rel="stylesheet" type="text/css" href="../css/description_resto.css"/>


	
	
		
	<?php
	include('../includes/head.php');
	
	?>
	
	

		<?php
	
		include('../includes/connexion_bd.php');
		
		include('../includes/fonction.php');
	
	?>




	
	<?php
	
		/*$insertion = "SELECT  nom_resto,localisation_resto,image_resto
							FROM mes_resto ORDER BY nom_resto ASC ";
				$requete = $bdd->prepare($insertion);
				$requete->execute();
	*/
	
	

	$insertion = "SELECT * FROM mes_resto WHERE nom_resto=:nom_resto";
			
			$requete = $bdd->prepare($insertion);
			$nom_resto=securisation($_GET['nom_resto']);
			$requete->bindParam(':nom_resto', $nom_resto);
					
			$requete->execute();
			$resto= $requete->fetch();
			
			
				$_SESSION['nom_resto'] = $_GET['nom_resto'];
				$_SESSION['resto_id'] = $resto['resto_id'];
				
				
				
			if(!isset($_GET['nom_resto']) )
			{
					header('Location:main.php');
			
			}
			if(empty($_GET['nom_resto'])  )
			{
					header('Location:main.php');
			
			}
			
			/*
			if(!in_array($_GET['nom_resto'],)  )
			{
					header('Location:main.php');
			
			}
*/
	?>





	 <div class="boxer text-center">
			

            <h2>
                <a href="description_resto.php"><?php echo ucfirst($resto['nom_resto']); ?></a>
            </h2>
			
			

    </div>


	<div class="container">
	<div class="rowc    ">
        <div class="box row col-md-12">
			<div class="terxt-center bloc_descript  row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3  "  >
					
						<div class="col-md-5">
							<div class="carousel ">
								<a href="main.php">
									<div class="carde carde-3">
										<div  class="image2_div">
												<img class="image2 " src="<?php echo $resto['image_resto']; ?>" alt="{{ defi.title }}" >
										</div>

										
										
									</div>
								</a>
							</div>
						</div>
					
						
						
						<div class="description col-md-7">
							<h2 class = "text-center"><?php echo ucfirst($resto['nom_resto']); ?></h2>
							<div class="mar-left">
								<h4 class = ""><u>Vile</u>: <?php echo ucfirst($resto['localisation_resto']); ?></h4>
								<h4 class = ""><u>Téléphone</u>: <?php echo ucfirst($resto['tel_resto']); ?></h4>
								<h4 class = ""><u>Description</u>: <?php echo ucfirst($resto['description_resto']); ?></h4>
								
								
								
								<p>

								</p>
								
							</div>
							
							<div class="bouton">
								<a href="reservationform.php"> 
									<button  type="button" class="btn btn-success bt">Réserver</button>
								</a>
								
								<a href="choix_table_commande_form.php" >
									<button type="button" class="btn btn-warning bt">Commander</button>
								</a>
									
								<a href="livraison.php" >
									<button type="button" class="btn btn-danger bt">Se faire livrer</button>
								</a>
							</div>
						</div>
						
						
			</div>
		
		

						
					
			
			
		</div>
	</div>
	
</div>





	
	
	
	
	
	

	<?php
	include('../includes/foot.php');
	
	?>
	