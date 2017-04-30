<?php
    /************************************************************************/
    /* 
            insertCompte par Abdoullah REZGUI
            - Insère un nouveau client dans la base de données
    */
    /************************************************************************/

    $nom_client = $_POST['nom']; 
    $prenom_client = $_POST['prenom']; 
    $mdp_client = $_POST['password']; 
    $adresse_client = $_POST['adresse']; 
    $tel_client = $_POST['tel']; 
    $email_client = $_POST['email']; 

    //Contrôle des paramètres
    if($nom_client == "" || $mdp_client == "" || $prenom_client == "" 
        || $adresse_client == "" || $telephone_client == "" || $email_client == "") {
        echo '<META HTTP-EQUIV="refresh" CONTENT="1;URL=?page=erreur&erreur=1"';
    }
    else {
        $db = ConnexionDB::getInstance();
        
        $results = $db->querySelect('SELECT COUNT(*) as nb_lignes FROM client WHERE nom = ? AND prenom = ? OR email = ?', 
                    [$nom_client, $prenom_client, $email_client]);

        //voir si ce compte n'est pas déjà enter
        if($results[0]['nb_lignes'] == 0) {
            $db->execute('INSERT INTO client (`nom`, `prenom`, `mdp`, `admin`, `email`, `adresse`, `tel`) 
                VALUES(?, ?, ?, ?, ?, ?, ?)', 
                [$nom_client, $prenom_client, $mdp_client, 0, $email_client, $adresse_client, $tel_client]);
            
            echo '<META HTTP-EQUIV="refresh" CONTENT="1;URL=?page=acceuil">';
        } else {
            echo '<META HTTP-EQUIV="refresh" CONTENT="1;URL=?page=erreur&erreur=2">';
        }
    }
?>