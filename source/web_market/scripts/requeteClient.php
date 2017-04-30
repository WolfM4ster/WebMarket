<?php
    /************************************************************************/
    /* 
        requeteClient par Abdoullah REZGUI
        En fontion du type de la requête :
            - Mise à jour des coordonnées
            - Mise à jour des coordonnées fait par l'administrateur
            - Supprimer un client par l'administrateur
            - Insérer un client par l'administrateur
            - Afficher la facture du client après vérification de la carte bancaire 
            - par défaut : revenir à l'acceuil 
    */
    /************************************************************************/
    
    if(!isset($_GET['type_requete']) or empty($_GET['type_requete'])) {
        echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL=?page=erreur&erreur=6">';
    } else {

        //GET        
        $type_requete = 99;
        if(is_numeric($_GET['type_requete'])) {
            $type_requete = $_GET['type_requete'];
        }

        //Session
        $id_client         = 0;
        if(isset($_SESSION['id_client']) and is_numeric($_SESSION['id_client'])) {
            $id_client = $_SESSION['id_client'];
        }
        
        $admin_session = 0;
        if(isset($_SESSION['admin']) and is_numeric($_SESSION['admin'])) {
            $admin_session = $_SESSION['admin'];
        }
            
        //POST  
        $nom_client       = $_POST['nom']; 

        $admin_client     = 0; 
        if(isset($_POST['admin'])) {
           $admin_client     = $_POST['admin']; 
        }

        $mdp_client       = 'test666'; 
        if(isset($_POST['mdp'])) {
            $mdp_client       = $_POST['mdp']; 
        }
        
        
        $prenom_client    = $_POST['prenom']; 
        $adresse_client   = $_POST['adresse']; 
        $tel_client       = $_POST['tel']; 
        $email_client     = $_POST['email']; 

        $db = ConnexionDB::getInstance();
        
        switch($type_requete)
        {
            // 0: Mise à jour des coordonnées
            case 0:
                if($_SESSION['connecte'] == 0) {
                    echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL=?page=acceuil">';
                }
                
                if($mdp_client != "") {
                    $db->execute('UPDATE client SET nom = ?, prenom = ?, adresse = ?, tel = ?, email = ? WHERE id_client = ?',
                        [$nom_client, $prenom_client, $adresse_client, $tel_client, $email_client, $id_client]);

                    $_SESSION['nom'] = $nom_client;
                    $_SESSION['prenom'] = $prenom_client;
                    $_SESSION['adresse'] = $adresse_client;
                    $_SESSION['email'] = $email_client;
                    $_SESSION['tel'] = $tel_client;
                
                    echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL=?page=coordonnee">';
                } else {
                    echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL=?page=erreur&erreur=6">';
                }
                break;
                
            // 1: Mise à jour des coordonnées fait par l'administrateur
            case 1:
                if($admin_session == 0) {
                    echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL=?page=acceuil">';
                } else {    
                    if($admin_client == "oui") {
                        $admin_client = 1;
                    } else {
                        $admin_client = 0;
                    }

                    //Récupérer l'id dans le GET
                    $id_client = $_GET['id_client'];

                    $db->execute('UPDATE client SET nom = ?, prenom = ?, adresse = ?, tel = ?, email = ?, admin = ? WHERE id_client = ?',
                        [$nom_client, $prenom_client, $adresse_client, $tel_client, $email_client, $admin_client, $id_client]);
                    
                    if(!empty($mdp_client)) {
                        $db->execute('UPDATE client SET mdp = ? WHERE id_client = ?', [$mdp_client, $id_client]);
                        echo "Mise à jour du client avec succès.";
                    } else {
                        echo "Le mot de passe est vide. Veuillez le remplir.";
                    }
                }
                break;
                
            // 2: Supprimer un client par l'administrateur
            case 2:
                if($admin_session == 0) {
                    echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL=?page=acceuil">';
                } else {               
                    
                    //Récupérer l'id dans le GET
                    $id_client = $_GET['id_client'];

                    $results = $db->querySelect('SELECT COUNT(*) as nb_lignes FROM panier WHERE id_client = ?', [$id_client]);
                    if($results[0]['nb_lignes'] > 0) {
                        echo "Le client ne peut pas être supprimé, car le panier du client n'est pas vide.";
                    } else {
                        $results = $db->querySelect('SELECT admin FROM panier WHERE id_client = ?', [$id_client]);
                        //Contrôle des droits d'administration
                        if($results[0]['admin'] == 1) {
                            $results = $db->querySelect("SELECT COUNT(*) as nb_lignes FROM client WHERE admin = 1");
                            //Contrôle de l'unicité de client-administrateur
                            if($results[0]['nb_lignes'] > 1) {
                                $db->execute('DELETE FROM client WHERE id_client = ?', [$id_client]);
                                echo "Le client-administrateur supprimé avec succes.";
                            } else {
                                echo "Le client ne peut pas être supprimé, car il n'est que le seul administrateur du site.";   
                            }
                        } else {
                            $db->execute('DELETE FROM client WHERE id_client = ?', [$id_client]);
                            echo "Le client supprimé avec succes.";
                        }
                    }
                }
                break;
                
            // 3: Insérer un client par l'administrateur
            case 3:
                if(isset($_SESSION['connecte']) and $_SESSION['connecte'] == 1) {
                    echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL=?page=acceuil">';
                } else {
                    //Contrôle des paramètres
                    if(empty($nom_client) or empty($mdp_client) or empty($prenom_client)
                        or empty($adresse_client) or empty($tel_client) or empty($email_client)) {
                        echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL=?page=erreur&erreur=1">';
                    } else {
                        $results = $db->querySelect('SELECT COUNT(*) as nb_lignes FROM client WHERE nom = ? AND prenom = ? OR email = ?', 
                            [$nom_client, $prenom_client, $email_client]);
                        
                        if($results[0]['nb_lignes'] == 0) {
                            $db->execute('INSERT INTO client 
                            (`nom`, `prenom`, `admin`, `mdp`, `adresse`, `tel`, `email`)  
                            VALUES (?, ?, ?, ?, ?, ?, ?)', 
                            [$nom_client, $prenom_client, 0, $mdp_client, $adresse_client, $tel_client, $email_client]);
                            echo 'Votre compte a bien été enregistré, vous pouvez vous connecter.';
                        } else {
                            echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL=?page=erreur&erreur=2">';
                        }
                    }
                }
                break;
                
            // 4: Afficher la facture du client après vérification de la carte bancaire 
            //FIXME !!! UTILISER LA TABLE FACTURE
            // 
            case 4:
                /*
                if($_SESSION['connecte'] == 0) {
                    echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL=?page=acceuil">';
                } else {
                    if($_POST['cb'] == "") {
                        echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL=?page=erreur&erreur=10">';
                    } else {
                        $results = $db->querySelect('SELECT * FROM panier WHERE id_client = ', [$id_client]);
                        
                        $nb_results = count($results);
                        if($nb_results == 0) {
                            echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"0;URL=?page=erreur&erreur=8\">";
                        } else {
                        
                            $db2 = ConnexionDB::getInstance();
                            
                            $nb_produit = $db->nbResult();
                
                            for($i = 0; $i < $nb_produit; $i++)
                            {
                                $id_produit = $db->getValue($i, 1);
                                $db2->querySelect("SELECT * FROM produit WHERE id_produit = '".$id_produit . "'");
                                $quantite_voulue = $db->getValue($i, 2);
                    
                                if($quantite_voulue > $db2->getValue(0, 5))
                                    echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"0;URL=?page=erreur&erreur=9\">";       
                            }
                
                            //Récupération des variables de session
                            $nom = $_SESSION['nom'];    
                            $prenom = $_SESSION['prenom'];  
                            $adresse = $_SESSION['adresse'];    
                            $prix_HT = 0;
                            echo "Vous avez acheté ".$nb_produit . " produits.<br />";
                            echo "<div align=\"left\">Récapitulatif:<br />";
                            echo "<b>Nom</b>: ".$nom . "<br />";
                            echo "<b>Prénom</b>: ".$prenom . "<br />";
                            echo "<b>Adresse</b>: ".$adresse . "<br />";
                            echo "<b>Nombre de produits achetés</b>: ". $nb_produit . "<br />";
                
                            for($i = 0; $i < $db->nbResult(); $i++)
                            {
                                $id_produit = $db->getValue($i, 1);
                                $db2->querySelect("SELECT * FROM produit WHERE id_Produit = ". $id_produit);
                                $prix = $db2->getValue(0, 6);
                                $stock = $db->getValue($i, 2);
                                
                                echo "<b>Produit ".($i+1) . "</b>:";
                                echo "<dd><b>Référence</b>: ".$id_produit . "<br>";
                                echo "<dd><b>Prix unitaire</b>: ".$prix . " euros<br>";
                                echo "<dd><b>Quantité</b>: ".$stock . "<br>";
                                
                                $prix_HT += $prix * $stock;

                                // On met à jour les stock
                                $nouveau_stock = $db2->getValue(0, 5) - $stock;
                                $db2->execute("UPDATE Produit SET STOCK_PRODUIT = ".$nouveau_stock ." WHERE ID_PRODUIT= '".$id_produit . "'");
                            }
                            echo "<b>TVA</b>: 19.6%<br />";
                            
                            //arrondi au centième
                            $prix_TTC = $prix_HT * 1.196 / 100;
                            $prix_TTC = $prix_TTC * 100.0 / 100.0;
                            
                            echo "<b>Prix total TTC</b>: ".$prix_TTC . " euros<br /></div>";
                        }
                    }
                }
                */
                break;

            default:
                echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL=?page=acceuil">';
                break;
        }
    }
?>