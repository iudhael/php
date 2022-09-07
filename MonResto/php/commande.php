<?php


	if(isset($_SESSION['resto_id']) && empty($_SESSION['resto_id']) && isset($_SESSION['nom_resto']) && empty($_SESSION['nom_resto']))
	{
		header('Location:main.php');
		
	}




?>
	<?php
		include('../includes/head.php');
	
			include('../includes/connexion_bd.php');
			include('../includes/fonction.php');
	?>




<link rel="stylesheet" type="text/css" href="../css/commande.css"/>

	<?php
	
	

	$insertion = "SELECT * FROM mes_resto WHERE nom_resto=:nom_resto";
			
			$requete = $bdd->prepare($insertion);
			$nom_resto=securisation($_SESSION['nom_resto']);
			$requete->bindParam(':nom_resto', $nom_resto);
					
			$requete->execute();
			
				
		

	//echo $_SESSION['nom_resto'];
		
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
				
		
				
				
					<div class="form">
						<h2>Commande</h2>
						
							<div class="inputbox">
								<a href="cmd.php?commande=petit-dej">
									<button>Petit-dej</button>
								</a>
							</div>
							
							<div class="inputbox">
								<a  href="cmd.php?commande=dejene">
									<button>Déjené</button>
								</a>
							</div>
							
							<div class="inputbox">
								<a href="cmd.php?commande=dine">
									<button >Diné</button>
								</a>
							</div>
							
							<div class="inputbox">
								<a href="cmd.php?commande=boisson">
									<button >Boisson</button>
								</a>
							</div>
		
						
								
								
					
						

					</div>
				

				</div>
			</div>
		</div>
		</center>
		


<?php
		include('../includes/foot.php');
	
	?>