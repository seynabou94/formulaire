?>
 <!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
</head>
<body>
<center width=30% ><table >
 <tr><td><h1>Lister employer <img src="010.jpg"width=50></h1></td></tr>
 </center>
</table>
<table border="1"align=center>
<tr>	
	<th><font color="#8E2323">matricul</th><th><font color="#8E2323">NOM</th></font>
    <th><font color="#8E2323">PRENOM</th></font><th><font color="#8E2323">DATE NAISSANCE</th></font>
    <th><font color="#8E2323">SALAIRE</th></font>
    <th><font color="#8E2323">TELEPHONE</th></font>
    <th><font color="#8E2323">EMAIL</th></font>
	<th>MODIFIER</th><th>SUPPRIMER</th>
</tr>

<?php 

$conn=mysqli_connect("127.0.0.1","seynabou","774164218","employer") or 
die(mysqli_error($conn));
	$req="SELECT * FROM personne";
	$exe=mysqli_query($conn,$req) or die(mysqli_error($conn));
	//echo $ligne['idf']." ".$ligne['codef']."<br>";
	if($exe==true)
	{
		while ($ligne=mysqli_fetch_array($exe)) 
		{ ?>
		<tr><td><?php echo $ligne['matricul']; ?> </td>
			<td><?=$ligne['nom']; ?> </td>
            <td><?=$ligne['prenom'];?></td>
            <td><?=$ligne['date_naiss'];?></td>
            <td><?=$ligne['salaire'];?></td>
            <td><?=$ligne['telephone'];?></td>
            <td><?=$ligne['email'];?></td>
			<td><a href="mod.php?ide=<?=$ligne['id']?>"name="update">modifier</a></td>
		    <td><a href="supp.php?ide=<?=$ligne['id']?>">suppimer</a></td>
            
		</tr>
		<?php } 
	}else
	 {
	 echo "error veuilez revoir votre requete";
	}
	
 ?>
 </table>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
 <table border=0 bgcolor="#ADEAEA" align=center width=100% height=29%>
      <tr><td align="center"><footer>
      <p><a href="acceiul.html">Acceuil</a> | <a href="mes contacts.HTML">mes contacts</a> | <a href="FORMATION.HTML">formation</a> | <a href="PRESCRIPTION.HTML">preinscription</a> | <a href="contact.php">vie social</a> | <a href="contact.php">contact</a></p>
      <p> Copyrigtht &copy; Sonatel Acadamy</p></td></tr>
      </table>
    </footer>
    </body>
</html>
