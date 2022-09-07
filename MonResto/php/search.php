


	<?php
		include('../includes/head.php');
		include('../includes/connexion_bd.php');
	?>
	


	<?php
		include('../includes/fonction.php');
		
		
		$insertion = "SELECT * FROM user WHERE user_id=:id";
			
			$requete = $bdd->prepare($insertion);
			
			$requete->bindParam(':id', $_SESSION['user_id']);
					
			$requete->execute();
	
	?>
	
	<link rel="stylesheet" type="text/css" href="../css/main.css"/>


	 <div class="boxer text-center">

            <h2>
                <a href="main.php">Recherche</a>
            </h2>

    </div>


	<div class="container">
	<div class="row    ">
        <div class="box col-md-12">
		

		<center>
			<form class="col-md-8 col-md-offset-6 text-center" action="search.php" method="POST" accept-charset="utf-8">
                    <div class="form-group">
                        
                        <input  id="searchForm" class="form-control" name="query" placeholder="Trouvez les saveurs de vos rêves..." style="text-align:center; color:black;">
                    </div>
				
            </form>
        </center>
		
		
		<?php
			if (isset($_POST['query']))
			{
				$mot_search = securisation($_POST['query']);
				
				$mot_search=strtolower($mot_search);
			
			
		
		
			$insertion = "SELECT *	 FROM mes_resto WHERE nom_resto LIKE ?  OR localisation_resto LIKE ? ";
				
			
			
			$query = $bdd->prepare($insertion);
			
			
			
			
			$query->execute(array("%".$mot_search."%","%".$mot_search."%"));
			
			
			
		
			
			
			}
			
		
		
		?>
		
		
		
		
		
		
		<div class="wrapperr row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
						<?php
		
		while($resultat = $query->fetch())
		{
	?>

							<div class="carousel ">
								<a href="description_resto.php?nom_resto=<?php echo $resultat['nom_resto'];?>&amp;number=<?php echo $resultat['resto_id'];?>">
									<div class="carde carde-3">
										<div  class="image2_div">
												<img class="image2 " src="<?php echo $resultat['image_resto']; ?>" alt="{{ defi.title }}" >
										</div>

										<div  class="titre">
											<h3><?php echo $resultat['nom_resto']; ?></h3>
										</div>
										<div  class="vile">
											<h3><?php echo $resultat['localisation_resto']; ?></h3>
										</div>
									</div>
								</a>
							</div>
								<?php
		
		}
	
	?>
		
						</div>
						
		
		
		
		
		
		
		
		

					
		</div>
	</div>
	
</div>





	
	
	
	
	
	
	
	


	<?php
		include('../includes/foot.php');
	
	?>





