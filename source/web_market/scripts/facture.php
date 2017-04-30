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
		
		$db = ConnexionDB::getInstance();
		
		switch($num_action)
		{
			/*********************** Affichage Panier *******************************************/	
			case 0 :
				$id_client = $_SESSION['id_client'];
				
				$dossier_client = './factures/client_' . $id_client;

				$results = $db->querySelect('
					SELECT id_facture
					FROM facture  
					WHERE id_client = ?', [$id_client]);

				$nb_results = count($results);
				if($nb_results == 0) {
					echo 'Aucune facture réalisée.';
				} else {

					echo '<ul>';
					for($i = 0; $i < $nb_results; $i++) {

						$id_facture         = $results[$i]['id_facture'];
						
						$fichier_facture = $dossier_client . '/fact_' . $id_facture . '.pdf';

						//Affiche les liens des factures
						echo '<li><a href="' . $fichier_facture . '">Facture n°' . $id_facture . '</a></li>';
					}
					echo '</ul>';
				}
				break;
		}
    }    
?>