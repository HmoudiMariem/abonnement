<?php
//étape 0: il faut faire include à notre fichier employe.php dans lequel est définit la classe employe
include "employe.php";

//étape 1- ilfaut récupérer les donneés envoyer par le formulaire 
$cin=$_POST['cin'];
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$nbH=$_POST['nbHeur'];
$tarifH=$_POST['tarifHoraire'];

//étape 2: creation de l'instance avec un constructeur
$emp=new Employer($cin,$nom,$prenom,$nbH,$tarifH);

//étape 3:ajout de l'employe ds la BD avec l'appel de la méthode ajouterDB déclaré dans la classe Employe
$emp->ajouterDB($emp);

//étape 4:  redirection de l'utilisateur vers la page d'affichage
header('location: afficherEmployer.php');
?>







