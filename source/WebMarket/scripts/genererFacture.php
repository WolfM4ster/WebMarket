<?php
    /************************************************************************/
    /* 
        genererFacture par Abdoullah REZGUI
        
        - Génère la facture avec la librairie fpdf et on le stocke
        dans une dossier client
        - Met à jour les stocks
        - Créer la facture et les lignes factures
        - Supprime les lignes du panier en cours
    */
    /************************************************************************/
    
  date_default_timezone_set('Europe/Paris');

  $db = ConnexionDB::getInstance();

  $id_client = $_SESSION['id_client'];
  
  $dossier_client = './factures/client_' . $id_client;

  if (!file_exists ( $dossier_client ) && !mkdir($dossier_client, 0777, true)) {
    die('Echec lors de la création du répertoire client...');
  }

  $timestamp = time();

  $results = $db->querySelect('
    SELECT pa.`quantite_panier`, 
    pa.`id_produit`, pro.`prix_public` 
    FROM panier pa, produit pro  
    WHERE pa.id_produit = pro.id_produit AND pa.id_client = ?', [$id_client]);

  $nb_results = count($results);

  if($nb_results == 0) {
    echo 'Panier Vide. Pas de génération de facture';
    exit;
  }


  //Création de la facture
  $db->execute('INSERT INTO facture (`id_client`, `date_creation`) 
              VALUES(?, ?)', 
              [$id_client, $timestamp]);

  $id_facture = $db->lastInsertId();


  $total_ttc = 0;

  for($i = 0; $i < $nb_results; $i++) {
    
    $id_produit         = $results[$i]['id_produit'];
    $quantite_panier    = $results[$i]['quantite_panier'];
    $prix_public_unitaire = $results[$i]['prix_public'];

    $total_ttc += $prix_public_unitaire * $quantite_panier * 1.2;

    //On ajoute la ligne facture
    $db->execute('INSERT INTO ligne_facture (`id_facture`, `id_produit`, `quantite`, `prix_unitaire`, `prix_ht`, `prix_ttc`) 
              VALUES(?, ?, ?, ?, ?, ?)', 
              [$id_facture, $id_produit, $quantite_panier, 
              $prix_public_unitaire, $prix_public_unitaire * $quantite_panier, 
              $prix_public_unitaire * $quantite_panier * 1.2]);

    //On supprime la ligne produit dans le panier
    $db->execute('DELETE FROM panier WHERE id_client = ? AND id_produit = ?', 
              [$id_client, $id_produit]);   

    //On met à jour le stock de produit
    $db->execute('UPDATE produit 
                SET quantite_stock = quantite_stock - ? WHERE id_produit = ?', 
              [$quantite_panier, $id_produit]);
  }

  //Mettre à jour les totaux dans la table facture
  $db->execute('UPDATE facture SET total_ht = ?, total_ttc = ? WHERE id_facture = ?', 
              [$total_ttc * 0.8, $total_ttc, $id_facture]);    

  //Récupération des lignes factures
  $results = $db->querySelect('
    SELECT lf.`id_produit`, lf.`quantite`, 
           lf.`prix_unitaire`, lf.`prix_ht`, lf.`prix_ttc`,
           pro.`titre`
    FROM ligne_facture lf, produit pro 
    WHERE lf.id_produit = pro.id_produit AND lf.id_facture = ?', [$id_facture]);

  $nb_results = count($results);


  $pdf = new PDF_Invoice( 'P', 'mm', 'A4' );
  $pdf->AddPage();
  $pdf->addSociete( "MaSociete",
                    "MonAdresse\n" .
                    "75000 PARIS\n".
                    "R.C.S. PARIS B 000 000 007\n" .
                    "Capital : 18000 " . EURO );
  $pdf->addDate( date('d/m/Y', $timestamp));
  $pdf->addClient("CL" . $id_client);
  $pdf->addPageNumber("1");
 
  $pdf->addClientAdresse($_SESSION['nom']."\n".
                        $_SESSION['prenom']."\n".
                        $_SESSION['adresse']);
  $pdf->addReglement("Chèque à réception de facture");
  //Date d'échéance dans 30 jours à la date de la facture
  $pdf->addEcheance(date('d/m/Y', $timestamp + 60 * 60 * 24 * 30 )); 
  //$pdf->addNumTVA("FR888777666");
  $cols=array( "REFERENCE"    => 23,
               "DESIGNATION"  => 78,
               "QUANTITE"     => 22,
               "P.U. HT"      => 26,
               "MONTANT H.T." => 30,
               "TVA"          => 11 );
  $pdf->addCols( $cols);
  $cols=array( "REFERENCE"    => "L",
               "DESIGNATION"  => "L",
               "QUANTITE"     => "C",
               "P.U. HT"      => "R",
               "MONTANT H.T." => "R",
               "TVA"          => "C" );
  $pdf->addLineFormat( $cols);
  $pdf->addLineFormat($cols);

  $y    = 109;

  $tot_prods = [];

  for($i = 0; $i < $nb_results; $i++) {
        
      $id_produit         = $results[$i]['id_produit'];
      $quantite         = $results[$i]['quantite'];
      $prix_unitaire         = $results[$i]['prix_unitaire'];
      $prix_ht         = $results[$i]['prix_ht'];
      $prix_ttc         = $results[$i]['prix_ttc'];
      $titre         = $results[$i]['titre'];

      $line = array( "REFERENCE"    => "REF" . $id_produit,
                     "DESIGNATION"  => $titre,
                     "QUANTITE"     => $quantite,
                     "P.U. HT"      => $prix_unitaire,
                     "MONTANT H.T." => $prix_ht,
                     "TVA"          => "1" );
      $size = $pdf->addLine( $y, $line );
      $y   += $size + 2;

      $tot_prods[] = array ( "px_unit" => $prix_unitaire, "qte" => $quantite, "tva" => 1 );
  
  }

  $pdf->addCadreTVAs();
          
  // invoice = array( "px_unit" => value,
  //                  "qte"     => qte,
  //                  "tva"     => code_tva );
  // tab_tva = array( "1"       => 19.6,
  //                  "2"       => 5.5, ... );
  // params  = array( "RemiseGlobale" => [0|1],
  //                      "remise_tva"     => [1|2...],  // {la remise s'applique sur ce code TVA}
  //                      "remise"         => value,     // {montant de la remise}
  //                      "remise_percent" => percent,   // {pourcentage de remise sur ce montant de TVA}
  //                  "FraisPort"     => [0|1],
  //                      "portTTC"        => value,     // montant des frais de ports TTC
  //                                                     // par defaut la TVA = 19.6 %
  //                      "portHT"         => value,     // montant des frais de ports HT
  //                      "portTVA"        => tva_value, // valeur de la TVA a appliquer sur le montant HT
  //                  "AccompteExige" => [0|1],
  //                      "accompte"         => value    // montant de l'acompte (TTC)
  //                      "accompte_percent" => percent  // pourcentage d'acompte (TTC)
  //                  "Remarque" => "texte"              // texte
 
  $tab_tva = array( "1"       => 20,
                    "2"       => 5.5);
$params  = array( "RemiseGlobale" => 0,
                      "remise_tva"     => 1,       // {la remise s'applique sur ce code TVA}
                      "remise"         => 0,       // {montant de la remise}
                      "remise_percent" => 10,      // {pourcentage de remise sur ce montant de TVA}
                  "FraisPort"     => 0,
                      "portTTC"        => 0,      // montant des frais de ports TTC
                                                   // par defaut la TVA = 19.6 %
                      "portHT"         => 0,       // montant des frais de ports HT
                      "portTVA"        => 19.6,    // valeur de la TVA a appliquer sur le montant HT
                  "AccompteExige" => 0,
                      "accompte"         => 0,     // montant de l'acompte (TTC)
                      "accompte_percent" => 15,    // pourcentage d'acompte (TTC)
                  "Remarque" => "" );

  $pdf->addTVAs( $params, $tab_tva, $tot_prods);
  $pdf->addCadreEurosFrancs();

  $fichier_facture = $dossier_client . '/fact_' . $id_facture . '.pdf';

  $pdf->Output('F', $fichier_facture);

  echo 'La facture a bien été générée. <br />
  Voici la facture : <a href="' . $fichier_facture . '">Facture ' . $id_facture . '</a>';

?>
