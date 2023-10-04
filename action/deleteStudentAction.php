<?php

require('database.php');

if(isset($_GET['id']) AND !empty($_GET['id'])){

    $idOfStudent = $_GET['id'];

    $checkIfQuestionExists = $bdd->prepare('SELECT * FROM etudiant WHERE id = ?');
    $checkIfQuestionExists->execute(array($idOfStudent));

    if($checkIfQuestionExists->rowCount() > 0){


        $delete = $bdd->prepare('DELETE FROM etudiant WHERE id = ?');
        $delete->execute(array($idOfStudent));

        header('Location: ../gestion_etudiant.php');



    }else{
        $error = "Aucune question n'a été trouvée";
    }

}else{
    $error = "Aucune question n'a été trouvée";
}