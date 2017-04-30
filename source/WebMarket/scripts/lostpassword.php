<?php
/************************************************************************/
/* 
        lostpassword par Abdoullah REZGUI
        - demande du login et du mail afin d'envoyer le login et le mot de passe perdu dans le mail
*/
/************************************************************************/

?>

<!-- Demande de saisie du login et du mail à envoyé -->
<form name="lostpassword" style="margin-left:4px" action="?page=sendPassword" method="post">
	Nom (nom d'utilisateur aussi) : <br /> 
	<input type="text" name="nom" class="input_text" id="input_text_menu" /> <br /> 
	E-Mail : <br /> 
	<input type="text" name="mail" class="input_text" id="input_text_menu" /> <br /> 
	<!-- Bouton : Valider le login et l'email -->
	<input type="submit" name="valider" class="input_button" value="valider" /> <br /> 
</form> 
