<?php
    /************************************************************************/
    /* 
             coordonnee par Abdoullah REZGUI
             - Affiche les informations du visiteur connect�
             - le visiteur connect� peut modifier ses coordonn�es   
    */
    /************************************************************************/
    
    //Contr�le du login
    if(!isset($_SESSION['connecte']) or $_SESSION['connecte'] == 0) {
?>      

<!-- vous devez vous logger -->
<META HTTP-EQUIV="refresh" CONTENT="0;URL=?page=erreur&erreur=0">

<?php
    }
    else 
    {   
        //R�cup�ration des variables de session
        $nom       = $_SESSION['nom'];
        $prenom    = $_SESSION['prenom'];
        $password  = $_SESSION['mdp'];
        $adresse   = $_SESSION['adresse'];
        $email     = $_SESSION['email'];
        $tel       = $_SESSION['tel'];
?>

<!-- Afficher les informations sur le client --> 
<br /><br /><br />
<div align="center">
    <form name="coordonnee" action="?page=requeteClient&type_requete=0" method="post">        
        <table align="center">
            <tr>        
                <td>Nom (nom d'utilisateur aussi) :</td>
                <td><input type="text" name="nom" class="input_text" id="input_text_menu" value="<?= $nom ?>" /></td>
            </tr>
            <tr>        
                <td>Mot de passe (<b>Attention : l'ancien sera effac�</b>) :</td>
                <td><input type="text" name="password" class="input_text" id="input_text_menu" value="<?= $password ?>" /></td>
            </tr>
            <tr>
                <td>Pr�nom :</td>
                <td><input type="text" name="prenom" class="input_text" id="input_text_menu" value="<?= $prenom ?>" /></td>
            </tr>
            <tr>
                <td>Adresse :</td>
                <td><input type="text" name="adresse" class="input_text" id="input_text_menu" value="<?= $adresse ?>" /></td>
            </tr>
            <tr>
                <td>Num�ro de t�l�phone :</td>
                <td><input type="text" name="tel" class="input_text" id="input_text_menu" value="<?= $tel ?>" /></td>
            </tr>
            <tr>
                <td>E-Mail :</td>
                <td><input type="text" name="email" class="input_text" id="input_text_menu" value="<?= $email ?>" /></td>    
            </tr>
        </table>
        
        <!-- Bouton : Envoyer les changements effectu�s --> 
        <center><input type="submit" name="valider" class="input_button" value="Envoyer" /></center> <br />
    </form>
</div>
<?php
    }
?>