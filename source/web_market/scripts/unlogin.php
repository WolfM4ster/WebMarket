<?php
	/************************************************************************/
	/* 
	        unlogin par Abdoullah REZGUI
	        - Suppression de la session ("déconnecter")		
	*/
	/************************************************************************/
?>

<p>Déconnexion en cours, veuillez patienter ...</p>
	
<?php
	session_destroy(); //détruire la session utilisateur si celle-ci existe	
?>

<META HTTP-EQUIV="refresh" CONTENT="1;URL=?page=acceuil">