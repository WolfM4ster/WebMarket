<?php
	/************************************************************************/
	/* 
	        panier par Abdoullah REZGUI
	        - en fonction de l'action qui est mis en paramètre : 
			- on affiche le panier
			- on supprimer le produit du panier
	*/
	/************************************************************************/

	//Contrôle du paramètre action
	if(!isset($_GET['action'])) {
?>
<META HTTP-EQUIV="refresh" CONTENT="0;URL=?page=erreur&erreur=6">
<?php
	} else {
		$action = $_GET['action'];
		
		$num_action = 0; //afficher panier
		if($action == "supprimer") {
			$num_action = 1; //supprimer panier
		}
		
		$db = ConnexionDB::getInstance();
		
		switch($num_action)
		{
			/*********************** Affichage Panier *******************************************/	
			case 0 :
				$id_client = $_SESSION['id_client'];
				$results = $db->querySelect('
					SELECT pa.`quantite_panier`,
					pro.`id_produit`, pro.`titre`, pro.`type`, pro.`marque`, pro.`image`, pro.`description`, pro.`quantite_stock`, pro.`prix_public`, pro.`prix_achat`
					FROM panier pa, produit pro 
					WHERE pa.id_produit = pro.id_produit AND pa.id_client = ?', [$id_client]);

				$nb_results = count($results);
				if($nb_results == 0) {
					echo 'Aucun produit dans le panier';
				} else {	
					for($i = 0; $i < $nb_results; $i++) {

						$id_produit         = $results[$i]['id_produit'];
						$titre              = $results[$i]['titre'];
						$marque             = $results[$i]['marque'];
						$image              = $results[$i]['image'];
						$quantite_stock     = $results[$i]['quantite_stock'];
						$prix               = $results[$i]['prix_public'];
						$description        = $results[$i]['description'];												
						$quantite_panier    = $results[$i]['quantite_panier'];

						//Affiche les informations du produit
						echo '<div id="produit">';
						echo '	<center><div align="center" class="image_produit">';
						echo ' 	<img src="' .$image. '" height="100%" />';			
						echo '	</div></center>';
						echo '	<b>Titre:</b>       '. $titre .'<br />';
						echo '	<b>Description:</b> '. $description .'<br />';
						echo '	<b>Marque:</b>      '. $marque .'<br />';
						echo '	<b>Prix:</b>        '. $prix .' Euros<br />';
						echo '	<b>Stock:</b>       '. $quantite_stock .'<br />';
						echo '	<b>Quantité voulue:</b>       '. $quantite_panier .'<br /><br />';
						echo '</div>';
						
						//Contrôle du stock et de la quantité demandée
						if($quantite_stock < $quantite_panier) {
							echo '<center><a href="#">Pas assez en stock</a></center>';
							echo '<center><a href="?page=panier&action=supprimer&id='. $id_produit .'">Supprimer </a></center>';
						}
						else {
							echo '<center><a href="?page=panier&action=supprimer&id='. $id_produit .'">Supprimer</a></center>';
						}
					
					}
				
					
					echo '<br /><br /><center><a class="button" href="?page=genererFacture" onclick="return confirm(\'Etes vous sur de valider, cela générera votre facture et mettra à jour les stocks ?\')" >Valider ma commande</a></center>';
				}
				break;
			
			/*********************** Supprimer Panier *******************************************/
			case 1 :
				$id_produit = $_GET['id'];
				$db->execute('DELETE FROM panier WHERE id_produit = ?', [$id_produit]);
				echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL=?page=panier&action=afficher">';
				break;
		}
    }    
?>