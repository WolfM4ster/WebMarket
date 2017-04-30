<?php
    /************************************************************************/
    /* 
            sendPassword par Abdoullah REZGUI
            - envoi le mot de passe et le login à l'adresse mail 
            (l'envoi ne marche pas car il necessite le serveur smtp)
    */
    /************************************************************************/

    //Contrôle des paramètres
    if(!isset($_POST['nom']) or empty($_POST['nom']) or !isset($_POST['mail']) or empty($_POST['mail'])) {
        echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL=?page=erreur&erreur=6">';
    } else {

        $nom_client = $_POST['nom']; 
        $mail = $_POST['mail']; 

        $db = ConnexionDB::getInstance();
        
        $results = $db->querySelect('SELECT mdp, nom, email FROM client WHERE nom = ? AND email = ?', [$nom_client, $mail]);

        if(count($results) == 0) {
            echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL=?page=erreur&erreur=2">';
        } else {
            $headers = 'From: "gigaprice" <contact@gigaprice.com>'."\n";
            $headers .= 'Content-Type: text/plain; charset="iso-8859-1"'."\n";
            $headers .= 'Content-Transfer-Encoding: 8bit';

            //On utilise la fonction smtpmailer au lieu de mail de PHP
            $to = $results[0]['email'];
            $from = 'rabdou500347@gmail.com';
            $from_name = 'Admin du site web marchand';
            $subject = 'Oubli de mot de passe';
            $body = "Voici votre login et mot de passe : 
             - login : ". $results[0]['nom'] ." 
             - mode de passe : ". $results[0]['mdp'] ."
             
             Cordialement.
             L'équipe WebMarchand.";

            $estEnvoye = smtpmailer($to, $from, $from_name, $subject, $body);

            /*
            $estEnvoye = mail($results[0]['email'], 'Mot de passe perdu', "Voici votre login et mot de passe : 
             - login : ". $results[0]['nom'] ." 
             - mode de passe : ". $results[0]['mdp'] ."
             
             Cordialement.
             L'équipe WebMarchant.", $headers);
            */

            if($estEnvoye) {
                echo 'Le message a bien été envoyé';
            } else {
                echo 'Le message n\'a pu être envoyé car le serveur SMTP n\'est pas configuré.';
            }
        }
    }
?>