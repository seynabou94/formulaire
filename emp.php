<?php 
//   $cpt=0;
//   $compt="EM-";
//   $nb=strlen($cpt);
//   switch($nb){
// 	  case 1:
// 	   $cp='0000';
// 	  break;
// 	  case 2:
// 	   $cp='000';
// 	  break;
// 	  case 3:
// 	  $cp='00';
// 	  break;
// 	  case 4:
// 	  $cp='0';
// 	  break;
// 	  case 5:
// 	  $cp='';
// 	  break;
// 	  $cpt++;
		
//   }	

// $mat1="EM-000";
// $date=date('y');
// $conn=mysqli_connect("127.0.0.1","seynabou","774164218","employer") or 
// die(mysqli_error($conn));
// 	  $req="SELECT MAX(id) AS mat FROM perssone";
// 	  $exe=mysqli_query($conn,$req)or die(mysqli_error($conn));
// 	  if($exe){
//    if(mysqli_num_rows($exe)>0)
//    {
// 	   $tab=mysqli_fetch_array($exe);
// 	   $max_mat=$tab['mat'];

//    }
//    else{
// 	   $max_mat=0;
//    }
	  
// 	  return $mat1."".$date."".($max_mat+1);
// }
	//   $matricule=$compt;
	//   $matricule=sprintf(' %04',$cpt);
	
  //control numero
//   $telephone=$_POST['tel'];
//   $nb= strlen($_POST['tel']);
//   if(is_numeric($_POST['tel'])=="true" && $nb==9){
//    $x=substr($_POST['tel'],0,2);
//   if($x=="77" || $x=="78" || $x=="70" || $x=="76"){
//  echo "bon numero";
// 		 }
// 		 else
// 		  {
// echo " veuillez saisir un nurero telephone valide";
//   }
//   }

$nim_ofids=1000;
$i=0;
$n=0;
$l="AAAA";
while ($i<= $nim_of_id){

	$id=$i.sprintf("02%d",$n);
	echo $l.$id."<br>";
	if($n==9999){
		$n=0;
		$l++;
	}
	$i++;
	$n++;
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
		<div>
  <center><form  method="POST" action="aff.php">
    <h4>FORMULAIRE</h4>
   
		<label>matrucul:</label>
      <input placeholder="matricul" type="text" name="mat" value="<?=$id ?>" readonly>
    
        <fieldset>
		<label>noms:</label>
      <input placeholder="Votre Nom" type="text" name="nom" >
    </fieldset>
	<?php 
				if(isset($nom) and !preg_match("#^[a-zA-Z \-]+$#",$nom) and trim($nom))
				 echo "<br /><br /><span>name incorrerecte</span><br />";
                ?>
    <fieldset>
		<label>prenoms:</label>
      <input placeholder="Votre Nom" type="text" name="prenom" >
    </fieldset>
	<?php  
                if(isset($prenom) and !preg_match("#^[a-zA-Z \-]+$#",$prenom) and trim($prenom)) echo "<br /><br /><span>Prename incorrerecte</span><br />";
                ?>
    <fieldset>
		<label>date de naissance:</label>
      <input placeholder="Date de Naissance: J/M/Y" type="text" name="datte" >
    </fieldset>
	<?php   
    if (isset($datte) and !preg_match('#^([0-9]{2})/([0-9]{2})/([0-9]{4})$#',@$datte))
    {
        echo "<br /><br /><span>Date invalide</span><br />";
    }
                
    ?> 
    <fieldset>
		<label>salaire:</label>
      <input placeholder="[25000 à 1000000]" type="text" name="sal" >
    </fieldset>
	<?php 
            if (isset($sal) && $sal >= 25000 | $sal < 1000001) {
                echo "";
            } else {
                echo "";
            }
                
                ?> 
    <fieldset>
		<label>telephone:</label>
      <input placeholder="Telephone port" type="text" name="tel" >
    </fieldset>
	<?php 
                if(isset($tel) && !preg_match("#^[0-9 \-]+$#",$tel)) {
            @$erreur.= "";
        }
        ?>
          
    <fieldset>
		<label>email:</label>
      <input placeholder="Votre email" type="text" name="email" >
    </fieldset> 
	<?php
                if(isset($mail) and !preg_match ( " /^.+@.+\.[a-zA-Z]{2,}$/ " , $mail ) and trim($mail))
                {
                    echo "<br /><br /><span>prename invalide</span><br />";
                } 
                ?>
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
    </fieldset>
    <p class="copyright">Designe <a href="#">Sonatel Acadamy</a></p>
  </form>
  </center>
  </div>
</body>
</html>

 
<?php 
$conn=mysqli_connect("127.0.0.1","seynabou","774164218","employer") or 
die(mysqli_error($conn));
if (isset($_POST['submit'])) 
{

	
	extract($_POST);
	$req="INSERT INTO personne(matricul,nom,prenom, date_naiss ,salaire,telephone,email)
     values('$mat','$nom','$prenom','$datte','$sal','$tel','$email')" or die(mysqli_error($conn));
	$result=mysqli_query($conn,$req) or die(mysqli_error($conn));
	if ($result==true)
	 {
		echo"insertion reussie";
	 }
	 else
	 {
	 	echo "echec d'insertion";
	 }
	 
}

?>
 </body>
</html>





