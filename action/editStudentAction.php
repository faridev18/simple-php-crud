<?php

require('database.php');

if(isset($_POST['validate']) ){

    if(!empty($_POST['mat']) AND !empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['sexe'])  AND !empty($_POST['date']) AND !empty($_POST['num'])){
        

        $etu_mat = htmlspecialchars($_POST['mat']);
        $etu_nom = htmlspecialchars($_POST['nom']);
        $etu_prenom = htmlspecialchars($_POST['prenom']);
        $etu_sexe = htmlspecialchars($_POST['sexe']);
        $etu_date = htmlspecialchars($_POST['date']);
        $etu_num = htmlspecialchars($_POST['num']);
        
        
        $update = $bdd->prepare('UPDATE etudiant SET matricule = ?, nom = ?, prenom = ?, sexe = ?, date_naissance = ? , numero = ? WHERE id = ?');
        $update->execute(array($etu_mat, $etu_nom, $etu_prenom,$etu_sexe, $etu_date,$etu_num, $idOfStudent));

        header('Location: gestion_etudiant.php');

        
        
    }else{
        $error= "Veuillez compléter tous les champs...";
    }

}