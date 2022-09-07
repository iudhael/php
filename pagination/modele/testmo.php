<?php
	
    

        function pagination($limit,$paginationStart)
        {    
            require('connexion.php');
            $insertion = "SELECT  * FROM ville ORDER BY nom_ville ASC LIMIT $paginationStart, $limit";
            $requete = $bdd->prepare($insertion);
            $requete->execute();

            return  $requete;
        }

        function count_ville()
        {    
            require('connexion.php');
            $sql = $bdd->query("SELECT count(id_ville) AS id FROM ville")->fetchAll();
            return $sql;
        }
            
            



?>