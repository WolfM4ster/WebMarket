<?php
	/************************************************************************/
	/* 
	        index par Abdoullah REZGUI
	        - Affiche le site et la page qui lui est passé en paramètre (par défaut : acceuil)
	        - Correction du problème de sécurité des scripts de php mis en paramètre
	*/
	/************************************************************************/
	
	session_start();
	
	header('Content-Type: text/html; charset=ISO-8859-1'); // écrase l'entête utf-8 envoyé par php
	ini_set( 'default_charset', 'ISO-8859-1' );

	require_once("./lib/require_all.php");
	
	/********************************************************************* Démarrage de la session ***********************************************************************/
	
	//paramètre de la page de rendu
	$page_print = './'.PATH::$PATH_scripts.'acceuil';
	if(isset($_GET['page']) and !empty($_GET['page'])) {
		$page_print = $_GET['page'];
	}
	
	//Correction du problème de sécurité des scripts de php mis en paramètre
	$page_print = str_replace('/', '', $page_print); 
	$page_print .= '.php';
	
	$page_print = './'.PATH::$PATH_scripts.$page_print;
	
	if (!file_exists($page_print)) {
		$page_print = './'.PATH::$PATH_scripts.'acceuil.php';
	}
	
	//paramètre du tri par défaut
	$default_sort = 'prix_public';
	if(isset($_GET['default_sort']) and !empty($_GET['default_sort'])) {
		$default_sort = $_GET['default_sort'];	
	}
	
	$file_css = 'site.css';

	/*********************** Début du site *******************************************/	

	echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> ';
	echo '<html xmlns="http://www.w3.org/1999/xhtml"> ';
	echo '	<head> ';
	echo '		<meta content="text/html; charset=ISO-8859-1" http-equiv="content-type" /> ';
	echo '      <title>Web marchand</title>';
	echo '		<link href="'. $file_css .'" rel="stylesheet" type="text/css" /> ';
	echo '		<meta name="keywords" content="leirbag, beau, fort" /> ';
	echo '		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> ';	
	echo '	</head> ';
	echo '	<body> ';
	echo '  <center><div>';
	echo '		<center><div class="main_Body"> ';
	//echo '			<div class="header"></div>';
	
	/*********************** Menu du site *******************************************/

	//Sous_Menu Login
	$vue_login = '<div class="sous_Menu">
				<div class="tite_Menu">Espace client</div>
				<a href="?page=acceuil"><center><div class="button"><center>Acceuil</center></div></center></a> <br />
				<form name="identification" style="margin-left:4px" action="?page=login" method="post">
				Nom d\'utilisateur : <br />
			    <input type="text" name="login" class="input_text" /> <br />
				Mot de passe : <br />
				<input type="password" name="mdp" class="input_text" /> <br />
				<center><input type="submit" name="connexion" class="input_button" value="Connexion" /></center> <br />
				</form>
				<a href="?page=enregistrer" style="margin-left:4px">S\'enregistrer</a> <br />
				<a href="?page=lostpassword" style="margin-left:4px">Mot de passe oublié ?</a> <br /> <br />
				</div>';
	
	//Sous_Menu Client
	$vue_client = '<div class="sous_Menu">
				<div class="tite_Menu">Espace Client</div>
				<a href="?page=acceuil"><center><div class="button"><center>Acceuil</center></div></center></a> <br />
				<a href="?page=coordonnee"><center><div class="button"><center>Coordonnées</center></div></center></a> <br />
				<a href="?page=panier&action=afficher"><center><div class="button"><center>Panier</center></div></center></a> <br />
				<a href="?page=facture&action=afficher"><center><div class="button"><center>Liste des factures</center></div></center></a> <br />
				<a href="?page=unlogin"><center><div class="button"><center>Déconnexion</center></div></center></a> <br />
				</div>';
	
	//Sous_Menu Administrateur
	$vue_admin = '	<div class="sous_Menu">
				<div class="tite_Menu">Espace Admin</div>
				<a href="?page=adminClient"><center><div class="button"><center>Client</center></div></center></a> <br />
				<a href="?page=adminAjoutProduit"><center><div class="button"><center>Ajout Produit</center></div></center></a> <br />
				<a href="?page=adminListProduits&npage=0"><center><div class="button"><center>Liste des Produits</center></div></center></a> <br />				
				</div>';
	
	
	$db = ConnexionDB::getInstance();

	$results = $db->querySelect('SELECT type FROM produit GROUP BY type');
	$nbResults = count($results);

	//Sous_Menu Produit
	$vue_produit = '<div class="sous_Menu">
				<div class="tite_Menu">Espace Produit</div>
				<a href="?page=produit&categorie=&default_sort='. $default_sort .'&npage=0"><center><div class="button"><center>Tous</center></div></center></a> <br />';
		
	for($i = 0; $i < $nbResults; $i++) {
		$vue_produit .= '<a href="?page=produit&categorie='. $results[$i]['type'].'&default_sort='. $default_sort .'&npage=0"><center><div class="button"><center>'. $results[$i]['type'] .'</center></div></center></a> <br />';
	}
	
	$vue_produit .= '</div>';
	
	echo '<div id="menu">';		
	
	//Contrôle du login
	if(isset($_SESSION['connecte']) && $_SESSION['connecte'] == 1) {
			//Contrôle des droits d'administration	
			if($_SESSION['admin'] == 1) {
				echo $vue_admin;
			}
				
			echo $vue_client;
			echo $vue_produit;
	} else {
		echo $vue_login;
		echo $vue_produit;
	}
	echo '</div>';
	
	/*************************** Rendu de la page mis en paramètre ***************************************/

	echo '			<div class="corps">';
		require_once($page_print);
	echo '			</div>';

	/************************************* Fin de la page *************************************************/

	echo '		</div></center> ';
	echo '		</div></center> ';
	echo '	</body> ';
	echo '</html> ';
?>