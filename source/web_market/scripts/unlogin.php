<?php
	/************************************************************************/
	/* 
	        unlogin par Abdoullah REZGUI
	        - Suppression de la session ("d�connecter")		
	*/
	/************************************************************************/
?>

<p>D�connexion en cours, veuillez patienter ...</p>
	
<?php
	session_destroy(); //d�truire la session utilisateur si celle-ci existe	
?>

<META HTTP-EQUIV="refresh" CONTENT="1;URL=?page=acceuil">