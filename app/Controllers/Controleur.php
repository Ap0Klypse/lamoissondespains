<?php
//acces au controller parent pour l heritage
namespace App\Controllers;
use CodeIgniter\Controller;

//=========================================================================================
//définition d'une classe Controleur (meme nom que votre fichier Controleur.php) 
//héritée de Controller et permettant d'utiliser les raccoucis et fonctions de CodeIgniter
//  Attention vos Fichiers et Classes Controleur et Modele doit commencer par une Majuscule 
//  et suivre par des minuscules
//=========================================================================================

class Controleur extends Controller {

//=====================================================================
//Fonction index correspondant au Controleur frontal (ou index.php) en MVC libre
//=====================================================================
public function index(){
	
	if (isset($_POST["Produits"])){
		echo view("vueProduits");
	}
	else if(isset($_POST["Logo"])){
		echo view("vueAccueil");
	}
	else{
		echo view("vueAccueil");
	}
	
}



//fin de la classe
}



?>