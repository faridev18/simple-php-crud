<?php
session_start();
require('action/database.php');

//Validation du formulaire
if(isset($_POST['validate'])){

    //Vérifier si le user a bien complété tous les champs
    if(!empty($_POST['email']) AND !empty($_POST['password'])){
        
        //Les données de l'user
        $user_pseudo = htmlspecialchars($_POST['email']);
        $user_password = htmlspecialchars($_POST['password']);

        //Vérifier si l'utilisateur existe (si l'email est correct)
        $checkIfUserExists = $bdd->prepare('SELECT * FROM user WHERE email = ?');
        $checkIfUserExists->execute(array($user_pseudo));

        if($checkIfUserExists->rowCount() > 0){
            
            //Récupérer les données de l'utilisateur
            $usersInfos = $checkIfUserExists->fetch();

            //Vérifier si le mot de passe est correct
            if(password_verify($user_password, $usersInfos['password'])){
            
                //Authentifier l'utilisateur sur le site et récupérer ses données dans des variables globales sessions
                $_SESSION['auth'] = true;
                $_SESSION['id'] = $usersInfos['id'];
                $_SESSION['nom'] = $usersInfos['nom'];
                $_SESSION['email'] = $usersInfos['email'];

                //Rediriger l'utilisateur vers la page d'accueil
                header('Location: index.php');
    
            }else{
                $error = "Votre mot de passe est incorrect...";
            }

        }else{
            $error = "Votre email est incorrect...";
        }

    }else{
        $error = "Veuillez compléter tous les champs...";
    }

}