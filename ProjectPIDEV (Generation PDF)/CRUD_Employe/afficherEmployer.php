<html>
    <head>
    </head>
    <body>
        <center>
            <h1 style="color:red;"> Home page</h1>
            <!---lien vers la page d'ajout-->
            <a href="ajoutEmp.html"><button>Page d'ajout</button></a>
            <br><br>
        <?php
        //il faut include notre classe Employe
        include 'employe.php';
        //créer une instance
        $E = new Employer(0,"","",0,0);
        //faire appel à notre methode d'affichage
        //$ps recoit un tableau des données
        $ps = $E->afficherdb();

echo '<table border="1">
        <tr>
        <td>CIN</td>
        <td>Nom</td>
        <td>Prénom</td>
        <td>nb Heures</td>
        <td>Tarif Horraire</td>
        <td>Action</td>
        </tr>
';
//prcourir le tableau récupérer par la méthode affichedb()
foreach($ps as $row)
{
    echo'
    <tr>
        <td>'.$row["cin"].'</td>
        <td>'.$row["nom"].'</td>
        <td>'.$row["prenom"].'</td>
        <td>'.$row["nbHeur"].'</td>
        <td>'.$row["tarifHoraire"].'</td>';
        //ici redirection vers la page de suppression et bien sur avec id de l'element à supprimer
        echo '<td><a href="suppEmp.php?cin='.$row["cin"].'">Supprimer</a></td>';
       //ici redirection vers la page de suppression et bien sur avec id de l\'element à supprimer
        echo '<td><a href="modifierEmploye.php?cin='.$row["cin"].'">Modifier</a></td>
        </td>';
}
echo '</table>'
?>

            
            </center>
    </body>
</html>