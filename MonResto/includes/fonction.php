
		<?php
	
		include('connexion_bd.php');
	
	?>
		
		
		<?php
			/* 
				losque la methode post est utilisée une variable tableau $_POST
				se crée pour stocker les informations envoyée par l'utilisateur
			*/
			
			/* htmlspecialchars pour empecher 
			que du code html, java script taper par un individu dans le formulaire  soit interpreter */
			
			/*strip_tags permet non seulement de ne pas prendre en compte les code html, java script
			mais aussi de ne pas les affichés */
			
			/* trim permet de ne pas prendre encompte le trop d'espace */
			
			/*stripslashes permet de retirer les anti-slashes pour eviter les erreurs */
			
			
			
			
			
			$prenom = $nom = $pseudo = $password = $email = "";
			
			
			/* cette fonction se chargera des operation de verivication sur chacune des valeurs que va prendre $_POST */
			
			function securisation($donnees)
			{
				$donnees = trim($donnees);
				$donnees = stripslashes($donnees);
				$donnees = strip_tags($donnees);
				
				return $donnees;
			
			}
			
			
			
					 //$rech ="g5";
			function verification_name($donnees)
			{	
				$msg_name = "";
				$regex0 = "[a-zA-Z'-]";
				if(!preg_match("/$regex0/",$donnees) || preg_match("/[0-9]/",$donnees) || strlen($donnees)<2)
				{
						
					$msg_name="<p>Le nom est incorecte </p>";
					return $msg_name;
				}
					
					
				
			}
				 
			function verification_prenom($donnees)
			{	
				
				$msg_prenom = "";
				$regex0 = "[a-zA-Z'-]";
				if(!preg_match("/$regex0/",$donnees) || preg_match("/[0-9]/",$donnees))
				{
						
					$msg_prenom="<p>Le prenom est incorecte </p>";
					return $msg_prenom;
				}
					
					
					
				
			}
				
				
				
			function securisation_mail($donnees)
			{
				$donnees = filter_var($donnees, FILTER_SANITIZE_EMAIL);
				$msg_email = "";
					
				if(!filter_var($donnees, FILTER_VALIDATE_EMAIL) === true)
				{
					$msg_email = "
							<p>le mail  n'est pas valide !</p>
						";
					return $msg_email;
				}

				
			}
				

				$recherche ="BONJuU\"2.4UR";
			function securisation_password($pass1)
			{
				$regex = "^(?=(.*\d){2,})(?=.*[$-\/:-?{ -~!\"^_'\[\]]{1,})(?=.*\w).{8,}$";
				$msg_password = "";
					
							// 
				if(!preg_match("/$regex/",$pass1)  || !preg_match("/\s/",$pass1)  === false || !preg_match("/[A-Z]/",$pass1) || !preg_match("/[a-z]/",$pass1))
						{
							$msg_password = "
							<p>
								le mot de passe doit comporter au moins :
									<ul style='text-align:left; margin-left:50px;'>
										<li>08 caractere</li>
										<li>Une majuscule</li>
										<li>Une minuscule</li>
										<li>Des chiffres </li>
										<li>Un caractere particulier </li>				
										<li>Et doit etre sans espace </li>
										
									</ul>
										</p>";
								
							return $msg_password;
						}
					
					
			}
					
		function verification_password($pass1, $pass2)
		{
					
					
			$msg_pass_incorrecte = "";
							// 
					
			if ($pass1 != $pass2)
			{
							
				$msg_pass_incorrecte = "<p>Le mot de passe n'est pas identique !</p>";
								
				return $msg_pass_incorrecte;
					
					
							
			}	
						
		}
		
		function verification_tel($donnees)
		{
					
			$reg="['(),_&\/?~#;.{}!éçèà]";
					
			$msg_tel_incorrecte = "";
			 
			$regex0 = "[0-9-+]";
			if(!preg_match("/$regex0/",$donnees) || preg_match("/$reg/",$donnees) || strlen($donnees) <6)
				{
						
								
				$msg_tel_incorrecte = "<p>Le champ téléphone est incorrecte !</p>";
								
				return $msg_tel_incorrecte;
				}	
			
						
		}
		
		function num_tab($num, $id_resto)
		{	
		
			include('connexion_bd.php');
			
			$num_tab_error="";
			
			$insertion="SELECT * FROM table_resto WHERE num_table= :num AND resto_id= :id_resto";
			$requete=$bdd->prepare($insertion);
			$requete->bindParam(':num',$num);
			$requete->bindParam(':id_resto',$id_resto);
			$requete->execute();
			
			$resultat = $requete->fetch();
			if($resultat['etat_table'] == 1)
			{
				$num_tab_error="<p>Tapez une valeur correcte</p>";
				return $num_tab_error;
				
			}
			
			
			
			/*
			if(!preg_match("/[0-9]/",$num) )
			{
				$num_tab_error="<p>Tapez un entier valide</p>";
				return $num_tab_error;
			}
			*/
			
		}
		
		function update_num_tab_occupe($num)
		{	
		
			include('connexion_bd.php');
			
			$insertion = "UPDATE table_resto  SET etat_table = 1, user_id = :id WHERE  num_table = :num AND resto_id = :resto_id";
	
			$requete=$bdd->prepare($insertion);
			$requete->bindParam(':num',$num);
			$requete->bindParam(':resto_id',$_SESSION['resto_id']);
			$requete->bindParam(':id',$_SESSION['user_id']);
			$requete->execute();
			
			
		}	
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		function searche_vil_nom_resto($requete){
			
		}
				
		function register_user_error($username,$pass,$email,$tel)
		{
			include('connexion_bd.php');
			$msg_user_name = $msg_user_prenom = $msg_user_email = $msg_user_tel = $msg_user_username = "";
			
			//$insertion1 = "SELECT * FROM user WHERE  name = :nom";
			
			//$insertion2 = "SELECT * FROM user WHERE prenom=:prenom ";
			
			$insertion3 = "SELECT * FROM user WHERE username=:username ";
			
			$insertion4 = "SELECT * FROM user WHERE email = :email ";
			
			$insertion5 = "SELECT * FROM user WHERE telephone=:tel";
			
			
			//$requete1 = $bdd->prepare($insertion1);
			//$requete2 = $bdd->prepare($insertion2);
			$requete3 = $bdd->prepare($insertion3);
			$requete4 = $bdd->prepare($insertion4);
			$requete5 = $bdd->prepare($insertion5);
			
			//$requete1->bindParam(':nom', $nom);
			//$requete1->bindParam(':prenom', $prenom);
			$requete3->bindParam(':username', $username);
			$requete4->bindParam(':email', $email);
			$requete5->bindParam(':tel', $tel);
			
			//$requete1->execute();
			//$data = $requete1->fetch();	
			//$requete2->execute();
			$requete3->execute();
			$requete4->execute();
			$requete5->execute();
			
							
			
			
			//$row1 = $requete1->rowCount();
			//$row2 = $requete2->rowCount();
			$row3 = $requete3->rowCount();
			$row4 = $requete4->rowCount();
			$row5 = $requete5->rowCount();
			
							
					
					
			
			if ($row3 == 1 || $row4 == 1 || $row5 == 1)

			{	
				//indiquer a celui qui s'inscrit que l'un de ces parametre existe deja
				/*if($row1 == 1)
				{
					$msg_user_name="Un utilisateur porte déja ce nom";
					return $msg_user_name;
				}*/
				
				/*if($row2 == 1)
				{
					$msg_user_prenom="Un utilisateur porte déja ce prenom";
					return msg_user_prenom;
				}*/
				
				if($row3 == 1)
				{
					 
					$msg_user_username="Un utilisateur porte déja ce pseudo";
					return $msg_user_username;
				}
				
				if($row4 == 1)
				{
					$msg_user_email="Un utilisateur porte déja cet email";
					return $msg_user_email;
				}
				
				if($row5 == 1)
				{
					$msg_user_tel="Un utilisateur porte déja ce numéro";
					return $msg_user_tel;
				}
				
				
				//pensez a un else si on retrouve deux parametres existant
				
				
			}
			else
			{
				$msg_exist="";
				$msg_exit="L'utilisateur existe deja";
			}
			
		}
		
		
		function register_user($nom,$prenom,$username,$pass,$email,$tel)
		{
			include('connexion_bd.php');
			$nom=strtolower($nom);
			$prenom=strtolower($prenom);
			$msg_user_name = $msg_user_prenom = $msg_user_username = $msg_user_email = $msg_user_tel ="";
			
			//$insertion1 = "SELECT name FROM user WHERE  name = :nom";
			
			//$insertion2 = "SELECT prenom FROM user WHERE prenom=:prenom ";
			
			$insertion3 = "SELECT username FROM user WHERE username=:username ";
			
			$insertion4 = "SELECT email FROM user WHERE email = :email ";
			
			$insertion5 = "SELECT telephone FROM user WHERE telephone=:tel";
			
			
			//$requete1 = $bdd->prepare($insertion1);
			//$requete2 = $bdd->prepare($insertion2);
			$requete3 = $bdd->prepare($insertion3);
			$requete4 = $bdd->prepare($insertion4);
			$requete5 = $bdd->prepare($insertion5);
			
			//$requete1->bindParam(':nom', $nom);
			//$requete1->bindParam(':prenom', $prenom);
			$requete3->bindParam(':username', $username);
			$requete4->bindParam(':email', $email);
			$requete5->bindParam(':tel', $tel);
			
			//$requete1->execute();
			//$data = $requete1->fetch();	
			//$requete2->execute();
			$requete3->execute();
			$requete4->execute();
			
							
			
			
			//$row1 = $requete1->rowCount();
			//$row2 = $requete2->rowCount();
			$row3 = $requete3->rowCount();
			$row5 = $requete5->rowCount();
			$row4 = $requete4->rowCount();
			$requete5->execute();
							
							
			if ($row3 == 0 && $row4 == 0 && $row5 == 0)
			{
			
				$insertion6 = "	INSERT INTO user(name,prenom,username,email,password,telephone)
					VALUES (:nom,:prenom,:username,:email,:pass,:tel)";
					
					$requete6 = $bdd->prepare($insertion6);
					
					$password_hasher = md5($pass);
					
					$requete6->bindParam(':nom', $nom);
					$requete6->bindParam(':prenom', $prenom);
					$requete6->bindParam(':username', $username);
					$requete6->bindParam(':email', $email);
					$requete6->bindParam(':pass', $password_hasher);
					$requete6->bindParam(':tel', $tel);
				
				
				
				
				
				$requete6->execute();
				
			}
		}

		function login($username,$pass)
		{
			include('connexion_bd.php');
			$msg_user_nexiste_pas ="";
			
			$insertion = "SELECT username,password,user_id FROM user WHERE username=:username";
			
			$requete = $bdd->prepare($insertion);
			
			$requete->bindParam(':username', $username);
					
			$requete->execute();
			
			
			$row = $requete->rowCount();
			if($row == 1) //si on retrouve l'user
			{
				$password_hasher = md5($pass);
				
				while($query = $requete->fetch())
				{
					if($query['password'] != $password_hasher )
					{
						$msg_user_nexiste_pas ="Le pseudo ou le mot de passe est incorrecte";
						
						return $msg_user_nexiste_pas;
					}
					
				}
				
			}
			else
			{
				$msg_user_nexiste_pas ="Le pseudo ou le mot de passe est incorrecte";
						
						return $msg_user_nexiste_pas;
			}
			
			
		}
		
		function create_session_login($username,$pass)
		{
			include('connexion_bd.php');
			
			$password_hasher = md5($pass);
			$msg_user_nexiste_pas ="";
			
			$insertion = "SELECT username,password,user_id FROM user WHERE username=:username";
			
			$requete = $bdd->prepare($insertion);
			
			$requete->bindParam(':username', $username);
					
			$requete->execute();
			
			
			$row = $requete->rowCount();
			if($row == 1) //si on retrouve l'user
			{
				while($query = $requete->fetch())
				{
					if($query['password'] == $password_hasher)
					{
						
						$id=$query['user_id'];
						return $id;
					}
				}
				
			}
			
			
		}
		
		
		function update_nom($nom)
		{
			
			include('connexion_bd.php');
			$msg_user_name = "";
		
					$insertion = "UPDATE user  SET name = :nom WHERE  user_id = :id";
					$requete = $bdd->prepare($insertion);
					
					$requete->bindParam(':nom', $nom);
					$requete->bindParam(':id', $_SESSION['user_id']);
					$requete->execute();
							
				
			
			
			
			
			
			
		}
		
		function update_prenom($prenom)
		{
			
			include('connexion_bd.php');
			$insertion = "UPDATE user  SET prenom = :prenom WHERE  user_id = :id";
					$requete = $bdd->prepare($insertion);
					
					$requete->bindParam(':prenom', $prenom);
					$requete->bindParam(':id', $_SESSION['user_id']);
					$requete->execute();
			
			

		}
		
		function update_username($username)
		{
			$msg_user_username = "";
			include('connexion_bd.php');
			$insertion3 = "SELECT username FROM user WHERE username=:username ";
			$requete3 = $bdd->prepare($insertion3);
			$requete3->bindParam(':username', $username);
			
			$requete3->execute();
			
			
			$row3 = $requete3->rowCount();
			
			if($row3 == 1)
				{
					 
					$msg_user_username="Un utilisateur porte déja ce pseudo";
					return $msg_user_username;
				}
			else
				{
					$insertion = "UPDATE user  SET username = :username WHERE  user_id = :id";
					$requete = $bdd->prepare($insertion);
					
					$requete->bindParam(':username', $username);
					$requete->bindParam(':id', $_SESSION['user_id']);
					$requete->execute();
							
				}
			
				
				
			
			
			
			
			
		}
		
		
		function update_email($email)
		{
			$msg_user_email =  "";
			include('connexion_bd.php');
			$insertion4 = "SELECT email FROM user WHERE email = :email ";
			$requete4 = $bdd->prepare($insertion4);
			$requete4->bindParam(':email', $email);
			
			$requete4->execute();
			
			$row4 = $requete4->rowCount();
			
			
				if($row4 == 1)
				{
					$msg_user_email="Un utilisateur porte déja cet email";
					return $msg_user_email;
				}
				else
				{
					$insertion = "UPDATE user  SET email = :email WHERE  user_id = :id";
					$requete = $bdd->prepare($insertion);
					
					$requete->bindParam(':email', $email);
					$requete->bindParam(':id', $_SESSION['user_id']);
					$requete->execute();
							
				}
				
				
			
			
			
			
		}
		
		
		
		
		function update_telephone($tel)
		{
			$msg_user_tel ="";
			include('connexion_bd.php');
			$insertion5 = "SELECT telephone FROM user WHERE telephone=:tel";
			$requete5 = $bdd->prepare($insertion5);
			$requete5->bindParam(':tel', $tel);
			$requete5->execute();
			$row5 = $requete5->rowCount();
			if($row5 == 1)
				{
					$msg_user_tel="Un utilisateur porte déja ce numéro";
					return $msg_user_tel;
				}
			else
				{
					$insertion = "UPDATE user  SET telephone = :tel WHERE  user_id = :id";
					$requete = $bdd->prepare($insertion);
					
					$requete->bindParam(':tel', $tel);
					$requete->bindParam(':id', $_SESSION['user_id']);
					$requete->execute();
							
				}
			
			
		}
		

		function update_pass($pass)
		{
			
			include('connexion_bd.php');
			
			$pass = md5($pass);
			
			$insertion = "UPDATE user  SET password = :pass WHERE  user_id = :id";
					$requete = $bdd->prepare($insertion);
					
					$requete->bindParam(':pass', $pass);
					$requete->bindParam(':id', $_SESSION['user_id']);
					$requete->execute();
			
			
			
			
		}
		
		
		function update_photo_profile($file,$file_name,$taille)
		{
			include('connexion_bd.php');
			$insertion="SELECT * FROM user WHERE user_id=:id";
			
			$requete = $bdd->prepare($insertion);
					
		
			$requete->bindParam(':id', $_SESSION['user_id']);
			$requete->execute();
			$resultat=$requete->fetch();
				
				$dossier = "../images/profile/".$resultat['user_id']."/".$resultat['name']."_".$resultat['prenom']."_".$resultat['username']."/"; 
				while(!file_exists($dossier))
				{
					
					
					mkdir($dossier,0777,true);
					
				}

				
				$taille_maxi = 100000; 
				$extensions = array('.png', '.gif', '.jpg', '.jpeg'); 
				$extension = strrchr($file, '.'); 
				 $i=0;
				 
				if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau 
					{ 
						 $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou 
					doc...'; 
					return $erreur;
					
					} 
					if($taille>$taille_maxi) 
					{ 
						 $erreur = 'Le fichier est trop gros...'; 
						 return $erreur;
					} 
					
					if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload 
					{ 

						 do
						{
							/*on augmente i puis on a nom_ficher_1.extension 
								apres on verifie si se fichier est dans le dossier si oui on reprend la boucle 
								si non un false est retourner et on sort de la boucle*/
												 
							  $i++;
							  $new_file_name = $resultat['name']."_".$resultat['prenom']."_".$i.$extension;
							  // echo "<br/>";
							  //echo $new_file_name;
							  //echo "<br/>";
								
						}while(file_exists($dossier . $new_file_name));		
								
								
						if(move_uploaded_file($_FILES['avatar']['tmp_name'], $dossier . $new_file_name)) 
								//Si la fonction renvoie TRUE, c'est que ça a fonctionné... 
								 { 
									 //echo "<br/>";
										// echo 'Upload effectué avec succès !'; 
									  
									$insertion = "UPDATE user  SET photo_profile = :dossier WHERE  user_id = :id";
									$requete = $bdd->prepare($insertion);
									
									$chemin=$dossier. $new_file_name;
									$requete->bindParam(':dossier',$chemin );
									$requete->bindParam(':id', $_SESSION['user_id']);
									$requete->execute();
													  
									  
									  
									  
									  
									  
									 
								 } 
								 else //Sinon (la fonction renvoie FALSE). 
								 { 
									  $erreur= 'Echec de l\'upload !';

										return $erreur;

									  
								 }
						
					} 
					else 
					{ 
						 echo $erreur; 
						 return $erreur;
					} 
			
			
		}
		
		
		function verification_date($j,$m,$a)
		{
			$date_today = date("Y-m-d");
			$msg_date_error="";
			$date_debut = checkdate($j,$m,$a);
			$date =  $a."-".$m."-".$j;
			if(!$date_debut || ($date < $date_today))
				{
					  
					$msg_date_error="Date incorrecte";
					return $msg_date_error;
					
					
				}
			
				
			
		}
		
		
		
		
		
	
		
		function reservation_exite($date_debut,$table_id)
		{
			include('connexion_bd.php');
			
			$msg_reser_exist ="";
			$insertion1 = "SELECT *  FROM reservation WHERE date_debut_reservation = :date_debut AND  table_id = :table_id
				AND  resto_id = :resto_id 
				
				
				
				";
				
			$requet = $bdd->prepare($insertion1);
			$requet->bindParam(':date_debut', $date_debut);
			$requet->bindParam(':table_id', $table_id);
			$requet->bindParam(':resto_id', $_SESSION['resto_id']);
			$requet->execute();
			$row1 = $requet->rowCount();
			
			if($row1==1)
			{
				
				$msg_reser_exist ="Une reservation existe deja pour ces parametres";
				
			}
			
			
			
			
		}
		
			function recup_table_id($type)
		{
			include('connexion_bd.php');
			$insertion = "SELECT *  FROM table_resto WHERE  type = :type";
			$requete = $bdd->prepare($insertion);
			$requete->bindParam(':type', $type);
			
			$requete->execute();
			$resultat = $requete->fetch();
			return $resultat['table_id'];
			
			
			
		}

		
	
		
		function reservation($date_debut,$heure_debut,$table)
		{
			include('connexion_bd.php');
			$insertion = "INSERT INTO reservation (date_debut_reservation, heure_debut , user_id ,table_id,
				resto_id) VALUES (:date_debut,:heure_debut,:id,:table_id,:resto_id)
				";
			$requete = $bdd->prepare($insertion);
				
			$requete->bindParam(':date_debut', $date_debut);
			
			$requete->bindParam(':heure_debut', $heure_debut);
		
			$requete->bindParam(':id', $_SESSION['user_id']);
			
			$requete->bindParam(':table_id', $table); 
			
			$requete->bindParam(':resto_id', $_SESSION['resto_id']);
			
			
			$requete->execute();
			
			
			
			$date_today = date("Y-m-d");
			$heure_actuel = date('H');
			
			$insertion1 = "SELECT *  FROM reservation WHERE date_debut_reservation = ?";
				
			$requet = $bdd->prepare($insertion1);
			//$requet->bindParam(':date_debut', $date_debut);
			//$requet->bindParam(':heure', $heure_debut);
			$requet->execute(array($date_debut));
			
			
			
			
			while($resultat = $requet->fetch())
			{
				
					$insertion3 = "UPDATE table_resto  SET etat_table = 1,user_id= :user_id WHERE table_id = :table_id";
				
					$query = $bdd->prepare($insertion3);
					$query->bindParam(':table_id', $resultat['table_id']);
					$query->bindParam(':user_id', $resultat['user_id']);

					$query->execute();
							
					
					
				
				if(($resultat['date_debut_reservation'] < $date_today))
				{
					
					$insertion4 = "UPDATE table_resto  SET etat_table = 0,user_id= 0 WHERE table_id = :table_id";
				
					$query = $bdd->prepare($insertion4);
					$query->bindParam(':table_id', $resultat['table_id']);
					$query->execute();
					
					
					
				}
				
				
			}
			
	
			
		}
		
		
		function commande($type_cmd)
		{
			include('connexion_bd.php');
			$insertion = "SELECT * FROM cmd WHERE resto_id = :resto_id AND type_cmd = :type_cmd  ";
			
			$requete = $bdd->prepare($insertion);
			
			
			$resto_id=$_SESSION['resto_id'];
			
			$requete->bindParam(':resto_id', $resto_id);

			$requete->bindParam(':type_cmd', $type_cmd);
			
			$requete->execute();
			
			
			return $requete;
			
		}
		
		
		function livraison_update_position($position)
		{
			
			include('connexion_bd.php');
			
			
			
			$insertion = "UPDATE user  SET localisation_user = :position WHERE  user_id = :id";
					$requete = $bdd->prepare($insertion);
					
					$requete->bindParam(':position', $position);
					$requete->bindParam(':id', $_SESSION['user_id']);
					$requete->execute();
			
			
			
			
		}
		
		
		
		function register_admin_error($username,$nom_resto,$email)
		{
			
			include('connexion_bd.php');
			$msg_user_email =  $msg_user_username = $msg_nom_resto="";
			
			
			$insertion3 = "SELECT * FROM admins WHERE username=:username ";
			$insertion4 = "SELECT * FROM mes_resto WHERE nom_resto=:nom_resto ";
			$insertion5 = "SELECT * FROM user WHERE email=:email ";
			
			
			
			
			
			
			
			$requete3 = $bdd->prepare($insertion3);
			$requete4 = $bdd->prepare($insertion4);
			$requete5 = $bdd->prepare($insertion5);
			
		
			$requete3->bindParam(':username', $username);
			$requete4->bindParam(':nom_resto', $nom_resto);
			$requete5->bindParam(':email', $email);
			
			
			
			$requete3->execute();
			$requete4->execute();
			$requete5->execute();
			
			
			
							
			
			
			$row3 = $requete3->rowCount();
			$row4 = $requete4->rowCount();
			$row5 = $requete5->rowCount();
			
			
							
					
					
			
			if ($row3 == 1 || $row4 == 0 || $row5 == 0)

			{	
				
				if($row3 == 1)
				{
					 
					$msg_user_username="Un utilisateur porte déja ce pseudo";
					return $msg_user_username;
				}
				if($row4 == 0)
				{
					 
					$msg_user_email="Email incorecte";
					return $msg_user_email;
				}
				if($row5 == 0)
				{
					 
					$msg_nom_resto="Nom de resto incorecte";
					return $msg_nom_resto;
				}
				
				
				
				
				//pensez a un else si on retrouve deux parametres existant
				
				
			}
			else
			{
				$msg_exist="";
				$msg_exit="L'utilisateur existe deja";
			}
			
		}
		
		function register_admin($username,$pass,$email,$nom_resto)
		{
			include('connexion_bd.php');
			
			$username=strtolower($username);
			$msg_user_username = $msg_user_email = "";
			
			
			
			$insertion3 = "SELECT * FROM mes_resto WHERE nom_resto=:nom_resto ";
			
			$insertion4 = "SELECT * FROM user WHERE email = :email ";
			
			
			
			
			$requete3 = $bdd->prepare($insertion3);
			$requete4 = $bdd->prepare($insertion4);
			
			
			$requete3->bindParam(':nom_resto', $nom_resto);
			$requete4->bindParam(':email', $email);
			
			
		
			$requete3->execute();
			$resultat3=$requete3->fetch();
			$requete4->execute();
			$resultat4=$requete4->fetch();
			
							
			
			
			
			$row3 = $requete3->rowCount();
			
			$row4 = $requete4->rowCount();
		
							
							
			if ($row3 == 1 && $row4 == 1)
			{
			
				$insertion6 = "	INSERT INTO admins(username,resto_id,user_id,email,password)
					VALUES (:username,:resto_id,:user_id,:email,:pass)";
					
					$requete6 = $bdd->prepare($insertion6);
					
					$password_hasher = md5($pass);
					
					$requete6->bindParam(':resto_id', $resultat3['resto_id']);
					$requete6->bindParam(':user_id', $resultat4['user_id']);
					$requete6->bindParam(':username', $username);
					$requete6->bindParam(':email', $email);
					$requete6->bindParam(':pass', $password_hasher);
					
				
				
				
				
				$requete6->execute();
				
			}
		}
		
		function login_admin($username,$pass)
		{
			include('connexion_bd.php');
			$msg_user_nexiste_pas ="";
			
			$insertion = "SELECT username,password,user_id FROM user WHERE username=:username";
			
			$requete = $bdd->prepare($insertion);
			
			$requete->bindParam(':username', $username);
					
			$requete->execute();
			
			
			$row = $requete->rowCount();
			if($row == 1) //si on retrouve l'user
			{
				$password_hasher = md5($pass);
				
				while($query = $requete->fetch())
				{
					if($query['password'] != $password_hasher )
					{
						$msg_user_nexiste_pas ="Le pseudo ou le mot de passe est incorrecte";
						
						return $msg_user_nexiste_pas;
					}
					
				}
				
			}
			else
			{
				$msg_user_nexiste_pas ="Le pseudo ou le mot de passe est incorrecte";
						
						return $msg_user_nexiste_pas;
			}
			
			
		}
		
		
	
			
			
			
	
			
			?>