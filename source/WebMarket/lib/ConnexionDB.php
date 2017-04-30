<?php
	/************************************************************************/
	/* 
	        ConnexionDB.php par Abdoullah REZGUI
	        - Connexion � la base de donn�e
	        - Ex�cution d'une requ�te (modification, cr�ation, suppression) mise en param�tre
	        - Ex�cution d'une requ�te (consultation) mise en param�tre		
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
	  
		//Constructeur : connexion � la base de donn�es
		//
		private function __construct() {
		    
			if(!self::$pdo) { 
	            self::$pdo = new PDO(self::$dsn, self::$login, self::$password); 
	            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
	            //Activer le mode ASSOC pour les r�sultats du SELECT
	            self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); 
	        }
			
		}

		//ex�cute la requ�te (modification, cr�ation, suppression) mise en param�tre
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
	  	
		//ex�cute la requ�te (consultation) mise en param�tre et remplit la matrice r�sultat
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