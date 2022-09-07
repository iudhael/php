<?php



	if(isset($_SESSION['resto_id']) && empty($_SESSION['resto_id']) && isset($_SESSION['nom_resto']) && empty($_SESSION['nom_resto']))
	{
		header('Location:main.php');
		
	}
	
	include('../includes/connexion_bd.php');
		include('../includes/fonction.php');

?>

<?php
	include('../includes/head.php');
	
	?>



<link rel="stylesheet" type="text/css" href="../css/dej.css"/>
	
	<?php
	
		
	
			$insertion = "SELECT *  FROM user WHERE user_id = :user_id ";
			$requete = $bdd->prepare($insertion);
			$requete->bindParam(':user_id',$_SESSION['user_id'] );
			
			$requete->execute();
			$resultat=$requete->fetch();
			
	
	?>
	<?php
		if(isset($_SESSION['liv_cmd']) && !empty($_SESSION['liv_cmd']))
		{

									
			 $cmd_liv="Livraison  ".$_SESSION['nom_resto'];
			$chemin='recu_livraison/';

								
		}
		else
		{
								
			$cmd_liv="Commande   ".$_SESSION['nom_resto'];
		 $chemin='recu_commande/';
		}
	?>
									

	
	<?php
	
	require_once('../includes/gestion_panier.php');
	require("../fpdf/fpdf.php");
	
	
	
	
	
	
	
	// Création de la class PDF
		class PDF extends FPDF 
		{
		  // Header
		  function Header() 
		  {
			// Logo : 8 >position à gauche du document (en mm), 2 >position en haut du document, 80 >largeur de l'image en mm). La hauteur est calculée automatiquement.
			//$this->Image('logo_agence.jpeg',8,2);
			// Saut de ligne 20 mm
			$this->Ln(15);

			// Titre gras (B) police Helbetica de 11
			$this->SetFont('Helvetica','B',11);
			// fond de couleur gris (valeurs en RGB)
			$this->setFillColor(230,230,230);
			 // position du coin supérieur gauche par rapport à la marge gauche (mm)
			$this->SetX(0);
			// Texte : 60 >largeur ligne, 8 >hauteur ligne. Premier 0 >pas de bordure, 1 >retour à la ligneensuite, C >centrer texte, 1> couleur de fond ok  
			$this->Cell(210,12,'Recu Payement',0,1,'C',1);
			// Saut de ligne 10 mm
			$this->Ln(10);    
		  }
		  
		   // Footer
		  function Footer() 
		  {
			// Positionnement à 1,5 cm du bas
			$this->SetY(-15);
			// Police Arial italique 8
			$this->SetFont('Helvetica','I',9);
			// Numéro de page, centré (C)
			$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
		  }
		  
		  
		}
	

		// On active la classe une fois pour toutes les pages suivantes
		// Format portrait (>P) ou paysage (>L), en mm (ou en points > pts), A4 (ou A5, etc.)
		$pdf = new PDF('P','mm','A4');
		
		// Nouvelle page A4 (incluant ici logo, titre et pied de page)
		$pdf->AddPage();
		// Polices par défaut : Helvetica taille 9
		$pdf->SetFont('Helvetica','',9);
		// Couleur par défaut : noir
		$pdf->SetTextColor(0);
		// Compteur de pages {nb}
		$pdf->AliasNbPages();
		
		// Sous-titre calées à gauche, texte gras (Bold), police de caractère 11
		$pdf->SetFont('Helvetica','B',11);
		// couleur de fond de la cellule : gris clair
		$pdf->setFillColor(230,230,230);
		
		$pdf->Cell(190,8,utf8_decode($cmd_liv),0,1,'C',1);  
		
		
		
		$pdf->Ln(10); // saut de ligne 10mm
		$pdf->Cell(190,8,strtoupper(("Prenom : ".$resultat['prenom']."      Nom : ".$resultat['name'])),0,1,'C',1);        
		
		
		
		// Fonction en-tête des tableaux en 3 colonnes de largeurs variables
		function entete_table($position_entete) {
		  global $pdf;
		  $pdf->SetDrawColor(183); // Couleur du fond RVB
		  $pdf->SetFillColor(221); // Couleur des filets RVB
		  $pdf->SetTextColor(0); // Couleur du texte noir
		  $pdf->SetY($position_entete);
		  // position de colonne 1 (10mm à gauche)  
		  $pdf->SetX(10);
		  $pdf->Cell(10,8,'Num',1,0,'C',1);  // 10 >largeur colonne, 8 >hauteur colonne
		 // position de la colonne 3 (20 = 10+10)
		  $pdf->SetX(20); 
		  $pdf->Cell(110,8,'Prouits',1,0,'C',1);
		  // position de la colonne 3 (130 = 110+20)
		  $pdf->SetX(130); 
		  $pdf->Cell(15,8,utf8_decode('Quantité'),1,0,'C',1);
		   // position de la colonne 4 (145 = 130+15)
		  $pdf->SetX(145); 
		  $pdf->Cell(25,8,utf8_decode('Prix unitaire'),1,0,'C',1);
		   // position de la colonne 5 (170 = 145+25)
		  $pdf->SetX(170); 
		  $pdf->Cell(30,8,utf8_decode('Prix'),1,0,'C',1);

		  $pdf->Ln(); // Retour à la ligne
		}
		
		
		
		
		// AFFICHAGE EN-TÊTE DU TABLEAU
		// Position ordonnée de l'entête en valeur absolue par rapport au sommet de la page (70 mm)
		$position_entete = 80;
		// police des caractères
		$pdf->SetFont('Helvetica','',9);
		$pdf->SetTextColor(0);
		// on affiche les en-têtes du tableau
		entete_table($position_entete);		
		
		
		
		
			$position_detail = 88; // Position ordonnée = $position_entete+hauteur de la cellule d'en-tête 
			
			if(isset($_SESSION["panier"]))
	{
				$nbArticles=count($_SESSION['panier']['nom']);
				$total_quantity = 0 ;
				$prix_total = 0 ;
				$j=0;
											
													 
				for ($i=0 ;$i < $nbArticles ; $i++)
				{
						$j++;
						$choix_prix = $_SESSION["panier"]['quantite'][$i]*$_SESSION["panier"]['prix'][$i] ;
															
					  // position abcisse de la colonne 1 (10mm du bord)
					  $pdf->SetY($position_detail);
					  $pdf->SetX(10);
					  $pdf->MultiCell(10,8,$j,1,'C');
						
					  $pdf->SetY($position_detail);
					  $pdf->SetX(20); 
					  $pdf->MultiCell(110,8, $_SESSION["panier"]['nom'][$i],1,'C');
					  
					  $pdf->SetY($position_detail);
					  $pdf->SetX(130); 
					  $pdf->MultiCell(15,8,$_SESSION["panier"]['quantite'][$i],1,'C');
					  
					  $pdf->SetY($position_detail);
					  $pdf->SetX(145); 
					  $pdf->MultiCell(25,8,$_SESSION["panier"]['prix'][$i],1,'C');
					  
					 $pdf->SetY($position_detail);
					 $pdf->SetX(170); 
					 $pdf->MultiCell(30,8,$choix_prix,1,'C');

					  // on incrémente la position ordonnée de la ligne suivante (+8mm = hauteur des cellules)  
					  $position_detail += 8; 
					  
					  $total_quantity += $_SESSION["panier"]['quantite'][$i] ;
					  $prix_total += $choix_prix;
				}
			}
		
		
		
		$pdf->Ln(10); // saut de ligne 10mm
		
		$pdf->Cell(190,8,utf8_decode('Quantité total : ').$total_quantity.utf8_decode('    Prix total : '). $prix_total,0,1,'C',1); 
		
		
		
		
		
		$pdf->Ln(10); // saut de ligne 10mm
		// Cellule avec les données du sous-titre sur 2 lignes, pas de bordure mais couleur de fond grise
		$pdf->Cell(190,8,'DATE : '.date("d-m-Y").'  Heure : '.date("H").' : '.date("i").' : '.date("m"),0,1,'C',1);  
		$pdf->Cell(190,8,'A bientot !!!',0,1,'C',1);  


		$dossier='../'.$chemin.date("d-m-Y").'/';
		while(!file_exists($dossier))
		{
					
					
			mkdir($dossier,0777,true);
					
		}
		$pdf_name = $resultat['user_id']."_".$resultat['prenom']."_".$resultat['name'].'_'.date("H").'h';
		$pdf->Output($dossier.$pdf_name.'.pdf','F');
		
	?>

	
	
	

