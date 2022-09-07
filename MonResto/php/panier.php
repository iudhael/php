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
	
		
			

		
	?>
	
	
	<?php
	

	
	
	require_once('../includes/gestion_panier.php');
	
	
	
	
	
	
	?>

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	


	
	 <div class="boxer text-center">

            <h2>
                <a href="petit_dej.php?commande=petit_dej">Panier</a>
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
							
					
							<a id="btnEmpty" href="panier.php?action=empty" class="btn btn-danger">Vider le panier</a>
								<?php
								        
										/*if ($nbArticles <= 0)
										echo "<tr><td>Votre panier est vide </ td></tr>";*/
									if(isset($_SESSION["panier"])){
										$nbArticles=count($_SESSION['panier']['nom']);
										$total_quantity = 0 ;
										$prix_total = 0 ;
										
								?>	
							
								<div class="form table-responsive">
									
										<table class="table">
											<thead class="color_head">
												<tr class="text-center tr_head">
													<th>Num</th>
													<th>Nom</th>
													<th>Quantité</th>
													<th>Prix unitaire</th>
													<th>Prix</th>
													<th>supprimer</th>
												</tr>
										
											</thead> 
											<tbody>
											<?php
											$j=0;
											
											 
												for ($i=0 ;$i < $nbArticles ; $i++)
            {
													$j++;
													$choix_prix = $_SESSION["panier"]['quantite'][$i]*$_SESSION["panier"]['prix'][$i] ;
													//echo $choix_prix;
													
											?>
											
												<tr class="text-center text-white">
													<th><?php echo $j;?></th>
													<th><?php echo $_SESSION["panier"]['nom'][$i];?></th>
													<th><?php echo $_SESSION["panier"]['quantite'][$i];?></th>
													<th><?php echo $_SESSION["panier"]['prix'][$i];?></th>
													
													<th><?php echo $choix_prix;?></th>
													<th><a href="panier.php?action=remove&code=<?php echo $_SESSION["panier"]['id'][$i] ; ?>" class="btn btn-danger">Supprimer l'élément</a></th>
												</tr>
												
												
											
												<?php
												
												$total_quantity += $_SESSION["panier"]['quantite'][$i] ;
												$prix_total += $choix_prix;
												
												}
												?>
											
											<tr>
												<td class="text-white" colspan="">Total :</td>
												<td class="text-white" colspan=""><?php echo $total_quantity ; ?></td>
												<td class="text-white" colspan=""><strong><?php echo "$ ".number_format($prix_total, 2); ?></strong></td>
												
											</tr>
											
											
					
											</tbody>
										</table>
<?php
			} 
	else 
	{
	?>
	<div class="no-records text-white">Votre panier est vide</div>
	<?php
	}
	
	?>
										
				<div class="inputbox">
				<a href="payement.php">
					<input type="submit" name="envoyer" value="Terminer">
				</div>					
										
									
											
											
								
									

								</div>
							

							</div>
						</div>
			</center>
		</div>
					
	</div>	

</div>

		

	<?php
	//unset($_SESSION['panier']);
	include('../includes/foot.php');
	
	?>
