
	<?php 
			
			
			require("../fpdf/fpdf.php");
			// Création de la class PDF
		class PDF extends FPDF {
		  // Header
		  function Header() {
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
		  function Footer() {
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
		// Cellule avec les données du sous-titre sur 2 lignes, pas de bordure mais couleur de fond grise
		$pdf->Cell(190,6,'DATE : '.date("d-m-Y").'  Heure : '.date("H").' : '.date("i").' : '.date("m"),0,1,'C',1);  

		$pdf->Ln(10); // saut de ligne 10mm
		$pdf->Cell(190,6,strtoupper(("data_voyageur['prenom'] data_voyageur['nom']")),0,1,'C',1);        
		
		$pdf->Ln(20); // saut de ligne 10mm
		
		// Fonction en-tête des tableaux en 3 colonnes de largeurs variables
		function entete_table($position_entete) {
		  global $pdf;
		  $pdf->SetDrawColor(183); // Couleur du fond RVB
		  $pdf->SetFillColor(221); // Couleur des filets RVB
		  $pdf->SetTextColor(0); // Couleur du texte noir
		  $pdf->SetY($position_entete);
		  // position de colonne 1 (10mm à gauche)  
		  $pdf->SetX(10);
		  $pdf->Cell(60,8,'Ville',1,0,'C',1);  // 60 >largeur colonne, 8 >hauteur colonne
		  // position de la colonne 2 (70 = 10+60)
		  $pdf->SetX(70); 
		  $pdf->Cell(60,8,'Pays',1,0,'C',1);
		  // position de la colonne 3 (130 = 70+60)
		  $pdf->SetX(130); 
		  $pdf->Cell(30,8,'Repas',1,0,'C',1);

		  $pdf->Ln(); // Retour à la ligne
		}
		// AFFICHAGE EN-TÊTE DU TABLEAU
		// Position ordonnée de l'entête en valeur absolue par rapport au sommet de la page (70 mm)
		$position_entete = 70;
		// police des caractères
		$pdf->SetFont('Helvetica','',9);
		$pdf->SetTextColor(0);
		// on affiche les en-têtes du tableau
		entete_table($position_entete);		


			$position_detail = 78; // Position ordonnée = $position_entete+hauteur de la cellule d'en-tête (60+8)
		//$requete2 = "SELECT * FROM gastro WHERE id_voyageur='1'";
		//$result2 = mysqli_query($link, $requete2);
		//while ($data_visit = mysqli_fetch_array($result2)) {
		  // position abcisse de la colonne 1 (10mm du bord)
		  $pdf->SetY($position_detail);
		  $pdf->SetX(10);
		  $pdf->MultiCell(60,8,("data_visit['ville']"),1,'C');
			// position abcisse de la colonne 2 (70 = 10 + 60)  
		  $pdf->SetY($position_detail);
		  $pdf->SetX(70); 
		  $pdf->MultiCell(60,8,("data_visit['pays']"),1,'C');
		  // position abcisse de la colonne 3 (130 = 70+ 60)
		  $pdf->SetY($position_detail);
		  $pdf->SetX(130); 
		  $pdf->MultiCell(30,8,"data_visit['nb_repas']",1,'C');

		  // on incrémente la position ordonnée de la ligne suivante (+8mm = hauteur des cellules)  
		  $position_detail += 8; 
		//}
		//mysqli_free_result($result2);
		
		
		
		//$pdf->Cell(500,20,utf8_decode('Plus rien à vous dire ;-)'));
				
		$pdf->Output('../FIC/test.pdf','F');
	//$pdf->Output('test.pdf','D');
					
		?>

