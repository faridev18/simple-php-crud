<?php 
	require 'action/getAllStudentAction.php';
	require 'action/deleteStudentAction.php';
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


	<table>
  <caption>Etudiants</caption>
  <thead>
    <tr>
      <th scope="col">Matricule</th>
      <th scope="col">Nom</th>
      <th scope="col">Prénom</th>
      <th scope="col">Sexe</th>
      <th scope="col">Date de naissance</th>
      <th scope="col">Numero</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  	<?php 
   while($info = $getAllStudent->fetch()){
   ?>
               
     
    <tr>
      <td ><?= $info['matricule'] ?></td>
      <td ><?= $info['nom'] ?></td>
      <td ><?= $info['prenom'] ?></td>
      <td ><?= $info['sexe'] ?></td>
      <td ><?= $info['date_naissance'] ?></td>
      <td ><?= $info['numero'] ?></td>
      
      <td > 
      	<a href="edit.php?id=<?= $info['id']?>"><div>Modifier</div></a>
      	<a href="action/deleteStudentAction.php?id=<?= $info['id']?>"  onclick="return confirm('Voulez vous vraiment supprimer cet étudiant?');" ><div>Supprimer</div></a>

      </td>
      
    </tr>
     <?php
      }
      ?>
   
  </tbody>
</table>


	<?php include 'include/footer.php'; ?>
</body>
</html>