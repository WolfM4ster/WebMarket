<?php
    /************************************************************************/
    /* 
            admin_produit par Abdoullah REZGUI
            - Affiche toutes les informations sur les produits pr�sents dans la base de donn�es
            - l'administrateur peut modifier ou supprimer les produits pr�sents dans le base de donn�es
            Note : les produits sont pagin�s de 5 en 5
    */
    /************************************************************************/
    
    //Contr�le du droit d'administration
    if(!isset($_SESSION['admin']) or $_SESSION['admin'] == 0) {
        echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL=?page=acceuil">';
    } else {        
?>
<br /><br />
<!-- Ajouter un produit -->
<div align="center"> <center><b>AJOUT D'UN PRODUIT</b><br /><br />
<form action="?page=requeteProduit&type_requete=1" method="post" enctype="multipart/form-data">
    <p><b>Titre</b> : <p><input name="titre" /></p></p>
    <p><b>Description:</b> <p><textarea name="description" rows="3" cols="30"></textarea></p></p>
    <p><b>Marque</b> : <p><input type="text" name="marque" /></p></p>
    <p><b>Type</b> : <p><input type="text" name="type" /></p></p>
    <p><b>Image</b> : <p><p><input type="file" name="image_file" /></p></p>  
    <p><b>Stock</b> : <p><input type="text" name="quantite_stock" /></p></p>
    <p><b>Prix</b> : <p><input type="text" name="prix_public" /></p></p>
    <center><input type="submit" name="ajouter" class="input_button" value="Ajouter" /> </center>
</form>
</div>

<?php
    }
?>