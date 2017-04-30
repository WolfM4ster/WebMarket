<?php
	/************************************************************************/
	/* 
	        admin_produit par Abdoullah REZGUI
	        - Affiche toutes les informations sur les produits présents dans la base de données
	        - l'administrateur peut modifier ou supprimer les produits présents dans le base de données
	        Note : les produits sont paginés de 5 en 5
	*/
	/************************************************************************/
	
	//Contrôle du droit d'administration
	if(!isset($_SESSION['admin']) or $_SESSION['admin'] == 0) {
		echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL=?page=acceuil">';
	} else {
		//Numéro de la page afin d'afficher en fonction de la pagination
		$num_page = 0;
		if(isset($_GET['npage']) && is_numeric($_GET['npage'])) {
			$num_page = $_GET['npage'];
		}
			
		$db = ConnexionDB::getInstance();
		
		$results = $db->querySelect('SELECT id_produit, titre, type, marque, image, description, quantite_stock, prix_public, prix_achat FROM produit');
		
		//Début de l'Algorithme de pagination de  5 articles par page
		$pagination = 5;
		
		$nb_total_produit = count($results);
		$debut = 0;
		
		$nb_pages = 1;
		if(($nb_total_produit % $pagination) == 0) {
			$nb_pages = $nb_total_produit / $pagination;
			$debut = $num_page * $pagination;
		} else {
			$nb_pages = ($nb_total_produit / $pagination);
			$debut = $num_page * $pagination;
		}
			
		$fin   = $debut + $pagination;
		if($fin > $nb_total_produit) {
			$fin = $nb_total_produit;
		}
			
		if($nb_pages < 1) {
			$nb_pages = 1;
		}
		//fin de l'algorithme de pagination	
?>
<br /><br />				
<?php		
		//Haut de page
		//Affiche page 1, page 2, page ... en fonction de la pagination et du nombre de produits	
		for($i = 0; $i < $nb_pages; $i++) {

			if($i != $num_page) {
				echo '<a href="?page=adminListProduits&npage='. $i . '">Page '. ($i+1) . '</a>&nbsp;';
			} else {
				echo 'Page '.($i+1).'&nbsp;';
			}
			
		}
		
?>
<br /><br />				
<?php		
		
		//Récupération des informations sur les produits dans la base de données en fonction de la pagination
		for($i = $debut; $i < $fin; $i++) {

			$id_produit     = $results[$i]['id_produit'];
			$titre          = $results[$i]['titre'];
			$type           = $results[$i]['type'];
			$marque         = $results[$i]['marque'];
			$image          = $results[$i]['image'];
			$quantite_stock = $results[$i]['quantite_stock'];
			$prix_public    = $results[$i]['prix_public'];
			$prix_achat     = $results[$i]['prix_achat'];
			$description    = $results[$i]['description'];
			
?>
<br /><br />				
			
			<!-- Affiche les informations du produit -->
			<div align="center" id="produit">
			<div align="center" class="image_produit">	
				<img src="<?= $image; ?>" height="100%" width="120" />
			</div>
			<form action="?page=requeteProduit&type_requete=3&id_produit=<?= $id_produit ?>" method="post">
				<center><p><b>ID :</b><?= $id_produit ?></p>
				<p><b>Titre :</b>       <p><input name="titre" value="<?= $titre ?>" /></p></p>
				<p><b>Type :</b>        <p><input name="type" value="<?= $type ?>" /></p></p>
				<p><b>Description :</b> <p><textarea name="description" rows="3" cols="30"><?= $description ?></textarea></p></p>
				<p><b>Marque :</b>      <p><input name="marque" value"<?= $marque ?>" /></p></p>
				<p><b>Prix public :</b>        <p><input name="prix_public" value="<?= $prix_public ?>"</p></p>
				<p><b>Prix achat :</b>        <p><input name="prix_achat" value="<?= $prix_achat ?>"</p></p>
				<p><b>Quantite en Stock :</b>        <p><input name="quantite" value="<?= $quantite_stock ?>"</p></p>
				<p><b>Image :</b>        <p><input name="image" value="<?= $image ?>" /></p></p></center>
				<!-- Bouton : Modifier le produit -->
				<center><input type="submit" name="ajouter" class="input_button" value="Modifier" /></center>
			</form>
			</div>
			
			<!-- Bouton : Supprimer le produit -->
			<br />
			<center>
				<a href="?page=requeteProduit&type_requete=2&id_produit=<?= $id_produit ?>">
					<center>
						<div class="button">
							<center>Supprimer</center>
						</div>
					</center>
				</a>
			</center>
			<br /><br />
<?php		
		}

		//Affiche page 1, page 2, page ... en fonction de la pagination et du nombre de produits	
		for($i = 0; $i < $nb_pages; $i++)
		{
			if($i != $num_page) {
				echo '<a href="?page=adminListProduits&npage='. $i . '">Page '. ($i+1) . '</a>&nbsp;';
			}
			else {
				echo 'Page '.($i+1).'&nbsp;';
			}	
		}
	}
?>