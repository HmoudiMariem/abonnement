<HTML>
<head>
</head>
<body>
<?PHP
include "employe.php";
if (isset($_GET['cin'])){
	$employe=new Employer(124,'test','test',20,50);
	$result=$employe->chercher($_GET["cin"]);
	foreach($result as $row){
		$cin=$row['cin'];
		$nbH=$row['nbHeur'];
		$tarifH=$row['tarifHoraire'];
?>
<form method="POST" action="#">
<table>
<caption>Modifier Employe</caption>
<tr>
<td>CIN</td>
<td><input type="number" name="cin" value="<?PHP echo $cin ?>" disabled></td>
</tr>
<tr>
<tr>
<td>nb heures</td>
<td><input type="number" name="nbH" value="<?PHP echo $nbH ?>"></td>
</tr>
<tr>
<td>tarif horaire</td>
<td><input type="text" name="tarifH" value="<?PHP echo $tarifH ?>"></td>
</tr>
<tr>
<td></td>
<td><input type="submit" name="modifier" value="modifier"></td>
</tr>
</table>
</form>
<?PHP
	}
}
if (isset($_POST['modifier'])){
	$e=new Employer($cin,"","",$_POST['nbH'],$_POST['tarifH']);
	$e->modifierEmploye($e,$cin);
	header('Location: afficherEmployer.php');
}
?>
</body>
</HTMl>