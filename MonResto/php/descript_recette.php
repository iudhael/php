
<?php
	include('../includes/head.php');
	
	?>
			<?php
	
		include('../includes/connexion_bd.php');
		
		include('../includes/fonction.php');
	
	?>

<link rel="stylesheet" type="text/css" href="../css/description_recette.css"/>


	
	
		
	
	
	





	
	<?php
	
		/*$insertion = "SELECT  nom_resto,localisation_resto,image_resto
							FROM mes_resto ORDER BY nom_resto ASC ";
				$requete = $bdd->prepare($insertion);
				$requete->execute();
	*/
	
	

	$insertion = "SELECT * FROM recette WHERE nom_recette=:nom_recette";
			$nom_recette=securisation($_GET['recette']);
			$requete = $bdd->prepare($insertion);
			
			
			$requete->bindParam(':nom_recette', $nom_recette);
					
			$requete->execute();
			$recette=$requete->fetch();
			
			
			if(!isset($_GET['recette']) )
			{
					header('Location:main.php');
			
			}
			if(empty($_GET['recette'])  )
			{
					header('Location:main.php');
			
			}
			
			
	?>





	 <div class="boxer text-center">
			

            <h2>
                <a href="descript_recette.php?recette=<?php echo $nom_recette;?>"><?php echo ucfirst($recette['nom_recette']); ?></a>
            </h2>
			
			

    </div>


	<div class="container">
	<div class="row">
        <div class="box row col-md-12">
			<div class="terxt-center bloc_descript"  >
					
						<div class="col-md-12">
							<div class="carousel ">
								<a href="main.php">
									<div class="carde carde-3">
										<div  class="image2_div">
												<img class="image2 " src="<?php echo $recette['image_recette']; ?>" alt="{{ defi.title }}" >
										</div>

										
									</div>
								</a>
							</div>
						</div>
					
						
						
						<div class="description col-md-12">
							
							<div class="mar-left">
								<h4 class = "">Ingredients:</h4>
								<div class="ingredient">
									<?php echo $recette['ingredient']; ?>
								</div>
								
								<h4 class = "text-center">Préparation</h4>
								
								<div>
									<?php echo $recette['description_recette']; ?>
								
								</div>
								
								
								
								
							</div>
							
							
						</div>
						
						
			</div>
		
		

						
					
			
			
		</div>
	</div>
	
</div>





	
	
	
	
	
	

	<?php
	include('../includes/foot.php');
	
	?>
	