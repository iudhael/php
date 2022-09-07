
<?php
	include('../includes/head.php');
	
?>

<?php
	include('../includes/fonction.php');
	//include('fonction_update.php');
$prenom = $nom = $pseudo = $password = $email = $tel = "";
		$msg_creation_user ="";$msg_creation_user_erreur ="";
		if (isset($_POST['nom']) ) //|| isset($_POST['prenom']) || isset($_POST['email']) || isset($_POST['username']) || isset($_POST['password']) || isset($_POST['telephone'])
		{
			
			$new_name = securisation($_POST['nom']);
			$msg_name_error = verification_name($new_name);
	
			if(empty($msg_name_error) )//empty($msg_email_error)  empty($msg_password_error) && empty($msg_pass_incorrecte_error) && && empty($msg_prenom_error) && empty($msg_tel__error)
			{
				
				$nom = $new_name ;
				
				if(!empty($nom) )
				{
					
					update_nom($nom);
					header('Location: profile_page.php'); die();
				}
			}
		}
		
		if (isset($_POST['prenom']) ) //|| isset($_POST['prenom']) || isset($_POST['email']) || isset($_POST['username']) || isset($_POST['password']) || isset($_POST['telephone'])
		{
			
			$new_prenom = securisation($_POST['prenom']);
			$msg_prenom_error = verification_prenom($new_prenom);
	
			if(empty($msg_prenom_error) )//empty($msg_email_error)  empty($msg_password_error) && empty($msg_pass_incorrecte_error) && &&  && empty($msg_tel__error)
			{
				
				$prenom = $new_prenom ;
				
				if(!empty($prenom) )
				{
					update_prenom($prenom);
					
					
				}
			}
		}
		
		
		if (isset($_POST['email']) ) //|| isset($_POST['email']) || isset($_POST['username']) || isset($_POST['password']) || isset($_POST['telephone'])
		{
			
			$new_email = strtolower(securisation($_POST['email']));
			$msg_email_error = securisation_mail($_POST['email']);
	
			if(empty($msg_email_error) )//  empty($msg_password_error) && empty($msg_pass_incorrecte_error) && &&  && empty($msg_tel__error)
			{
				
				$email = $new_email ;
				
				if(!empty($email) )
				{
					$msg_email_existe="";
					$msg_email_existe=update_email($email);
					if(empty($msg_email_existe))
					{
					header('Location: profile_page.php'); die();
					}
				}
			}
		}
		
		
		
		
		if (isset($_POST['username']) ) // ||  || isset($_POST['password']) || isset($_POST['telephone'])
		{
			
			$new_pseudo = securisation($_POST['username']);
		
				$pseudo = $new_pseudo;
				
				if(!empty($pseudo) )
				{
					$msg_username_existe="";
					$msg_username_existe= update_username($pseudo);
					if(empty($msg_username_existe))
					{
					header('Location: profile_page.php'); die();
					}
				}
			
		}
		
		
		
		
		
		if (isset($_POST['telephone']) ) // isset($_POST['password']) || 
		{
			
			$new_tel = securisation($_POST['telephone']);
			$msg_tel__error = verification_tel($new_tel);
	
			if(empty($msg_tel__error) )//  empty($msg_password_error) && empty($msg_pass_incorrecte_error) && &&  && 
			{
				
				$tel = $new_tel;
				
				if(!empty($tel) )
				{
					$msg_tel_existe="";
					$msg_tel_existe=update_telephone($tel);
					if(empty($msg_tel_existe))
					{
					header('Location: profile_page.php'); die();
					}
				}
			}
		}
		
		
		
		if ( isset($_POST['password']) ) 
		{
			
			$new_password = securisation($_POST['password']);
			$msg_password_error = securisation_password($new_password);
	
			if(empty($msg_password_error) )
			{
				
				$password= $new_password;
				
				if(!empty($password) )
				{
					
					update_pass($password);
					header('Location: profile_page.php'); die();
				}
			}
		}
		
		
		
		
		
		if ( isset($_FILES['avatar']['name']) ) 
		{
			$file=$_FILES['avatar']['name']; 
			$fichier = basename($_FILES['avatar']['name']); 
			 
			$taille = filesize($_FILES['avatar']['tmp_name']);
			$msg_photo_error=update_photo_profile($file,$fichier,$taille);
			if(empty($msg_photo_error))
			{
				
				header('Location: profile_page.php'); die();
				
			}
					
					
					
				
			
		}
		
		
		
		
		
				
		
		

		
		if (!empty($msg_email_existe) )
									{
										
										echo "<div class=' alert alert-danger'>
										<h2>Error<h2>
											<div class=''>
												$msg_email_existe
																	
												
											</div>
											</div>
										";
									}

			
		if (!empty($msg_username_existe) )
									{
										
										echo "<div class=' alert alert-danger'>
										<h2>Error<h2>
											<div class=''>
												
												$msg_username_existe						
												
											</div>
											</div>
										";
									}
		if (!empty($msg_tel_existe) )
									{
										
										echo "<div class=' alert alert-danger'>
										<h2>Error<h2>
											<div class=''>
																		
												$msg_tel_existe
											</div>
											</div>
										";
									}
			
									
		if ( !empty($msg_name_error))
			{
										
										echo "<div class=' alert alert-danger'>
										<h2>Error<h2>
											<div class=''>
												
												$msg_name_error
																													
											</div>
											</div>
										";
									}
		if (!empty($msg_prenom_error))
			{
										
										echo "<div class=' alert alert-danger'>
										<h2>Error<h2>
											<div class=''>
												
												
												$msg_prenom_error
															
											</div>
											</div>
										";
									}
									
		if (!empty($msg_email_error) )
			{
										
										echo "<div class=' alert alert-danger'>
										<h2>Error<h2>
											<div class=''>
												
												
												$msg_email_error
												
																				
																					
											</div>
											</div>
										";
									}

		if (!empty($msg_password_error) )
			{
										
										echo "<div class=' alert alert-danger'>
										<h2>Error<h2>
											<div class=''>
												
												
												$msg_password_error
												
																				
																					
											</div>
											</div>
										";
									}
									
									
			if (!empty($msg_tel__error))
			{
										
										echo "<div class=' alert alert-danger'>
										<h2>Error<h2>
											<div class=''>
												
												
												$msg_tel__error
																				
																					
											</div>
											</div>
										";
									}						
									

?>

























		
		<?php
	
		include('../includes/connexion_bd.php');
		
		$insertion = "SELECT * FROM user  WHERE user_id= :id"; 
		$query=$bdd->prepare($insertion);
		
		$query->bindParam(':id', $_SESSION['user_id']);
		
		$query->execute();
		
		
		
		
		while($resultat=$query->fetch())
		{
			
			
		
		
		
		
		
		
		
		
	
	?>


		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <title>Profil</title>
	



	

 
  
 
 	
 
<div id="main-content">

		
<?php
if (!empty($msg_photo_error) )
									{
										
										echo "<div class=' alert alert-danger'>
										<h2>Error<h2>
											<div class=''>
												$msg_photo_error
																	
												
											</div>
											</div>
										";
									}



?>















<div class="container card">

	<div class="container" style="margin:5% auto;">
		<div class="row">
												   
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="col-md-12 shadow-sm p-3 mb-5 rounded " style="background-color:#7915ab;">
					<h5 class="text-center " style="color:#fff;">Profil de <?php echo $resultat['prenom'];?> </h5>
				</div>
				<div class="row">
					<div class="col-md-12 shadow-sm p-3 mb-5 bg-body rounded">
						<img style="height: 300px ; width: 300px; border-radius: 100%;" class="card-img-top mx-auto d-block" src="<?php echo $resultat['photo_profile'];?>">
						<div class="card-body text-center">
							<h5 class="card-title "><?php echo $resultat['username'];?></h5>
						</div>
					</div>
														
				</div>
			</div>
														 
			<div class="col-md-6">
				<div class="col-md-12 shadow-sm p-3 mb-5 rounded "  style="background-color:#7915ab;">
					<h5 class="text-center" style="color:#fff;">Mes Informations</h5>
				</div>
				<div class="col-md-12 shadow-sm p-3 mb-5 bg-body rounded">
					<ul class="list-group">
						<li class="list-group-item">Nom :  <span style="color:#7915ab; font-style: italic;"><?php echo $resultat['name'];?></span> <a style="position:absolute; right:10px; text-decoration: none;" href="#" data-toggle="modal" data-target="#nom" type="btn">Modifier</a></li>
						<li class="list-group-item">prenom :  <span style="color:#7915ab; font-style: italic;"><?php echo $resultat['prenom'];?></span> <a style="position:absolute; right:10px; text-decoration: none;" href="#" data-toggle="modal" data-target="#prenom" type="btn">Modifier</a></li>
						<li class="list-group-item">username :  <span style="color:#7915ab; font-style: italic;"><?php echo $resultat['username'];?></span> <a style="position:absolute; right:10px; text-decoration: none;" href="#" data-toggle="modal" data-target="#username" type="btn">Modifier</a></li>
						<li class="list-group-item">email :  <span style="color:#7915ab; font-style: italic;"><?php echo $resultat['email'];?></span> <a style="position:absolute; right:10px; text-decoration: none;" href="#" data-toggle="modal" data-target="#email" type="btn">Modifier</a></li>
						<li class="list-group-item">telephone :  <span style="color:#7915ab; font-style: italic;"><?php echo $resultat['telephone'];?></span> <a style="position:absolute; right:10px; text-decoration: none;" href="#" data-toggle="modal" data-target="#telephone" type="btn">Modifier</a></li>
						<li class="list-group-item">password :  <span style="color:#7915ab; font-style: italic;">xxxxxxxxxxxxx</span> <a style="position:absolute; right:10px; text-decoration: none;" href="#" data-toggle="modal" data-target="#password" type="btn">Modifier</a></li>
						<li class="list-group-item">image :  <span style="color:#7915ab; font-style: italic;"></span> <a style="position:absolute; right:10px; text-decoration: none;" href="#" data-toggle="modal" data-target="#image" type="btn">Modifier</a></li>
				  </ul>
				</div>
			</div>
													
		</div>											
	</div>	
		<?php
			if($_SESSION['permission'] == 2)
			{
					?>
				<div class="row">
								<a href="register_admin.php"> 
											<button  type="button" class="btn btn-success bt">register admin</button>
										</a>
										
				</div>


		<?php
			
			}
			
			?>
			
</div>
		
		
	<?php
	
		}
		
	
	?>
				


		
		
		
		
		
		
		
		
		
        
<div class="modal fade" id="nom" tabindex="-1" aria-labelledby="EpicModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="EpicModalLabel">Modifier votre Nom</h5>                                    
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				 </button>
			</div>                                
			<div class="modal-body">
				<form method="post" action="" autocomplete="off">
					<div class="form-group">
						<label for="nom">Nom<span class="text-danger">*</span></label>
						<input type="text" name="nom" id="nom" class="form-control" required="required">
					</div>
					<div class="" style="margin-top:20px;">
						<button class="btn col-12" type="submit" name="nam" style="background-color:#7915ab; color: #fff;">Modifier</button>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>





<div class="modal fade" id="prenom" tabindex="-1" aria-labelledby="EpicModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="EpicModalLabel">Modifier votre Prenom</h5>                                    
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				 </button>
			</div>                                
			<div class="modal-body">
				<form method="post" action="" autocomplete="off">
					<div class="form-group">
						<label for="prenom">Prenom<span class="text-danger">*</span></label>
						<input type="text" name="prenom" id="prenom" class="form-control" required="required">
					</div>
					<div class="" style="margin-top:20px;">
						<button class="btn col-12" type="submit" name="nam" style="background-color:#7915ab; color: #fff;">Modifier</button>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
							  
	  


<div class="modal fade" id="username" tabindex="-1" aria-labelledby="EpicModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="EpicModalLabel">Modifier votre pseudo</h5>                                    
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				 </button>
			</div>                                
			<div class="modal-body">
				<form method="post" action="" autocomplete="off">
					<div class="form-group">
						<label for="username">Pseudo<span class="text-danger">*</span></label>
						<input type="text" name="username" id="username" class="form-control" required="required">
					</div>
					<div class="" style="margin-top:20px;">
						<button class="btn col-12" type="submit" name="nam" style="background-color:#7915ab; color: #fff;">Modifier</button>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
  
			
			
			
			
			
<div class="modal fade" id="email" tabindex="-1" aria-labelledby="EpicModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="EpicModalLabel">Modifier votre email</h5>                                    
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				 </button>
			</div>                                
			<div class="modal-body">
				<form method="post" action="" autocomplete="off">
					<div class="form-group">
						<label for="email">Email<span class="text-danger">*</span></label>
						<input type="text" name="email" id="email" class="form-control" required="required">
					</div>
					<div class="" style="margin-top:20px;">
						<button class="btn col-12" type="submit" name="nam" style="background-color:#7915ab; color: #fff;">Modifier</button>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
			
			


<div class="modal fade" id="telephone" tabindex="-1" aria-labelledby="EpicModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="EpicModalLabel">Modifier votre Nom</h5>                                    
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				 </button>
			</div>                                
			<div class="modal-body">
				<form method="post" action="" autocomplete="off">
					<div class="form-group">
						<label for="telephone">Telephone<span class="text-danger">*</span></label>
						<input type="text" name="telephone" id="telephone" class="form-control" required="required">
					</div>
					<div class="" style="margin-top:20px;">
						<button class="btn col-12" type="submit" name="nam" style="background-color:#7915ab; color: #fff;">Modifier</button>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>





<div class="modal fade" id="password" tabindex="-1" aria-labelledby="EpicModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="EpicModalLabel">Modifier votre Nom</h5>                                    
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				 </button>
			</div>                                
			<div class="modal-body">
				<form method="post" action="" autocomplete="off">
					<div class="form-group">
						
						<label for="password">Password<span class="text-danger">*</span></label>
						<input type="text" name="password" id="password" class="form-control" required="required">
					</div>
					<div class="" style="margin-top:20px;">
						<button class="btn col-12" type="submit" name="nam" style="background-color:#7915ab; color: #fff;">Modifier</button>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>











<div class="modal fade" id="image" tabindex="-1" aria-labelledby="EpicModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="EpicModalLabel">Modifier votre Photo de profile</h5>                                    
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				 </button>
			</div>                                
			<div class="modal-body">
			
			
				<form method="POST" action=""  autocomplete="off" enctype="multipart/form-data">>
					<div class="form-group">
						<label for="image">Photo  de profile<span class="text-danger">*</span></label>
						<input type="hidden" name="MAX_FILE_SIZE" value="100000"> 
						Fichier : <input type="file" name="avatar" required> 
						
					</div>
					<div class="" style="margin-top:20px;">
						<button class="btn col-12" type="submit" name="nam" style="background-color:#7915ab; color: #fff;">Modifier</button>
					</div>
				</form>
				
				
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>






	

	



<?php
	include('../includes/foot.php');
	
	?>
