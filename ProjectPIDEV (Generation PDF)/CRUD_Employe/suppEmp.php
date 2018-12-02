<?php
include 'employe.php';
//1-recupération cin
$cin=$_GET['cin'];
//2-creation de l'instance
$E = new Employer(0,"","",0,0);
//3-faire appel à la méthode de suppression
$E->supprimerdb($cin);
//4-redirection de l'utilisateur vers la page d'affichage
header('location:afficherEmployer.php')
?>