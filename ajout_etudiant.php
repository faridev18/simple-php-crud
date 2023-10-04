<?php 
	require 'action/saveStudentAction.php';
	session_start();
	  if (!isset($_SESSION['auth'])) {
    header("Location: login.php");
  }

?>

<!DOCTYPE html>
<html>
<head>
	<?php include 'include/head.php'; ?>
</head>
<body>
	<?php include 'include/navbar.php'; ?>


	<form action="" id="survey-form" method="POST">
		<?php 
		if (isset($error)) {			
		 ?>
		 <div style="color: white;, text-align: center; background-color: red ; padding: 15px;"> <?=$error ?></div>

		 <?php 
		}
		  ?>

		  <?php 
		if (isset($success)) {			
		 ?>
		 <div style="color: white;, text-align: center; background-color: green ; padding: 15px;"> <?=$success ?></div>

		 <?php 
		}
		  ?>
      <label for="mat" id="name-label">Matricule</label>
      <input type="text" name="mat" id="mat" placeholder="Votre Matricule" >

      <label for="nom" id="email-label">Nom</label>
      <input type="text" name="nom" id="nom" placeholder="Votre nom" >

       <label for="prenom" id="email-label">Prénom</label>
      <input type="text" name="prenom" id="prenom" placeholder="Votre Prénom" >

       <label for="sexe" id="email-label">Sexe</label>
      <select name="sexe" id="sexe">
      	<option value="Masculin">Masculin</option>
      	<option value="Féminin">Féminin</option>
      	
      </select>

       <label for="date" id="email-label">Date de naissance</label>
      <input type="date" name="date" id="date" placeholder="Votre date de naissance" >

         <label for="num" id="email-label">Téléphone</label>
      <input type="number" name="num" id="num" placeholder="Votre numéro de telephone" autocomplete="false">

      <button id="submit" name="validate" class="btn-submit" type="submit">Valider</button>
    </form>

	<?php include 'include/footer.php'; ?>
</body>
</html>