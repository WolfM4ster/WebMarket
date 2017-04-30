<?php
	/************************************************************************/
	/* 
	        admin_client par Abdoullah REZGUI
	        - Affiche toutes les informations sur les clients présents dans la base de données
	        - l'administrateur peut modifier ou supprimer les clients présents dans le base de données 	  		
	*/
	/************************************************************************/
	
	//Contrôle du droit d'administration
	if($_SESSION['admin'] == 0) {
		echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"0;URL=?page=acceuil\">";
	} else {
		$db = ConnexionDB::getInstance();
		
		$results = $db->querySelect('SELECT id_client, nom, prenom, mdp, admin, email, adresse, tel FROM client');
		$nbResults = count($results);

		echo "<br /><br />";
		//Récupération des informations sur le client dans la base de données
		for($i = 0; $i < $nbResults; $i++)
		{
			
			$id_client = $results[$i]['id_client'];
			$nom = $results[$i]['nom'];
			$prenom = $results[$i]['prenom'];
			$mdp = $results[$i]['mdp'];
			$admin_client = $results[$i]['admin'];
			$email = $results[$i]['email'];
			$adresse = $results[$i]['adresse'];
			$tel = $results[$i]['tel'];
			

			if($admin_client == 1) {
				$admin_client = "oui";
			} else {
				$admin_client = "non";
			}
			
			//Affiche les informations du client
			echo "<div id=\"client\">";
			echo "	<form action=\"?page=requeteClient&type_requete=1&id_client=". $id_client  ."\" method=\"post\">";
			
			
			
			echo '<table align="center">';
			
			echo '<tr>';
			
			echo "<td><b>ID :</b></td>
				  <td>". $id_client ."</td>";
			
			echo '</tr>';

			echo '<tr>';
			
			echo "<td><b>Nom :</b></td>
				  <td><input name=\"nom\" value='". $nom . "' /></td>";

			echo '</tr>';
			echo '<tr>';

			echo "<td><b>Prénom :</b></td>
				  <td><input name=\"prenom\" value='". $prenom . "' /></td>";
			
			echo '</tr>';
			echo '<tr>';
			
			echo "<td><b>Mot de passe :</b></td>
				  <td><input name=\"mdp\" value='". $mdp ."' /></td>";

			echo '</tr>';
			echo '<tr>';
			
			echo "<td><b>Adresse :</b></td>
				  <td><input name=\"adresse\" value='". $adresse . "' /></td>";
			
			echo '</tr>';
			echo '<tr>';

			
			echo "<td><b>Téléphone :</b></td>
				  <td><input name=\"tel\" value='". $tel . "' /></td>";
			
			echo '</tr>';
			echo '<tr>';

			
			echo "<td><b>E-Mail :</b></td>
				  <td><input name=\"email\" value='". $email . "' /></td>";
			
			echo '</tr>';
			echo '<tr>';

			
			echo "<td><b>Admin :</b></td>
				  <td><input name=\"admin\" value='". $admin_client . "' /></td>";
			
			echo '</tr>';
			echo '</table>';
			
			//Bouton : Modifier le client
			echo "	<center><input type=\"submit\" name=\"ajouter\" class=\"input_button\" value=\"Modifier\" /> </center>";
			echo "	</form>";
			echo "</div>";
			
			//Bouton : Supprimer le client
			echo "<br /><center><a href=\"?page=requeteClient&type_requete=2&id_client=". $id_client ."\"><center><div class=\"button\"><center>Supprimer</center></div></center></a></center><br />";
		}
	}
?>