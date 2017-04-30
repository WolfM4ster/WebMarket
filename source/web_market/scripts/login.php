<?php
    /************************************************************************/
    /* 
            login par Abdoullah REZGUI
            - connexion du visiteur
    */
    /************************************************************************/
    
    //Contrôle des paramètres
    $login = $_POST['login'];
    $mdp   = $_POST['mdp'];
    
    $db = ConnexionDB::getInstance();
    
    $results = $db->querySelect('
        SELECT `id_client`, `nom`, `prenom`, `mdp`, `admin`, `email`, `adresse`, `tel` 
        FROM client 
        WHERE nom = ? AND mdp = ?', 
        [$login, $mdp]);    
    if(count($results) == 0) {
        echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL=?page=erreur&erreur=0">';
    } else {
        //attribution des variables session grâce à la récupération des informations de la base de données 
        $_SESSION['connecte']  = 1;
        $_SESSION['id_client'] = $results[0]['id_client'];
        $_SESSION['nom']       = $results[0]['nom'];
        $_SESSION['prenom']    = $results[0]['prenom']; 
        $_SESSION['mdp']       = $results[0]['mdp'];
        $_SESSION['admin']     = $results[0]['admin'];
        $_SESSION['adresse']   = $results[0]['adresse'];
        $_SESSION['email']     = $results[0]['email']; 
        $_SESSION['tel']       = $results[0]['tel'];
        
        echo 'Connexion en cours, veuillez patienter ...';
        
        echo '<META HTTP-EQUIV="refresh" CONTENT="1;URL=?page=acceuil">';
    }
?>