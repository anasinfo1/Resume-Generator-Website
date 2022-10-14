<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="stylecv.css">
	<title>Votre CV</title>


	<script>
		function printDiv() {
		// Print Doc
			var divContents = document.getElementById('pagecv').innerHTML;
			var a = window.open('', '', 'height=450, width=700');
			a.document.write('<html>');
			a.document.write(divContents);
			a.document.write('</body></html>');
			a.document.close();
			a.print();
		}


	</script>



</head>
<body>

<?php 

	// recuperation des donnees
	$name = $_POST['fullname'];
	$age = $_POST['age'];
	$address = $_POST['addresse'];
	$loisir = $_POST['loisir'];
	$specialite = $_POST['field'];
	$datebirth = date('Y-m-d', strtotime($_POST['date']));
	$formation = explode("\r\n", trim($_POST['formation']));
	$experience = explode("\r\n", trim($_POST['experience']));
	$languages = explode("\r\n", trim($_POST['language']));
	$phone = $_POST['phonenum'];
	$email = $_POST['email'];
	$nationalite = $_POST['Nationalite'];
	$image = $_FILES['photo']['name'] ;

	//image


	if (isset( $_FILES['photo'])){

	

$infosfichier = pathinfo($_FILES['photo']['name']);

$extension_upload = $infosfichier['extension'];
$extensions_autorisees = array('jpg', 'jpeg', 'png', 'JPG');

if (in_array($extension_upload, $extensions_autorisees)){
$repertoire= "image/";
move_uploaded_file($_FILES['photo']['tmp_name'],$repertoire.$_FILES['photo']['name']);

}
}
             
?>


<div class="container">
	<div class="page" id="pagecv">

		<style type="text/css">

			

			.title{
				text-align: center;
				font-size: 1.8em;
				margin-top: -5px;
				color: rgb(45, 56, 76);
				

			}

			*{
				font-family: cairo;
			}

			h2{
				font-size: 20px;
				color: royalblue;

			}

			.page{
				padding: 10px 20px;
				border-radius: 5px;
				height: 800px;
				width: 600px;
			}

			hr{
				margin-top: -20px;
			}

			h3{
				font-size: 15px;
				font-weight: normal;
				line-height: 10px;
			}

			h3 span{
				font-weight: bold;
			}

			
		</style>
		<h1 class="title">Curriculum Vitae</h1>
		<h2>Informations Personnelles</h2>
		<hr>

<!--afficher les resultats-->

<img src="image/<?php echo $image ?>" style="width: 120px; height: 120px; position: absolute; margin-left: 480px; border: black 1px double;">

<h3><span style="margin-right: 150px;">Nom</span><?php echo $name;?></h3>
<h3><span style="margin-right: 62px;">Date de naissance</span><?php echo $datebirth  . " (" . $age . " ans)" ;?></h3>


<h3><span style="margin-right: 108px;">Numero tel</span><?php echo $phone;?></h3>

<h3><span style="margin-right: 103px;">Numero CIN</span><?php echo $nationalite;?></h3>

<h3><span style="margin-right: 82px;">Addresse Email</span><?php echo $email;?></h3>

<h3><span style="margin-right: 119px;">Addresse</span><?php echo $address;?></h3>

<h2>Profile</h2>
<hr>
<h3 style="line-height: 25px;"><?php echo $specialite ?></h3>
<h2 style="margin-top: -5px;">Experience Professionnelle</h2>
<hr>
<h3 style="line-height: 8px;"><?php 
for ($i=0; $i < count($experience) ; $i++) { 
	echo $experience[$i];
	echo "<br><br><br>";
}

 ?></h3>	


<h2 style="margin-top: -23px;">Formations</h2>
<hr>
<h3 style="line-height: 8px;"><?php 
for ($i=0; $i < count($formation) ; $i++) { 
	echo $formation[$i];
	echo "<br><br><br>";
}

 ?></h3>	

 <h2 style="margin-top: -23px;">Langues</h2>
<hr>

<h3 style="line-height: 8px;"><?php 
for ($i=0; $i < count($languages) ; $i++) { 
	echo $languages[$i];
	echo "<br><br><br>";
}

 ?></h3>

<h2 style="margin-top: -20px;">Loisir</h2>
<hr>
<h3><?php echo $loisir ?></h3>



</div>

<h1 style="color: white; margin-bottom: 700px; margin-left: 700px ; position: absolute;">Vous êtes Prêt</h1>

<img src="oneclickflech.png" style="width:400px; margin-left: 80px;">
<input type="button" value="Telecharger ou Imprimer CV" onclick="printDiv()" class="btns" style="margin-left: -5px;">



</div>
</body>
</html>




