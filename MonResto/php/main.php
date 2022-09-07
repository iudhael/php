


<?php
	include('../includes/head.php');
	
?>
		
		<?php
	
		include('../includes/connexion_bd.php');

	?>






	
	<?php
	
		$insertion = "SELECT  * FROM mes_resto ORDER BY nom_resto ASC ";
				$requete = $bdd->prepare($insertion);
				$requete->execute();
				
				
	
	
	
	?>

<link rel="stylesheet" type="text/css" href="../css/main.css"/>







	 <div class="boxer text-center">

            <h2>
                <a href="main.php">Nos Restaurants</a>
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
		

						<div class="wrapperr row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
						<?php
		$i=0;
		while($resultat = $requete->fetch())
		{
		
	?>
	

							<div class="carousel ">
								<a href="description_resto.php?nom_resto=<?php echo $resultat['nom_resto'];?>">
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
		$i++;
		}
	
	?>
		
						</div>
						
					
			
			
		</div>
	</div>
	
</div>





	
	
	
	
	
	
	


	<?php
	include('../includes/foot.php');
	
	?>