<?php
	session_start();

?>

	<?php
	
		include('../includes/connexion_bd.php');
				include('../includes/fonction.php');
	?>


<?php

						if (isset($_POST['username']) && isset($_POST['password']) )
							{
						
								$msg_password_erreur = "";
								$msg_user_nexiste_pas_erreur = "";
								$new_pseudo = securisation($_POST['username']);
								$new_password = securisation($_POST['password']);
								$msg_password_erreur=securisation_password($new_password);
								$msg_user_nexiste_pas_erreur = login($new_pseudo,$new_password);
								$create_session = create_session_login($new_pseudo,$new_password);
								if(empty($msg_password_erreur)&& empty($msg_user_nexiste_pas_erreur) && !empty($create_session))
								{
									
									//echo $_SESSION['user_id'];
									header('Location:main.php');
									
									$_SESSION['user_id'] = $create_session;
									
									
									$insertion = "SELECT * FROM user WHERE user_id:id";
			
									$requete = $bdd->prepare($insertion);
									
									$requete->bindParam(':id', $_SESSION['user_id']);
											
									$requete->execute();
									
									
									while($result=$requete->fetch())
									{
										$_SESSION['username']= $result['username'];
										$_SESSION['pass']= $result['password'];
									}
									
									if(isset($_POST['login_auto']))
									{
										setcookie('username',$_SESSION['username'],time() + 3600,"/","monresto.com", false, true);
										setcookie('pass',$_SESSION['pass'],time() + 3600,"/","monresto.com", false, true);
										
									}
									$id = create_session_login($_COOKIE['username'],$_COOKIE['pass']);
							
								}
							}
							
							
							
									
									
									
									if(!empty($id))
									{
										header('Location:main.php');
										
										echo $_COOKIE['pass'];
									}
									
									
							
							
							
							
							
							
							
							
							
							
							
							
							
							
	?>

	
	<link rel="stylesheet" type="text/css" href="../css/login.css"/>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css"/>





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
						<h2>Login</h2>
						<form method= "POST" action= "login.php">
							
							<div class="inputbox">
								<input type="text" name="username" placeholder="Username..." style="text-align:center;" required >
							</div>

							<div class="inputbox">
								<input type="password" name="password" placeholder="Password..." style="text-align:center;" required >
							</div>
							
							<div class="">
								 
								<label for="login_auto" class="text-white" style="margin-right:10px">Me garder connecter</label><input type="checkbox" name="login_auto" id="login_auto"  >
							</div>
							
							

							<div class="inputbox">
								<input type="submit" name="login" value="Login">
							</div>
						</form>
						<div>
							<span style="color:#fff;">Vous n'avez pas un compte ?</span> <a class="connexion_link" href="../register.php">S'inscrire</a>
						</div>
						<?php

							if(!empty($msg_password_erreur) || !empty($msg_user_nexiste_pas_erreur))
								{
									echo "<h2>Error<h2>";
									echo "<div class=' alert alert-danger'>
											<div class=''>
												
												$msg_password_erreur
												$msg_user_nexiste_pas_erreur
																				
																					
											</div>
											</div>";
								}
											
			?>
					</div>

				</div>
			</div>
		</div>
		</center>		
	
	
	
	
	