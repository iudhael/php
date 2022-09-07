<?php

	
	
	include('connexion_bd.php');
	require_once('fonction_panier.php');
	if(!empty($_GET['action']))
		{
			$_GET['action']=securisation($_GET['action']);
			if(isset($_GET['code']))
			{
					$action_id=securisation($_GET['code']);
				
			}
		
			
			switch($_GET['action'])
			{
				case "add":
					if(!empty($_POST['nbre_dej']))
					{
						$insertion1 = "SELECT * FROM cmd WHERE resto_id = :resto_id AND id = :dej_id ORDER BY id ASC ";
			
						$requete1 = $bdd->prepare($insertion1);
						
						//$nom_resto=securisation($_SESSION['nom_resto']);
						$resto_id=1;//$_SESSION['resto_id'];
						
						$requete1->bindParam(':resto_id', $resto_id);
						//$requete1->bindParam(':nom_resto', $nom_resto);
						$requete1->bindParam(':dej_id', $action_id);
						
						$requete1->execute();
						
						$r=$requete1->fetch();
						
						ajouter_cmd($r['id'],$r['nom'],$_POST['nbre_dej'],$r['prix']);
						
						if(!empty($_SESSION['panier']))
						{
							
							modifierQTe_cmd($r['nom'],$_POST['nbre_dej']);
							
						}
						
						
					}
					
					break;
				
				case "remove":
					if(!empty($_SESSION['panier']))
					{
						supprimer_cmd($action_id);
						header('Location:panier.php');
						
						
						
					}
					break;
				case "empty":
					supprimePanier();
					header('Location:panier.php');
					break;
				
				
				
				
				
				
				
				
				
				
				
				
			}
			
			
		}
	
	
	
	




?>



























