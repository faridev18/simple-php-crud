<?php 
	require 'action/loginAction.php';
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
     
	   
       <label for="email" id="email-label">Email</label>
       <input type="email" name="email" id="email" placeholder="Votre email" >

       <label for="password" id="email-label">Password</label>
       <input type="password" name="password" id="password" placeholder="Votre mot de passe" >

       

      <button id="submit" name="validate" class="btn-submit" type="submit">S'inscrire</button>
    </form>

	<?php include 'include/footer.php'; ?>
</body>
</html>