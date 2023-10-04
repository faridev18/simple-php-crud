<?php

require('database.php');

if(isset($_GET['id']) AND !empty($_GET['id'])){

    $idOfStudent = $_GET['id'];

    $checkIfQuestionExists = $bdd->prepare('SELECT * FROM etudiant WHERE id = ?');
    $checkIfQuestionExists->execute(array($idOfStudent));

    if($checkIfQuestionExists->rowCount() > 0){


        $info = $checkIfQuestionExists->fetch();

            
            $mat = $info['matricule'];
            $nom = $info['nom'];
            $prenom = $info['prenom'];
            $numero = $info['numero'];



    }else{
        $error = "Aucune question n'a été trouvée";
    }

}else{
    $error = "Aucune question n'a été trouvée";
}