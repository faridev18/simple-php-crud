<?php
session_start();
include 'action/database.php';
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if (isset($_POST['validate'])) {
	if (!empty($_POST['nom']) AND !empty($_POST['email']) AND!empty($_POST['password']) AND!empty($_POST['password2']) ) {

		$nom = htmlspecialchars($_POST['nom']);
		$email = htmlspecialchars($_POST['email']);
		$pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
		$pass2 = password_hash($_POST['password2'], PASSWORD_DEFAULT);
		$date = date('d/m/Y');

		if ($_POST['password'] == $_POST['password2']) {
			$checkIfUserAlreadyExists = $bdd->prepare('SELECT email FROM user WHERE email = ?');
	        $checkIfUserAlreadyExists->execute(array($email));

	        if($checkIfUserAlreadyExists->rowCount() == 0){
	            
	            //Insérer l'utilisateur dans la bdd
	            $insertUserOnWebsite = $bdd->prepare('INSERT INTO user(nom, email, password, date_inscription)VALUES(?, ?, ?, ?)');
	            $insertUserOnWebsite->execute(array($nom, $email, $pass, $date));

	            //Récupérer les informations de l'utilisateur
	            $getInfosOfThisUserReq = $bdd->prepare('SELECT id, nom, email FROM user WHERE nom = ? AND email = ? ');
	            $getInfosOfThisUserReq->execute(array($nom, $email));

	            $usersInfos = $getInfosOfThisUserReq->fetch();



	            //Authentifier l'utilisateur sur le site et récupérer ses données dans des variables globales sessions
	            $_SESSION['auth'] = true;
	            $_SESSION['id'] = $usersInfos['id'];
	            $_SESSION['nom'] = $usersInfos['nom'];
	            $_SESSION['email'] = $usersInfos['email'];

	           
	            //Rediriger l'utilisateur vers la page d'accueil
	            header('Location: index.php');

	        }else {
	            $error = "L'utilisateur existe déjà sur le site";
	        }
		}else {
			$error = "Vos mots de passe ne sont identiques";
		}

	}else {
		$error = "Veuillez remplir tous les champs";
	}
}

?>