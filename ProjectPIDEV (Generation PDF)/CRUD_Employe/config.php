<?php
/**
 * Created by PhpStorm.
 * User: badiaa
 * Date: 05/10/2017
 * Time: 12:00
 */

class config
{   public function getCnx(){
    //le nom de votre serveur
    $servername = "localhost";
    //le nom de l'utilisateur
    $username ="root";
    //le nom de base de données
    $dbname= "atelier8";
    //mtp pour votre base de données
    $password ="";
    try{
        //établir une connection avec la base de donnée
        //il suffit de faire une instance de classe PDO
        $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
        return $conn;
    }
    //Tester la présence d'erreurs
    catch (Exception $e){
        die('Erreur: '.$e->getMessage());
    }
}
}