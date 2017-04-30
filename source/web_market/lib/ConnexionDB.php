<?php
	/************************************************************************/
	/* 
	        ConnexionDB.php par Abdoullah REZGUI
	        - Connexion à la base de donnée
	        - Exécution d'une requête (modification, création, suppression) mise en paramètre
	        - Exécution d'une requête (consultation) mise en paramètre		
	*/
	/************************************************************************/
	
	class ConnexionDB {

		private static $dsn       = "mysql:host=localhost;dbname=web_market";
		private static $login     = "root";
		private static $password  = "root";

		private static $pdo;
		private static $instance_singleton;
		
		public static function getInstance() {
			if(!self::$instance_singleton) {
				self::$instance_singleton = new ConnexionDB();
			}
			return self::$instance_singleton;
		}
	  
		//Constructeur : connexion à la base de données
		//
		private function __construct() {
		    
			if(!self::$pdo) { 
	            self::$pdo = new PDO(self::$dsn, self::$login, self::$password); 
	            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
	            //Activer le mode ASSOC pour les résultats du SELECT
	            self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); 
	        }
			
		}

		//exécute la requête (modification, création, suppression) mise en paramètre
		//
		public function execute($sql, $params = null) {
			$sth = self::$pdo->prepare($sql);
			if(is_array($params)) {
				return $sth->execute($params);
			}
			return $sth->execute();			
		}

		public function lastInsertId() {
			return self::$pdo->lastInsertId();
	  	}
	  	
		//exécute la requête (consultation) mise en paramètre et remplit la matrice résultat
		//
		public function querySelect($sql, $params = null) {
			$sth = self::$pdo->prepare($sql);
			if(is_array($params)) {
				$sth->execute($params);
			} else {
				$sth->execute();				
			}
			return $sth->fetchAll();
	    }
	}
?>