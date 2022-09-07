<?php
	
	
	include('connexion_bd.php');
?>


<?php
	if(empty($_SESSION['user_id']))
	{
		header('Location:login.php');
		
	}
	
	$insertion = "SELECT * FROM user WHERE user_id=:id";
			
			$requete = $bdd->prepare($insertion);
			
			$requete->bindParam(':id', $_SESSION['user_id']);
					
			$requete->execute();

?>

	
	<link rel="stylesheet" type="text/css" href="./css/navbar.css"/>
	
		 <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #212529;">
            <div class="container-fluid">
                <a class="navbar-brand" href="../php/main.php">
                    <img src="../images/log.png" alt="logo" height="40" width="40">
                    Dashboard
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#EpicNavbar" aria-controls="EpicNavbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="EpicNavbar">
                    <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                        <li class="nav-item">
				
				<li class="nav-item">
                            <a class="nav-link " aria-current="page" href="../php/recette.php">Recette</a>
                </li>
				
				 <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="../php/contact.php">Contacts</a>
                        </li>
						
					
				<li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="NavbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                                Profil
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="NavbarDropdown">
                                <li><a class="dropdown-item" href="profile_page.php">Moi</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="logout.php">Me déconnecté</a></li>
                            </ul>
                        </li>
                       
					</ul>
					
					<?php
					while($query = $requete->fetch())
						{
					?>
						 <span class="hello-msg">Hello, <?php echo $query['name'] ?></span>
					
					<?php
					
						}
					?>
						
				
                </div>
            </div>
        </nav>
        
        <div class="container">
            <div class="row" >
                <div class="col-12">
                </div>
            </div>
        </div>
