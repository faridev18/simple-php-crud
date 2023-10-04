	<header class="header">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="logo">
               <a href="index.php">logo</a>
            </div>
            <button type="button" class="nav-toggler">
               <span></span>
            </button>
            <nav class="nav">
               <ul>
                  <li><a href="index.php">Acceuil</a></li>
                  <?php 
                    if (isset($_SESSION['auth'])) {
                   ?>
                   <li><a href="ajout_etudiant.php">Ajouter une étudiant</a></li>
                  <li><a href="gestion_etudiant.php">Gérer les étudiants</a></li>
                   <?php 
                     }
                    ?>
                  
                  <?php 
                   if (isset($_SESSION['auth'])) {
                    ?>
                   <li><a href="action/deconnexion.php">Se déconnecter</a></li>
                    <?php 
                     }else{
                       ?>
                       <li><a href="register.php">S'inscrire</a></li>
                        <li><a href="login.php">Se connecter</a></li>
                       <?php 
                     }
                     ?>
                  
               </ul>
            </nav>
        </div>
    </div>
 </header>