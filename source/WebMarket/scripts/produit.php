<?php
	/************************************************************************/
	/* 
	        produit par Abdoullah REZGUI
			- Affiche les produits en fonction de la catégorie, des caractéristiques des produits
			- Gestion de la pagination de produits par 5 articles par page
	*/
	/************************************************************************/
	
	/*************** Début de la Définition de la fonction afficherProduit ********************/
	//Définition de la fonction afficherProduit (le tri se fait dans la requête grâce à ORDER BY)
	function afficherProduit($categorie, $tri, $prix_min, $prix_max, $num_page) {

		$db = ConnexionDB::getInstance();
		$results = null;

		$sql = 'SELECT `id_produit`, `titre`, `type`, `marque`, `image`, `description`, `quantite_stock`, `prix_public`, `prix_achat` FROM produit ';
		//Contôle de la catégorie
		if(empty($categorie)) {
			if(empty($tri)) {
				$results = $db->querySelect($sql);
			}
			else {
				$results = $db->querySelect($sql.' WHERE prix_public > ? AND prix_public < ? ORDER BY ?', [$prix_min, $prix_max, $tri]);
			}
		}
		else
		{
			if(empty($tri)) {
				$results = $db->querySelect($sql.' WHERE type = ?', [$categorie]);
			}
			else {
				$results = $db->querySelect($sql.' WHERE type = ? AND prix_public > ? AND prix_public < ? ORDER BY ?', [$categorie, $prix_min, $prix_max, $tri]);
			}
		}
		
		$nb_total_produits = count($results);
		if($nb_total_produits == 0) {
			echo "Aucun produit de ce type n'est disponible";
		} else {
		
			//Début de l'Algorithme de pagination de  5 articles par page
			$debut = 0;			
			$nb_page = 1;
			if(($nb_total_produits % 5) == 0) {
				$nb_page = $nb_total_produits / 5;
				$debut = $num_page * 5;
			}
			else 
			{
				$nb_page = $nb_total_produits / 5;
				$debut = $num_page * 5;
			}
				
			$fin   = $debut + 5;
			if($fin > $nb_total_produits) {
				$fin = $nb_total_produits;
			}
				
			if($nb_page < 1) {
				$nb_page = 1;
			}
			//fin  de l'Algorithme de pagination
		
			//Haut de page
			//Affiche page 1, page 2, page ... en fonction de la pagination et du nombre de produits	
			for($i = 0; $i < $nb_page; $i++)
			{
				if($i != $num_page) {
					echo "<a href=\"?page=produit&categorie=". $categorie ."&default_sort=". $tri ."&npage=". $i ."&action=afficher\">Page ".($i+1)."</a>&nbsp;";
				}
				else {
					echo "Page ".($i+1)."&nbsp;";
				}
				
			}
			
			echo "<br /><br />";
			
			//Récupération des informations sur les produits dans la base de données en fonction de la pagination
			for($i = $debut; $i < $fin; $i++) {
				$id_produit  = $results[$i]['id_produit'];
				$titre       = $results[$i]['titre'];
				$type        = $results[$i]['type'];
				$marque      = $results[$i]['marque'];
				$image       = $results[$i]['image'];
				$quantite_stock    = $results[$i]['quantite_stock'];
				$prix_public = $results[$i]['prix_public'];
				$prix_achat  = $results[$i]['prix_achat'];
				$description = $results[$i]['description'];
				
				
				//Affiche les informations du produit
				echo "<div id=\"produit\">";
				echo "	<center><div align=\"center\" class=\"image_produit\">";	
				echo " 	<img src='". $image ."' height='100%' width='120' />";			
				echo "	</div></center>";
				echo "	<div><b>Titre:</b>  ". $titre ."</div>";
				echo "	<b>Description:</b> ". $description ." <br />";
				echo "	<b>Marque:</b>      ". $marque ." <br />";
				echo "	<b>Prix:</b>        ". $prix_public ." Euros<br />";
				echo "	<b>Stock:</b>       ". $quantite_stock ." <br /><br />";
				echo "</div>";
				
				//Contrôle du login	
				if(isset($_SESSION['connecte']) and $_SESSION['connecte'] == 1)
				{
					//Contrôle du stock
					if($quantite_stock > 0) {
						echo "<center><form action=\"?page=requeteProduit&type_requete=0&id_produit=". $id_produit . "\" method=\"post\"><img src=\"panier.jpg\" />Quantité voulue : <input name=\"quantite_post\" value=\"1\" /><input type=\"submit\" name=\"ajouter\" class=\"input_button\" value=\"Ajouter\" /> </form></center>";
					}
					else {
						echo "<center><img src=\"panier.jpg\" /><a href=\"#\"><span style=\"color:#2B3E68\">Plus en stock</span></a></center>";
					}
				}
				else {
					echo "<center><img src=\"panier.jpg\" /><a href=\"?page=acceuil\"><span style=\"color:#2B3E68\">Vous n'êtes pas loggué</span></a></center>";
				}
			}
?>			
	<br /><br />
	
	<!-- Demande saisie pour le tri des produits --> 	
	<form action="?page=produit&categorie="<?= $categorie ?>&action=Trier&default_sort=<?= $tri ?>" method="post">
		<center>Trier par 
		<select name=\"option_tri\">
	        <option value="prix_public">Prix</option>
	        <option value="quantite_stock">Stock</option>
		</select></center>
	    <br />
	    Prix min: <input value="0" type="number" name="prix_min" class="input_text" /> <br />
	    Prix max: <input value="1000" type="number" name="prix_max" class="input_text" /> <br />
		<input type="submit" name="valider" class="input_button" value="Trier" />
	</form>
	
	<br /><br />
<?php
			//Bas de page
			//Affiche page 1, page 2, page ... en fonction de la pagination et du nombre de produits	
			for($i = 0; $i < $nb_page; $i++) {
				if($i != $num_page) {
					echo '<a href="?page=produit&categorie='. $categorie .'&default_sort='. $tri .'&npage='. $i .'&action=afficher">Page '.($i+1).'</a>&nbsp;';
				}
				else {
					echo 'Page '.($i+1).'&nbsp;';
				}
				
			}
		}
	}
	/*************** Fin de la Définition de la fonction afficherProduit ********************/
?>


<?php
	//Récupération des paramètres
	$action = "default";
	if(isset($_GET['action']) and !empty($_GET['action']))
	{
		$action  = $_GET['action'];
	}
	
	$categorie = "";
	if(isset($_GET['categorie']) and !empty($_GET['categorie']))
	{
		$categorie = $_GET['categorie'];
	}
	
	//paramètre du tri par défaut
	$default_sort = "prix_public";
	if(isset($_GET['default_sort']) and !empty($_GET['default_sort']))
	{
		$default_sort = $_GET['default_sort'];
	}

	$npage = 0;
	if(isset($_GET['npage']) and !empty($_GET['npage']))
	{
		$npage = $_GET['npage'];		
	}	

	//Contrôle de l'action
	if($action == "Trier")
	{
		$option_tri    = $_POST['option_tri'];
		
		$prix_min       = $_POST['prix_min'];
		$prix_max       = $_POST['prix_max']; 
		
		afficherProduit($categorie, $option_tri, $prix_min, $prix_max, $npage);
	}
	else {
		afficherProduit($categorie, $default_sort, 0, 1000000, $npage);
	}
?>