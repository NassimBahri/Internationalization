<?php
/**
*****************************************************************    
*  _   _               _             ____        _          _ 
* | \ | |             (_)           |  _ \      | |        (_)
* |  \| | __ _ ___ ___ _ _ __ ___   | |_) | __ _| |__  _ __ _ 
* | . ` |/ _` / __/ __| | '_ ` _ \  |  _ < / _` | '_ \| '__| |
* | |\  | (_| \__ \__ \ | | | | | | | |_) | (_| | | | | |  | |
* |_| \_|\__,_|___/___/_|_| |_| |_| |____/ \__,_|_| |_|_|  |_|
*                                                               
*****************************************************************                                                             
*Internationnaliser votre site en PHP
*
*Classe permettant de transformer 
*rapidement le langage de votre site
*
*@filesource Langue.php
*@author Nassim Bahri <nassim.bahri@yahoo.fr>
*@version 1.0
*@copyright (c) Nassim Bahri
*@link http://fr.slideshare.net/BahriNassim
*@link https://remixcv.com/cv/Nassim-Bahri/50c640fae85c6
**/
class Langue{

	/**
	*Répertoire contenant les fichiers langues
	*@var string
	**/
	public static $directory;
	/**
	*Tableau contenant la liste des langues supportées
	*@var array
	**/
	public static $supportedLocal=array();
	/**
	*La langue courante
	*@var string
	**/
	public static $currentLocal;

	/**
	*Initialisation
	*
	*Méthode permettant 
	*d'initialiser la classe Langue
	*
	*@param string $directory répertoire contenant les fichiers langues
	*@param array $supported les langues supportées
	*@param string $current la langue par défaut
	*@return void
	**/
	public function init($directory,$supported,$current){
		self::$directory=$directory;
		self::$supportedLocal=$supported;
		self::verif($current);
		self::$currentLocal=$current;
	}

	/**
	*Traduction
	*
	*Méthode qui permet de traduire 
	*le texte dans la langue adéquate
	*
	*@param string $string la chaine à traduire
	*@return string
	**/
	public static function translate($string){
		$d=self::$directory.'/'.self::$currentLocal.'.php';
		require $d;
		if(isset($langue[$string])){
			return $langue[$string];
		}
		else{
			return $string;
		}
	}

	/**
	*Changer la langue
	*
	*Méthode qui permet de changer 
	*la langue de votre site
	*
	*@param string $local la nouvelle langue
	*@return void
	**/
	public static function changeLocal($local){
		if(in_array($local,self::$supportedLocal)){
			self::verif($local);
			self::$currentLocal=$local;
		}
	}

	/**
	*Vérification
	*
	*Méthode qui permet de vérifier 
	*si le fichier de la langue existe ou non
	*
	*@param string $local la langue
	*@return void
	**/
	private static function verif($local){
		$d=self::$directory.'/'.$local.'.php';
		if(!file_exists($d)){
			echo '<p>Le fichier de langue in trouvable '.$d.'</p>';
			exit();
		}
	}

}
/**
*Raccourci
*
*Cette méthode est un simple raccourci 
*vers la fonction translate() de la classe Langue
*
*@param string $string la chaine à traduire
*@return string
**/
function _($string){
	return Langue::translate($string);
}
?>