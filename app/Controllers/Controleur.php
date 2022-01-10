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
	if(isset($_GET['action'])&&($_GET['action']=="retour")){
	print_r("retour Accueil");
	}
		//=====================================================================
		//Code du controleur frontal	
		// dans cette fonction se retrouve le code de votre controleur frontal
		//=====================================================================	
			
		//code exemple controleur frontal
		
			if (isset($_POST['billet']) /*cas d'affichage d'un billet détaillé*/){	  
				$this->billet($_POST['billet']);	
			} else { //cas d'affichage de l'accueil (ici forcé par le false)
				$this->accueil();
			}
		
		//=========================
		//fin du controleur frontal
		//=========================
}


//======================================================
// Code du controleur simple (ex fichier Controleur.php)
//======================================================

// Action 1 : Affiche la liste de tous les billets du blog
public function accueil() {
	    //================
		//acces au modele
		//================
		$Modele = new \App\Models\Modele();
		
	    //===============================
		//Appel d'une fonction du Modele
		//===============================	
		$donnees = $Modele->getBillets();
		
		//=================================================================================
		//!!! Création d'un jeu de données $data sécurisé pouvant etre passé à la vue
		//!!! on créé une variable qui récupère le résultat de la requete : $getBillets();
		//=================================================================================
		$data['resultat']=$donnees;
		
		//==========================================
		//on charge la vue correspondante
		//et on envoie le jeu de données $data à la vue
		//la vue aura acces a une variable $resultat
		//==========================================s
		echo view('vueAccueil',$data);
}

// Action 2 : Affiche les détails sur un billet
public function billet($idBillet) {
		//================
		//acces au modele
		//================
		$Modele = new \App\Models\Modele();
		
		//===============================
		//Appel d'une fonction du Modele
		//===============================	
		$donnees = $Modele->getDetails($idBillet);
		
		//=================================================================================
		//!!! Création d'un jeu de données $data sécurisé pouvant etre passé à la vue
		//!!! on créé une variable qui récupère le résultat de la requete : $getBillets();
		//=================================================================================
		$data['resultat']=$donnees;
  		
		//==========================================
		//on charge la vue correspondante
		//et on envoie le jeu de données $data à la vue
		//la vue aura acces a une variable $resultat
		//==========================================
  		echo view('vueBillet',$data);
  
}

// Affiche une erreur
public function erreur($msgErreur) {
  echo view('vueErreur.php', $data);
}

//==========================
//Fin du code du controleur simple
//===========================

//fin de la classe
}



?>