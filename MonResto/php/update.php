		<?php
	
		include('../includes/connexion_bd.php');
	
	?>














<?php 
    
    $msg = '';
    if (isset($_POST['modifier'])) {
        if (!empty($_POST['name']) && !empty($_POST['ville']) && !empty($_POST['pays']) && !empty($_POST['sexe']) && !empty($_POST['facebook']) && !empty($_POST['instagramme']) && !empty($_POST['biographie'])) {

            $prenom = htmlspecialchars($_POST['name']);
            $ville = htmlspecialchars($_POST['ville']);
            $pays = htmlspecialchars($_POST['pays']);
            $sexe = htmlspecialchars($_POST['sexe']);
            $facebook = htmlspecialchars($_POST['facebook']);
            $instagramme = htmlspecialchars($_POST['instagramme']);
            $biographie = htmlspecialchars($_POST['biographie']);

            if (strlen($prenom) >= 3) {

                if (strlen($biographie) < 300) {
                    $update = $bdd->prepare('UPDATE utilisateurs SET prenom = ? , ville = ?, pays = ?, sexe = ?, facebook = ?, instagramme = ?, biographie = ? WHERE token = ?') ;
                    $update->execute(array($prenom,$ville,$pays,$sexe,$facebook,$instagramme,$biographie,$_SESSION['user']));
                }else{
                    $msg ="<div class='col-md-12 alert alert-danger'>
                                <div class='col-md-10'>
                                       Votre biographie est trop long 300 caractères Max !
                                </div>
                                <div class=''>
                                    <button style='position:absolute; right:5px;top:5px;' type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                            <span aria-hidden='true'>x</span>                                     
                                    </button> 
                                </div>
                            </div>";
                }

            }else{
                $msg ="<div class='col-md-12 alert alert-danger'>
                            <div class='col-md-10'>
                                       votre prenom est trop court 3 caractères Min !
                            </div>
                            <div class=''>
                                <button style='position:absolute; right:5px;top:5px;' type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                            <span aria-hidden='true'>x</span>                                     
                                </button> 
                            </div>
                        </div>";
            }
            
        }
    }

?>