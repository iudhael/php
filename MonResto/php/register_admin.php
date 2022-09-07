v<?php
		
	 $pseudo = $password = $email = $nom_resto= "";
		$msg_creation_user ="";$msg_creation_user_erreur ="";
		if (isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['reconfirm-password']) )
		{
			include('../includes/fonction.php');		
				$new_email = strtolower(securisation($_POST['email']));
				$new_nom_resto = securisation($_POST['nom_resto']);
				$new_pseudo = securisation($_POST['username']);
				$new_password = securisation($_POST['password']);
				$re_password = securisation($_POST['reconfirm-password']);
				
				
			$msg_email_error = securisation_mail($_POST['email']);
			$msg_password_error = securisation_password($new_password);
			
			$msg_pass_incorrecte_error = verification_password($new_password,$re_password);
			
			
			if(empty($msg_email_error) && empty($msg_password_error) && empty($msg_pass_incorrecte_error) )
			{
				
				$password= $new_password;
				$email = $new_email ;
				$nom_resto=$new_nom_resto;
				
				$pseudo = $new_pseudo;
				
				if(!empty($pseudo) && !empty($email) && !empty($password) && !empty($nom_resto)  )
				{
					$msg_creation_admin_erreur =	register_admin_error($pseudo,$nom_resto,$email);
					
					
					if(empty($msg_creation_admin_erreur))
					{
						$msg_creation_admin = register_admin($pseudo,$password,$email,$nom_resto);
						header('Location:php/login_admin.php');die();
					}
					
					
				}
							
			}
		}
			?>








<!DOCTYPE html>
<html>
	<head>
			 <meta charset="UTF-8">
			 <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Register</title> 
		
		<!-- Custom CSS -->
	
	<link rel="stylesheet" type="text/css" href="../css/register.css"/>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css"/>
	
	
	
	</head>
		
	<body class="">
		
	

		<center>
		<div class="section ">
			
			<div class="box">
				<div class="square" style="--i:0;"></div>
				<div class="square" style="--i:1;"></div>
				<div class="square" style="--i:2;"></div>
				<div class="square" style="--i:3;"></div>
				<div class="square" style="--i:4;"></div>
				
				<div class="content">
				
					<div class="form">
						<h2>Régister</h2>
						<form method= "POST" action= "register_admin.php">
							
							
							
							
							
							<div class="inputbox">
								<input type="text" name="username" placeholder="Username..." style="text-align:center;"required >
							</div>
							<div class="inputbox">
								<input type="email" name="email" placeholder="Email..." style="text-align:center;"  required >
							</div>
							<div class="inputbox">
								<input type="text" name="nom_resto" placeholder="Nom resto..." style="text-align:center;"required >
							</div>
					

							<div class="inputbox">
								<input type="password" name="password" placeholder="Password..." style="text-align:center;" required >
							</div>
							
							<div class="inputbox">
								<input type="password" name="reconfirm-password" placeholder="Reconfirm password..." style="text-align:center;" required >
							</div>

							<div class="inputbox">
								<input type="submit" name="Register" value="Register">
							</div>
							
							
							

						</form>


						

						<?php
						if (!empty($msg_email_error) || !empty($msg_password_error) || !empty($msg_pass_incorrecte_error) )
									{
										echo "<h2>Error<h2>";
										echo "<div class=' alert alert-danger'>
											<div class=''>
												$msg_creation_user_erreur
												
												
												$msg_pass_incorrecte_error
												$msg_password_error
												$msg_email_error
												
																				
																					
											</div>
											</div>
										";
									}
									
							if(!empty($msg_creation_user_erreur))
							{
								
								echo "<h2>Error<h2>";
								echo "<div class=' alert alert-danger'>
									<div class=''>
										$msg_creation_user_erreur
														
										</div>
											</div>		
									";
											
							}
						?>
						
							
					</div>

				</div>
			</div>
		</div>

	</center>

		<script src="js/bootstrap.js"></script>

		

		
	</body>

</html>