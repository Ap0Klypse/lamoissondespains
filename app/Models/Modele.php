<?php
//acces au Modele parent pour l heritage
namespace App\Models;
use CodeIgniter\Model;

//=========================================================================================
//définition d'une classe Modele (meme nom que votre fichier Modele.php) 
//héritée de Modele et permettant d'utiliser les raccoucis et fonctions de CodeIgniter
//  Attention vos Fichiers et Classes Controleur et Modele doit commencer par une Majuscule 
//  et suivre par des minuscules
//=========================================================================================
class Modele extends Model {

//==========================
// Code du modele
//==========================

//=========================================================================
// Fonction 1
// récupère les données BDD dans une fonction getBillets
// Renvoie la liste de tous les billets, triés par identifiant décroissant
//=========================================================================
public function getBillets() { 

//==========================================================================================
// Connexion à la BDD en utilisant les données féninies dans le fichier app/Config/Database.php
//==========================================================================================
	$db = db_connect();

//=============================
// rédaction de la requete sql
//=============================
    $sql = 'select BIL_ID, BIL_TITRE, BIL_DATE from T_BILLET order by BIL_ID desc';
	
//=============================
// execution de la requete sql
//=============================	
    $resultat = $db->query($sql);

//=============================
// récupération des données de la requete sql
//=============================
	$resultat = $resultat->getResult();

//=============================
// renvoi du résultat au Controleur
//=============================	
    return $resultat;
   
}


//=========================================================================
// Fonction 2 
// récupère les données BDD dans une fonction getDetails
// Renvoie le détail d'un billet précédemment sélectionné par son id
//=========================================================================
public function getDetails($id) {
	
//==========================================================================================
// Connexion à la BDD en utilisant les données féninies dans le fichier app/Config/Database.php
//==========================================================================================
    $db = db_connect();	
	
//=====================================
// rédaction de la requete sql préparée
//=====================================
	$sql = 'SELECT * from T_BILLET WHERE BIL_ID=?';
	
//=====================================================
// execution de la requete sql en passant un parametre id
//=====================================================	
    $resultat = $db->query($sql, [$id]);
	
//=============================
// récupération des données de la requete sql
//=============================
	$resultat = $resultat->getResult();

//=============================
// renvoi du résultat au Controleur
//=============================		
    return $resultat;
  
}

//==========================
// Fin Code du modele
//===========================


//fin de la classe
}


?>