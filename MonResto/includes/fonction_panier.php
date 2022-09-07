<?php

function creationPanier(){
   if (!isset($_SESSION['panier'])){
      $_SESSION['panier']=array();
	   $_SESSION['panier']['id'] = array();
      $_SESSION['panier']['nom'] = array();
      $_SESSION['panier']['quantite'] = array();
      $_SESSION['panier']['prix'] = array();
      $_SESSION['panier']['verrou'] = false;
   }
   return true;
}


function ajouter_cmd($id,$nom,$quantite,$prix){

   //Si le panier existe
   if (creationPanier() && !isVerrouille())
   {
      //Si le produit existe déjà on ajoute seulement la quantité
      $positionProduit = array_search($nom,  $_SESSION['panier']['nom']);

      if ($positionProduit !== false)
      {
		 //$_SESSION['panier']['quantite'][$positionProduit] = 0;
         $_SESSION['panier']['quantite'][$positionProduit] += $quantite ;
      }
      else
      {
         //Sinon on ajoute le produit
		 array_push( $_SESSION['panier']['id'],$id);
         array_push( $_SESSION['panier']['nom'],$nom);
         array_push( $_SESSION['panier']['quantite'],$quantite);
         array_push( $_SESSION['panier']['prix'],$prix);
      }
   }
   else
   {
      echo "Un problème est survenu veuillez contacter l'administrateur du site.";
   }
   
}



function supprimer_cmd($id){
   //Si le panier existe
   if (creationPanier() && !isVerrouille())
   {
      //Nous allons passer par un panier temporaire
      $tmp=array();
	  $tmp['id'] = array();
      $tmp['nom'] = array();
      $tmp['quantite'] = array();
      $tmp['prix'] = array();
      $tmp['verrou'] = $_SESSION['panier']['verrou'];

      for($i = 0; $i < count($_SESSION['panier']['id']); $i++)
      {
         if ($_SESSION['panier']['id'][$i] !== $id)
         {
			
			array_push($tmp['id'], $_SESSION['panier']['id'][$i]);
            array_push( $tmp['nom'],$_SESSION['panier']['nom'][$i]);
            array_push( $tmp['quantite'],$_SESSION['panier']['quantite'][$i]);
            array_push( $tmp['prix'],$_SESSION['panier']['prix'][$i]);
         }

      }
      //On remplace le panier en session par notre panier temporaire à jour
      $_SESSION['panier'] =  $tmp;
      //On efface notre panier temporaire
      unset($tmp);
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}








function modifierQTe_cmd($nom,$quantite){
   //Si le panier existe
   if (creationPanier() && !isVerrouille())
   {
      //Si la quantité est positive on modifie sinon on supprime l'article
      if ($quantite > 0)
      {
         //Recherche du produit dans le panier
         $positionProduit = array_search($nom,  $_SESSION['panier']['nom']);

         if ($positionProduit !== false)
         {
            $_SESSION['panier']['quantite'][$positionProduit] = $quantite ;
         }
      }
      else
      supprimerArticle($nom);
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}




function MontantGlobal(){
   $total=0;
   for($i = 0; $i < count($_SESSION['panier']['nom']); $i++)
   {
      $total += $_SESSION['panier']['quantite'][$i] * $_SESSION['panier']['prix'][$i];
   }
   return $total;
}





function isVerrouille(){
   if (isset($_SESSION['panier']) && $_SESSION['panier']['verrou'])
      return true;
   else
      return false;
}



function compter_cmd()
{
   if (isset($_SESSION['panier']))
   return count($_SESSION['panier']['nom']);
   else
   return 0;

}




function supprimePanier(){
   unset($_SESSION['panier']);
}




























?>