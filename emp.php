<?php 
//   $cpt=0;
   $compt="EM-";
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

 $mat1;
// $date=date('y');
$conn=mysqli_connect("127.0.0.1","seynabou","774164218","employer") or 
die(mysqli_error($conn));
	  $req="SELECT MAX(id) AS mat FROM `personne` ";
	  $exe=mysqli_query($conn,$req)or die(mysqli_error($conn));
if($exe){
   if(mysqli_num_rows($exe)>0)

   {
	   $tab=mysqli_fetch_array($exe);
	   $max_mat=$tab['mat'];
   }
   else{
	   $max_mat=0;
   }
	   $mat1=$max_mat+1;
}
	  $matricule=$compt;
	  $matricule=$compt.sprintf('%04d',$mat1);
  //control numero
  $telephone=$_POST['tel'];
  $nb= strlen($_POST['tel']);
  if(is_numeric($_POST['tel'])=="true" && $nb==9){
   $x=substr($_POST['tel'],0,2);
  if($x=="77" || $x=="78" || $x=="70" || $x=="76"){
 echo "bon numero";
		 }
		 else
		  {
echo " veuillez saisir un nurero telephone valide";
  }
  }

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
	<title>employer</title>
	<meta charset="utf-8">
</head>
<body>
<div> 
  <h1 >BIENVENUE</h1>
	<div>
		<div>
	
		<fieldset>
		<legend>FORMULAIRE</legend>
  <center><form  method="POST" action="aff.php">
    <h4>FORMULAIRE</h4>
	<table>
   
		<tr><td><label>matrucul:</label></td>
      <td><input placeholder="matricul" type="text" name="matricule" value="<?=$matricule?>" readonly>
	 </td> </tr>  
	  <br>
        <div>
		<tr><td><label>noms:</label></td>
      <td><input placeholder="Votre Nom" type="text" name="nom" ></td></tr>
    </div>
	<br>
	<?php 
				if(isset($nom) and !preg_match("#^[a-zA-Z \-]+$#",$nom) and trim($nom))
				 echo "<br /><br /><span>name incorrerecte</span><br />";
                ?>
    <div>
		<tr><td><label>prenoms:</label></td>
     <td> <input placeholder="Votre Nom" type="text" name="prenom" ></td></tr>
    </div>
	<br>
	<?php  
                if(isset($prenom) and !preg_match("#^[a-zA-Z \-]+$#",$prenom) and trim($prenom)) echo "<br /><br /><span>Prename incorrerecte</span><br />";
                ?>
    <div>
	<tr><td>	<label>date de naissance:</label></td>
      <td><input placeholder="Date de Naissance: J/M/Y" type="text" name="datte" ></td></tr>
    </div>
	<br>
	<?php   
    if (isset($datte) and !preg_match('#^([0-9]{2})/([0-9]{2})/([0-9]{4})$#',@$datte))
    {
        echo "<br /><br /><span>Date invalide</span><br />";
    }
                
    ?> 
    <div>
		<tr><td><label>salaire:</label></td>
     <td> <input placeholder="[25000 à 1000000]" type="text" name="sal" ></td></tr>
    </div>
	<br>
	
	<?php 
            if (isset($sal) && $sal >= 25000 | $sal < 1000001) {
                echo "";
            } else {
                echo "";
            }
                
                ?> 
    <div>
		<tr><td><label>telephone:</label></td>
     <td> <input placeholder="Telephone port" type="text" name="tel" ></td></tr>
    </div>
	<br>
	<?php 
                if(isset($tel) && !preg_match("#^[0-9 \-]+$#",$tel)) {
            @$erreur.= "";
        }
        ?>
          
    <div>
		<tr><td><label>email:</label></td>
     <td> <input placeholder="Votre email" type="text" name="email" ></td></tr>
    </div> 
	<br>
	<?php
                if(isset($mail) and !preg_match ( " /^.+@.+\.[a-zA-Z]{2,}$/ " , $mail ) and trim($mail))
                {
                    echo "<br /><br /><span>prename invalide</span><br />";
                } 
                ?>
				<br>
				</table>
				 
    <div>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
	   </div>
  </form>
  </center>
  </legend>
  </fieldset>
  </div>
  </div>
  </div>
  <tr><p class="copyright">Designe <a href="#">Sonatel Acadamy</a></p></tr>
</body>
</html>

 
<?php 
$conn=mysqli_connect("127.0.0.1","seynabou","774164218","employer") or 
die(mysqli_error($conn));
if (isset($_POST['submit'])) 
{ 
	extract($_POST);
	$req="INSERT INTO personne(matricul,nom,prenom, date_naiss ,salaire,telephone,email)
	 values('$matricule','$nom','$prenom','$datte','$sal','$tel','$email')" or die(mysqli_error($conn));
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





