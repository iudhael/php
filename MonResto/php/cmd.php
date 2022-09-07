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
			$types=array('petit-dej', 'dejene', 'dine', 'boisson');
			$type_cmd=$_GET['commande'];
			if(!isset($type_cmd) || empty($type_cmd))
			{
					header('Location:commande.php');	
			}
			if(!in_array($type_cmd, $types))
				{
			
					header('Location:commande.php');
				}
			
		$requete=commande($type_cmd);

		
	?>
	
	
	<?php
	
		
		require_once('../includes/gestion_panier.php');
	
	/*foreach($_SESSION['panier']['quantite'] as $k=>$va)
	{
		
		echo $va;
		
	}*/
	
	
	
	
	
	
	
	
	
	
	
	
	
	?>
	
	
	
	<?php
		if($type_cmd=="petit-dej" || $type_cmd=="boisson")
		{
			
	
	?>
	<div class="boxer text-center">

            <h2>
                <a href="petit_dej.php?commande=petit_dej"><?php echo ucfirst($type_cmd);?></a>
            </h2>

    </div>
	<?php
		
		}
	
	?>
	
		<?php
		if($type_cmd=="dejene")
		{
			
	
	?>
	<div class="boxer text-center">

            <h2>
                <a href="petit_dej.php?commande=petit_dej">Déjené</a>
            </h2>

    </div>
	<?php
		
		}
	
	?>
	
		<?php
		if($type_cmd=="dine")
		{
			
	
	?>
	<div class="boxer text-center">

            <h2>
                <a href="petit_dej.php?commande=petit_dej">Diné</a>
            </h2>

    </div>
	<?php
		
		}
	
	?>
	
		
	

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
									
										<table class="table">
											<thead class="color_head">
												<tr class="text-center tr_head">
													<th>Num</th>
													<th>Nom</th>
													<th>Prix</th>
													<th>Nbre</th>
													<th>Add</th>
												</tr>
										
											</thead> 
											<tbody>
											<?php
											$i=1;
											 
												while($resultat=$requete->fetch())
												{
													
													
													//echo $resultat['id'];
													
											?>
											<form method= "POST" action= "cmd.php?action=add&code=<?php echo $resultat['id']; ?>&commande=<?php echo $type_cmd;?>">
											
												<tr class="text-center text-white">
													<th><?php echo $i;?></th>
													<th><?php echo $resultat['nom'];?></th>
													<th><?php echo $resultat['prix'];?></th>
													<th><input value="1"  min ="1" type="number" name="nbre_dej"  class="text-center product-quantity"/></th>
													<th><input class="btn btn-success" type="submit" name="add to cart" value="Add to cart"></th>
												</tr>
												
												
											</form>
												<?php
												$i++;
												}
											
											?>
					
											</tbody>
										</table>
									
										
									<a href="panier.php">Voir le panier</a>

									
											
											
								
									

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
