<?php
	include('../includes/head.php');
	
?>
<link rel="stylesheet" type="text/css" href="../css/main.css"/>



	
		<?php
	
		include('../includes/connexion_bd.php');
		include('../includes/fonction.php');
	
	?>





	
	<?php
	
		
	 $date_today = date("Y-m-d");
			$insertion = "SELECT *  FROM recette WHERE date_de_publication <= :date ORDER BY date_de_publication DESC";
			$requete = $bdd->prepare($insertion);
			$requete->bindParam(':date', $date_today);
			
			$requete->execute();
			
	
	?>

	<?php
			if (isset($_POST['query']))
			{
				$mot_search = securisation($_POST['query']);
				
				$mot_search=strtolower($mot_search);
			
			
		
		
			$insertion = "SELECT *	 FROM recette WHERE nom_recette LIKE ? AND date_de_publication <= ? ";
				
			
			
			$query = $bdd->prepare($insertion);
			
			
			
			
			$query->execute(array("%".$mot_search."%",$date_today));
			
			$row = $query->rowCount();
			
			
			
		
			
			
			}
			
		
		
		?>







	 <div class="boxer text-center">

            <h2>
                <a href="main.php">Nos Recettes</a>
            </h2>

    </div>


	<div class="container">
	<div class="row    ">
        <div class="box col-md-12">
		
		
		<center>
			<form class="col-md-8 col-md-offset-6 text-center" action="recette.php" method="POST" accept-charset="utf-8">
                    <div class="form-group">
                        
                        <input id="searchForm" class="form-control" name="query" placeholder="Trouvez les saveurs de vos rêves..." style="text-align:center; color:black;">
                    </div>
				
            </form>
        </center>
		

		<?php
		
		if (!isset($_POST['query']) || empty($_POST['query'])|| $row==0)
			{
				
		?>
						<div class="wrapperr row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
						<?php
		
		while($resultat = $requete->fetch())
		{
	?>

							<div class="carousel ">
								<a href="descript_recette.php?recette=<?php echo $resultat['nom_recette'];?>">
									<div class="carde carde-3">
										<div  class="image2_div">
												<img class="image2 " src="<?php echo $resultat['image_recette']; ?>" alt="{{ defi.title }}" >
										</div>

										<div  class="titre">
											<h3><?php echo $resultat['nom_recette']; ?></h3>
										</div>
										
									</div>
								</a>
							</div>
								<?php
		
		}
	
	?>
		
						</div>
					<?php		
			}
			
		else
			{
				
		?>
						<div class="wrapperr row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
						<?php
		
		while($resultat_rech = $query->fetch())
		{
	?>

							<div class="carousel ">
								<a href="descript_recette.php?recette=<?php echo $resultat_rech ['nom_recette'];?>">
									<div class="carde carde-3">
										<div  class="image2_div">
												<img class="image2 " src="<?php echo $resultat_rech ['image_recette']; ?>" alt="{{ defi.title }}" >
										</div>

										<div  class="titre">
											<h3><?php echo $resultat_rech ['nom_recette']; ?></h3>
										</div>
										
									</div>
								</a>
							</div>
								<?php
		
		}
	
	?>
		
						</div>
					<?php		
			}
			
				
		?>
			
			
		</div>
	</div>
	
</div>


<?php
	include('../includes/foot.php');
	
	?>