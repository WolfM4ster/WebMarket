<?php
	/************************************************************************/
	/* 
	    requeteProduit par Abdoullah REZGUI
		En fontion du type de la requête :
			- Ajouter produit dans panier
			- Ajouter un produit dans la table
			- Mettre à jour un produit dans la table
			- par défaut : revenir à l'acceuil 
	*/
	/************************************************************************/
	
	//Récupération des paramètres
	
	$id_client = $_SESSION['id_client'];
	$id_produit = 0;
	if(isset($_GET['id_produit']) and is_numeric($_GET['id_produit'])) {
		$id_produit	= $_GET['id_produit'];
	}
	
	$type_requete = 99;
	if(isset($_GET['type_requete']) and is_numeric($_GET['type_requete'])) {
		$type_requete = $_GET['type_requete'];
	}
	
	$option_tri = '';
	if(isset($_POST['option_tri'])) {
		$option_tri = $_POST['option_tri'];
	}

	$db = ConnexionDB::getInstance();
	
	switch($type_requete)
	{
	// 0: Ajouter produit dans panier
	case 0:
		if(!is_numeric($_POST['quantite_post'])) {
			echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL=?page=erreur&erreur=3">';
		} else {
			
			$results = $db->querySelect('SELECT quantite_stock FROM produit WHERE id_produit = ?', [$id_produit]);
			
			// Vérifier la validité des paramètres
			$quantite_stock = $results[0]['quantite_stock'];
			$quantite_post = $_POST['quantite_post'];

			if($quantite_stock < $quantite_post) {
				echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL=?page=erreur&erreur=3">';
			} else {
				//Contrôle de la validité de la quantité
				if($quantite_post <= 0) {
					echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL=?page=erreur&erreur=3">';
				} else {
					// Ajouter le produit dans le panier s'il n'existe pas
					// S'il existe on vérifie qu'on peut rajouter
					$db->execute('INSERT INTO panier 
						(`id_client`, `id_produit`, `quantite_panier`) 
						VALUES (?, ?, ?) 
						ON DUPLICATE KEY 
						UPDATE quantite_panier = quantite_panier + ?',
						[$id_client, $id_produit, $quantite_post, $quantite_post]);
										
					echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL=?page=panier&action=afficher">';
				}
			}
		}
		break;

	// 1: Ajouter un produit dans la table
	case 1:
		if($_SESSION['admin'] != 1) {
			echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL=?page=acceuil">'; 
		} else {
			//Contrôle des paramètres
			if(empty($_POST['titre']) 
				or empty($_POST['description']) 
				or empty($_POST['marque'])
				or empty($_POST['type']) 
				or empty($_POST['quantite_stock']) 
				or empty($_POST['prix_public'])) {
				echo 'Un des champs est manquant.';
				echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL=?page=erreur&erreur=6">';
			} else  {
				//Récupération des paramètres en POST
				$titre           = $_POST['titre'];
				$type            = $_POST['type'];
				$marque          = $_POST['marque']; 
				$description     = $_POST['description'];
				
				$image           = ''; 				
				if (isset($_FILES['image_file']['name'])) {
	
					$uploadDir = 'uploads/';					
					chmod($uploadDir, 0777);
					$uploadFile = $_FILES['image_file']['name'];
				
					$image = $uploadDir.basename($uploadFile);
					move_uploaded_file($_FILES['image_file']['tmp_name'], $image);
					 
				} else {
					echo 'Image du Produit manquant.';
					echo '<META HTTP-EQUIV="refresh" CONTENT="1;URL=?page=adminAjoutProduit">';
					exit;
				}

				$quantite_stock  = $_POST['quantite_stock'];
				$prix_public     = $_POST['prix_public']; 
				
				//Contrôle de la validité des variables stock, age, prix
				if($quantite_stock < 0 or $prix_public <= 0) {
					echo 'Le prix ou la quantite du stock est incorrect.';
					echo '<META HTTP-EQUIV="refresh" CONTENT="1;URL=?page=erreur&erreur=7">';
				} else {
					// Vérifier que le titre n'existe pas dans la base de données
					$results = $db->querySelect('SELECT COUNT(*) as nb_lignes FROM produit WHERE titre = ?', [$titre]);
					if($results[0]['nb_lignes'] > 0) {
						echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL=?page=erreur&erreur=5">';
					} else {
						$db->execute('INSERT INTO produit 
							(`titre`, `type`, `marque`, `image`, `quantite_stock`, `prix_public`, `description`) 
							VALUES (?, ?, ?, ?, ?, ?, ?)', 
							[$titre, $type, $marque, $image, $quantite_stock, $prix_public, $description]);
						
						echo 'Produit ajouté avec succés.';
						echo '<META HTTP-EQUIV="refresh" CONTENT="1;URL=?page=adminAjoutProduit">';
					}
				}
			}
		}
		break;

	// 2: Supprimer un produit dans la table
	case 2:
		//Contrôle des droits d'administration
		if($_SESSION['admin'] == 0) {
			echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL=?page=acceuil">';
		} else {
			$results = $db->querySelect('SELECT COUNT(*) as nb_lignes FROM panier WHERE id_produit = ?', [$id_produit]);
			if($results[0]['nb_lignes'] > 0) {
				echo 'Le produit ne peut pas être supprimé, car il est déjà présent dans un ou plusieurs paniers.';
			} else {
				$db->execute('DELETE FROM produit WHERE id_produit = ?', [$id_produit]);
				echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL=?page=adminListProduits">';
			}
		}
		break;

	// 3 Mettre à jour un produit dans la table
	case 3:
		//Contrôle des droits d'administration
		if($_SESSION['admin'] == 0) {
			echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL=?page=acceuil">';
		} else {
			
			//Contrôle des paramètres en POST
			if(empty($_POST['titre']) or empty($_POST['description']) or empty($_POST['marque']) 
				or empty($_POST['type']) or empty($_POST['quantite_stock']) or empty($_POST['image']) or empty($_POST['prix_public'])) {
				echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL=?page=erreur&erreur=6">';
			} else {
				
				//Récupération des paramètres en POST
				$titre           = $_POST['titre'];
				$type            = $_POST['type'];
				$marque          = $_POST['marque'];
				$description     = $_POST['description'];  
				$image           = $_POST['image']; 
				$prix_public     = $_POST['prix_public'];
				$quantite_stock  = $_POST['quantite_stock']; 

				//Contrôle de la validité des variables stock, age, prix
				if($quantite_stock < 0 or $prix_public < 0) {
					echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL=?page=erreur&erreur=7">';
				} else {
					$db->execute(
						'UPDATE `produit` SET `titre` = ?, `type` = ?, `marque` = ?, `image` = ?, `description`= ?, `quantite_stock` = ?, `prix_public` = ? 
						WHERE id_produit = ?', [$titre, $type, $marque, $description, $quantite_stock, $prix_public, $id_produit]);
					
					echo "Produit mis à jour avec succés.";
					echo '<META HTTP-EQUIV="refresh" CONTENT="1;URL=?page=adminListProduits">';
				}
			}
		}
		break;

	default:
		echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL=?page=acceuil">';
		break;
	}
	
?>