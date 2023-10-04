<?php
try{
    $bdd = new PDO('mysql:host=localhost;dbname=students;charset=utf8;', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(Exception $e){
    die('Une erreur a été trouvée : ' . $e->getMessage());
}
