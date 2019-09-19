<?php

$get=$_GET['ide'];

$conn=mysqli_connect("127.0.0.1","seynabou","774164218","employer") or 
	die(mysqli_error($conn));
    $exe="SELECT *FROM personne where id=$get";
	$exe1=mysqli_query($conn,$exe) or die(mysqli_error($conn));
foreach($exe1 as $req){
}
if (isset($_POST['submit']))
 {
 	extract($_POST);
$tel="UPDATE personne set  matricul='$mat',nom='$nom',prenom='$prenom',date_naiss='$datte',salaire=$sal
,telephone='$tel',email='$email' where id=$get";
    $exe2=mysqli_query($conn,$tel) or die(mysqli_error($conn));
    if ($exe2==true) {
      header('location:emp.php');

    
    }
}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
</head>
<body>
<div> 
  <h1 >BIENVENUE</h1>
	<div>
		<div class>
  <form id="contact" name="Filter" method="POST">
    <h4>FORMULAIRE</h4>
    <fieldset>
		<label>matrucul:</label>
      <input placeholder="matricul" type="text" name="mat"value="<?=$req['matricul']?>" >
    </fieldset>
        <fieldset>
		<label>noms:</label>
      <input placeholder="Votre Nom" type="text" name="nom" value="<?=$req['nom']?>"  >
    </fieldset>
    <fieldset>
		<label>prenoms:</label>
      <input placeholder="Votre Nom" type="text" name="prenom"value="<?=$req['prenom']?>"  >
    </fieldset>
    <fieldset>
		<label>date de naissance:</label>
      <input placeholder="Votre Nom" type="text" name="datte"value="<?=$req['date_naiss']?>"  >
    </fieldset>
    <fieldset>
		<label>salaire:</label>
      <input placeholder="Votre Nom" type="text" name="sal" value="<?=$req['salaire']?>" >
    </fieldset>
    <fieldset>
		<label>telephone:</label>
      <input placeholder="Votre Nom" type="text" name="tel" value="<?=$req['telephone']?>" >
    </fieldset>
    <fieldset>
		<label>email:</label>
      <input placeholder="Votre email" type="text" name="email" value="<?=$req['email']?>" >
    </fieldset> 
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
    </fieldset>
    <p class="copyright">Designe <a href="#">Sonatel Acadamy</a></p>
  </form>
  </div>
</body>
</html>

