<?php
		
		$prenom = $nom = $pseudo = $password = $email = $tel = "";
		$msg_creation_user ="";$msg_creation_user_erreur ="";
		if (isset($_POST['name']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['telephone']) )
		{
			include('includes/fonction.php');		
				$new_email = strtolower(securisation($_POST['email']));
				$new_name = securisation($_POST['name']);
				$new_prenom = securisation($_POST['prenom']);
				$new_pseudo = securisation($_POST['username']);
				$new_password = securisation($_POST['password']);
				$re_password = securisation($_POST['reconfirm-password']);
				$new_tel = securisation($_POST['telephone']);
				
			$msg_email_error = securisation_mail($_POST['email']);
			$msg_password_error = securisation_password($new_password);
			$msg_name_error = verification_name($new_name);
			$msg_prenom_error = verification_prenom($new_prenom);
			$msg_pass_incorrecte_error = verification_password($new_password,$re_password);
			$msg_tel__error = verification_tel($new_tel);
			
			if(empty($msg_email_error) && empty($msg_password_error) && empty($msg_pass_incorrecte_error) && empty($msg_name_error) && empty($msg_prenom_error) && empty($msg_tel__error))
			{
				$prenom = $new_prenom ;
				$password= $new_password;
				$email = $new_email ;
				$nom = $new_name ;
				$pseudo = $new_pseudo;
				$tel = $new_tel;
				if(!empty($nom) && !empty($prenom) && !empty($pseudo) && !empty($email) && !empty($password) && !empty($tel) )
				{
					$msg_creation_user_erreur =	register_user_error($pseudo,$password,$email,$tel);
					
					
					if(empty($msg_creation_user_erreur))
					{
						$msg_creation_user = register_user($nom,$prenom,$pseudo,$password,$email,$tel);
						header('Location:php/login.php');die();
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
	<link rel="stylesheet" type="text/css" href="./css/connexionn.css"/>
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.css"/>
	
	<style>
	
	body{
	background: linear-gradient(rgba(0,0,0,0.8),rgba(0,0,0,0.6)), url('images/fond.jpg') center center fixed;
	background-repeat: no-repeat;
    background-size: 100%;
     -webkit-background-size: cover;
    -moz-background-size: cover;
    background-size: cover;
    -o-background-size: cover;
}






_*{
	margin: 0;
	padding: 0;
	_box-sizing: border-box;
	_font-family: "Arial", Sans-serif;
}
body{
	_overflow: hidden;
	_background-color: #ff15ea;
	
}

.section{
	
	_display: flex;
	_justify-content: center;
	_align-items: center;
	width : 500px;
	
	margin-top:50px;
	margin-bottom:200px;
	_border: 1px blue solid;
	_background: linear-gradient(to bottom,#f1f4f9,#dff1ff);
}




.box{
	_position: fixed;
	_border: 1px blue solid;
	width:100%;
}
.content{
	_position: relative;
	width:100%;
	_min-height: 400px;
	background: rgba(255,255,255,0.1);
	border-radius: 10px;
	_display: flex;
	_justify-content: center;
	_align-items: center;
	backdrop-filter:blur(5px);
	box-shadow: 0 25px 45px rgba(0,0,0,0.1);
	border: 1px solid rgba(255,255,255,0.5);
	border-right: 1px solid rgba(255,255,255,0.2);
	border-right: 1px solid rgba(255,255,255,0.2);
}
.box .square{
	position: absolute;
	backdrop-filter:blur(5px);
	box-shadow: 0 25px 45px rgba(0,0,0,0.1);
	border: 1px solid rgba(255,255,255,0.5);
	border-right: 1px solid rgba(255,255,255,0.2);
	border-right: 1px solid rgba(255,255,255,0.2);
	background: rgba(255,255,255,0.1);
	border-radius: 10px;
	animation: animate 10s linear infinite;
	animation-delay: calc(-1s * var(--i));
}
@keyframes animate{
	0%,100%
	{
		transform: translate(-40px);
	}
	50%
	{
		transform: translate(40px);
	}
}
.box .square:nth-child(1){
	top: 20px;
	right: 400px;
	width: 200px;
	height: 200px;
}
.box .square:nth-child(2){
	top: 300px;
	left:  450px;
	width: 120px;
	height: 120px;
	z-index: 2;
}
.box .square:nth-child(3){
	bottom:50px;
	right:  450px;
	width: 80px;
	height: 80px;
}
.box .square:nth-child(4){
	top:100px;
	left:  300px;
	width: 200px;
	height: 50px;
}
.box .square:nth-child(5){
	bottom:100px;
	left:  600px;
	width: 50px;
	height: 50px;
}


@media  screen and (max-width:700px){
	.section{
		width:400px;
	}
	
	
	
		.box .square:nth-child(1){
		top: 20px;
		right: 100px;
		width: 150px;
		height: 150px;
	}
	.box .square:nth-child(2){
		top: 300px;
		left:  200px;
		width: 110px;
		height: 110px;
		z-index: 2;
	}
	.box .square:nth-child(3){
		bottom:50px;
		right:  350px;
		width: 80px;
		height: 80px;
	}
	.box .square:nth-child(4){
		top:100px;
		left:  100px;
		width: 200px;
		height: 50px;
	}
	.box .square:nth-child(5){
		bottom:400px;
		left:  50px;
		width: 50px;
		height: 50px;
	}
		
}

form{
	
	_border: 1px blue solid;
	
}

.form{
	_position: relative;
	width: 100%;
	_height: 100%;
	padding: 40px;
	_box-sizing: border-box;
	_border: 1px blue solid;
}
.form h2{
	_position: relative;
	color: #fff;
	font-size: 24px;
	font-weight: 600px;
	letter-spacing: 1px;
	margin-bottom: 30px;
	_border: 1px blue solid;
	_text-align:left;
}
.form h2::before{
	content: '';
	position: absolute;
	_left: 50;
	top: 120px;
	width: 80px;
	height: 4px;
	background: #fff;
}
.form .inputbox{
	width: 100%;
	margin-top: 20px;
	_border: 1px blue solid;
}
.form .inputbox input{
	width: 100%;
	background: rgba(255,255,255,0.2);
	border: none;
	outline: none;
	padding: 10px;
	border-radius: 35px;
	border: 1px solid rgba(255,255,255,0.5);
	border-right: 1px solid rgba(255,255,255,0.2);
	border-bottom:1px solid rgba(255,255,255,0.2);
	font-size: 16px;
	letter-spacing: 1px;
	color: #fff;
	box-shadow: 0 5px 15px rgba(0,0,0,0.05);
}
.form .inputbox input::placeholder{
	color: #fff;
	text-align: center;
}
.form .inputbox input[type="submit"]{
	background: #fff;
	color: #666;
	max-width: 250px;
	cursor: pointer;
	margin-bottom: 20px;
	font-weight: 600;
	
}


.connexion_link{
	color: pink;
	text-decoration:none;
	
}

.connexion_link:hover {
	color: white;
	
	
	
}



















	
	
	
	
	
	
	
	
	
	
	</style>
	
	
	
	
	
	</head>
		
	<body class="">
		
		<?php
	/*
	require 'target1.php';
	
	*/
	
	
	?>
	
	
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
						<form method= "POST" action= "register.php">
							
							
							<div class="inputbox">
								<input type="text" name="name" placeholder="Name..."  style="text-align:center;" required >
							</div>
							
							<div class="inputbox">
								<input type="text" name="prenom" placeholder="Prenom..." style="text-align:center;" required >
							</div>
							
							<div class="inputbox">
								<input type="text" name="username" placeholder="Username..." style="text-align:center;"required >
							</div>
							
							<div class="inputbox">
								<input type="email" name="email" placeholder="Email..." style="text-align:center;"  required >
							</div>
							
							<div class="inputbox">
								<input type="text" name="telephone" placeholder="Téléphone..." style="text-align:center;" required >
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


						

						<div class="mar_bot">
							<span style="color:#fff;">Vous avez déja un compte ? </span> <a class="connexion_link" href="php/login.php">Login</a>
						</div>
						
						<?php
						if (!empty($msg_email_error) || !empty($msg_password_error) || !empty($msg_pass_incorrecte_error) || !empty($msg_name_error) || !empty($msg_prenom_error) || !empty($msg_tel__error))
									{
										echo "<h2>Error<h2>";
										echo "<div class=' alert alert-danger'>
											<div class=''>
												$msg_creation_user_erreur
												$msg_name_error
												$msg_prenom_error
												$msg_pass_incorrecte_error
												$msg_password_error
												$msg_email_error
												$msg_tel__error
																				
																					
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